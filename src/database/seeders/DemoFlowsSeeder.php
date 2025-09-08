<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\StockLevel;
use App\Models\StockLedger;

class DemoFlowsSeeder extends Seeder
{
    public function run(): void
    {
        $branchId   = DB::table('branches')->where('name', 'Phnom Penh HQ')->value('id');
        $supplierId = DB::table('suppliers')->value('id');  // first supplier
        $productId  = DB::table('products')->where('sku', 'SKU-001')->value('id'); // Aloe Vera Gel

        if (!$branchId || !$supplierId || !$productId) {
            // If something is missing, skip gracefully.
            return;
        }

        // Ensure StockLevel row exists
        StockLevel::firstOrCreate(['branch_id' => $branchId, 'product_id' => $productId], ['on_hand' => 0]);

        // Create a posted purchase with one item
        $purchase = Purchase::create([
            'branch_id'    => $branchId,
            'supplier_id'  => $supplierId,
            'invoice_no'   => 'PO-0001',
            'status'       => 'posted',
            'purchased_at' => now(),
            'total'        => 550.00,
            'paid_amount'  => 550.00,
        ]);

        PurchaseItem::create([
            'purchase_id' => $purchase->id,
            'product_id'  => $productId,
            'qty'         => 100.000,
            'unit_cost'   => 5.50,
            'line_total'  => 550.00,
        ]);

        // Write ledger IN
        StockLedger::create([
            'branch_id' => $branchId,
            'product_id'=> $productId,
            'ref_type'  => 'purchase',
            'ref_id'    => $purchase->id,
            'direction' => 'IN',
            'qty'       => 100.000,
            'unit_cost' => 5.50,
        ]);

        // Bump stock_levels
        StockLevel::where(['branch_id' => $branchId, 'product_id' => $productId])->increment('on_hand', 100.000);
    }
}
