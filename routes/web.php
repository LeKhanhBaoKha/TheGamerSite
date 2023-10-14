<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/products',ProductController::class);

Route::get('/', function(){
    return view('product-index');
});
Route::get('/', function () {
    return view('home');
});

//bước 1 tạo model với tham số php artisan make:model category --all
//bước 2 thêm các cột vào migration
//bước 3 thêm một migration tạo khóa ngoại (php artisan make:migration foreign_keys)
//bước 4 chạy migration => php artisan migrate
//nếu có lỗi thì sau khi sửa xong chạy lại với tham số: fresh
//Để xóa hết các bảng đã tạo
//Bước 5 chỉnh sửa code của các model(category, Product), thêm quan hệ
//bước 6 thêm dữ liệu mẫu trong seeder và gọi cái seeder trong DatabaseSeeder.php
//thêm dữ liệu vào db thì viết vào seeder của bảng mà mình muốn thêm dữ liệu và thêm tên của seeder đó vào DatabaseSeeder.php. (chạy lệnh php artisan migrate:fresh --seed)
//Bước 7 chạy lệnh sau:
// php artisan storage:link
//để tạo liên kết từ folder public tới folder storage
//Bước 8: tạo cacs view, rout và viết code xử lý trong controller
// 8.1 index
//8.2 show + hinh default
// 8.3: create + store
//8.4: edit + update
//8.5 destroy

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
