<?php

use App\Http\Controllers\Api\AtmController;

Route::post('/withdraw', [AtmController::class, 'withdraw']);

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});
