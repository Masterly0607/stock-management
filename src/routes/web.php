<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/healthz', fn () => response()->json(['status' => 'ok'], 200));
// Health route = a heartbeat for your app. It tells servers and monitoring tools: “Laravel is running fine.”


