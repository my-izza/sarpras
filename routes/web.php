<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route Index
Route::get('/', [HomeController::class, 'index'])->name('index');
//<!--*** RoomController Start ***-->
//Route viewRooms
Route::get('/view-rooms', [RoomController::class, 'viewRooms'])->name('view-rooms');
//Route createRoom
Route::get('/create-room', [RoomController::class, 'createRoom'])->name('create-room');
//Route storeRoom
Route::post('/store-room', [RoomController::class, 'storeRoom'])->name('store-room');
//Route editRoom
Route::get('/edit-room/{id}', [RoomController::class, 'editRoom'])->name('edit-room');
//Route updateRoom
Route::put('/update-room/{id}', [RoomController::class, 'updateRoom'])->name('update-room');
//Route destroyRoom
Route::delete('/destroy-room/{id}', [RoomController::class, 'destroyRoom'])->name('destroy-room');
//Route viewByCategori
Route::get('/view-category/{category}', [RoomController::class, 'viewByCategoryRoom'])->name('view-category');
//<!--*** RoomController End ***-->
//<!--*** ItemController Start ***-->
//Route viewItems
Route::get('/view-items', [ItemController::class, 'viewItems'])->name('view-items');
//Route createItem
Route::get('/create-item', [ItemController::class, 'createItem'])->name('create-item');
//Route storeItem
Route::post('/store-item', [ItemController::class, 'storeItem'])->name('store-item');
//Route editItem
Route::get('/edit-item/{id}', [ItemController::class, 'editItem'])->name('edit-item');
//Route updateItem
Route::put('/update-item/{id}', [ItemController::class, 'updateItem'])->name('update-item');
//Route destroyItem
Route::delete('/destroy-item/{id}', [ItemController::class, 'destroyItem'])->name('destroy-item');
//Route viewByCategori
Route::get('/view-category/{category}', [ItemController::class, 'viewByCategoryItem'])->name('view-category');
//<!--*** ItemController End ***-->
//<!--*** BarcodeController Start ***-->
// //Route Barcode
// Route::get('/barcode', function () {
//     $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
//     echo $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);
// });
// //Route Barcode Image
// Route::get('/image', function () {
//     $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
//     $image = $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);

//     return response($image)->header('Content-Type', 'image/png');
// });
