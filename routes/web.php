<?php

use App\Http\Controllers\LoginController;
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

// bắt buộc đăng nhập
Route::middleware('auth')->group(function(){
    Route::resource('/products',ProductController::class)->except(['index','show']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/login', [LoginController::class,'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::resource('/products',ProductController::class)->only(['index','show']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

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

        // 18/10
//Đăng nhập, đăng xuất
//bước 1: sửa migration + seeder
    // databaseeder thêm:
    // \App\Models\User::factory(10)->create();
    // \App\Models\User::find(1)->update(['is_admin'=>true]);
    // create_user_table thêm:
    // $table->boolean('is_admin')->default(false);
// bước 2: chạy lại migration, seeder
//     php artisan migrate:fresh --seed
// bước 3: tạo view đăng nhập
//bước 4: tạo route+controller php artisan make:controller LoginController
// bước này dùng code có sẵn trong laravel docs https://laravel.com/docs/10.x/authentication#authenticating-users
    //gồm Manually Authenticating Users và Logging Out
// bước 5 sửa view layout

//bước 6 phân quyền người dùng
