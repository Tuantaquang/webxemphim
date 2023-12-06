<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DanhmucController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PhimController;
use App\Http\Controllers\Admin\TapPhimController;
use App\Http\Controllers\Admin\TheloaiController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NguoidungController;
use App\Http\Controllers\YeuThichController;

//nguoi dùng
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/danhmuc/{slug}', [HomeController::class, 'danhmuc'])->name('danhmuc');
Route::get('/theloai/{slug}', [HomeController::class, 'theloai'])->name('theloai');
Route::get('/chi-tiet-phim/{slug}', [HomeController::class, 'chi_tiet_phim'])->name('chi_tiet_phim');
Route::get('/xem-phim/{slug}/{tap}', [HomeController::class, 'xem_phim']);
Route::get('/so-tap', [HomeController::class, 'so_tap'])->name('so_tap');
Route::get('/nam/{year}', [HomeController::class, 'nam_phim'])->name('nam');
Route::get('/tim-kiem', [HomeController::class, 'timkiem'])->name('tim-kiem');
Route::post('/add-rating', [HomeController::class, 'add_rating'])->name('add-rating');



Route::get('/user-login', [NguoidungController::class, 'user_login'])->name('user_login');
Route::post('/user-login', [NguoidungController::class, 'user_post_login'])->name('post_login');
Route::get('/logout', [NguoidungController::class, 'logout'])->name('user_logout');

Route::get('/user-register', [NguoidungController::class, 'user_register'])->name('register');
Route::post('/user-register', [NguoidungController::class, 'user_post_register'])->name('post_register');

///yêu thích
Route::resource('/yeuthich', YeuThichController::class);


///admin   
Route::get('/admin-login', [AdminController::class, 'admin_login'])->name('admin_login');
Route::post('/admin-login', [AdminController::class, 'admin_postlogin'])->name('admin_postlogin');
Route::get('/admin-logout', [AdminController::class, 'admin_logout'])->name('admin_logout');

Route::middleware('admin')->group(function () {
    
    Route::get('/admin', [DashboardController::class, 'home'])->name('admin.home');
    Route::get('/info-phim/{slug}', [DashboardController::class, 'info_phim'])->name('info-phim');
    
    Route::resource('/danh-muc', DanhmucController::class);
    Route::resource('/phim', PhimController::class);
    Route::resource('/tap-phim', TapPhimController::class);
    Route::resource('/the-loai', TheloaiController::class);
    Route::resource('/info', InfoController::class);
    Route::post('resorting', [DanhmucController::class, 'resorting'])->name('resorting');
    Route::get('/update-year', [PhimController::class, 'update_year']);
    Route::get('/update-topviews', [PhimController::class, 'update_topviews']);
    Route::get('/chon-tap-phim', [TapPhimController::class, 'chon_tapphim'])->name('chontap');
    
    Route::get('/ds-tap/{id}', [TapPhimController::class, 'ds_tap'])->name('ds-tap');
    
});