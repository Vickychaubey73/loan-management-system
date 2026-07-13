<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadApiController;

Route::post('/leads', [LeadApiController::class, 'store']);