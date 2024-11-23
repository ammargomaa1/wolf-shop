<?php

use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/{item}', [ItemController::class,'updateItemImage']);
