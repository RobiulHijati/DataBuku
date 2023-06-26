<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SecurityController;
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



Route::middleware("auth")->group(function () {

            Route::get('/', [ContohController::class, "Welcome"])->name("welcome");
            Route::get('/home', [ContohController::class, "Home"])->name("home");
            Route::get('/blog', [ContohController::class, "postingan"])->name("blog");
            Route::get('/about', [ContohController::class, "About"])->name("profile");

        Route::controller(MahasiswaController::class)->group(function () {
            Route::get("/mahasiswa", "index")->name("mahasiswa.index");
            Route::get("/mahasiswa/create", "create")->name("mahasiswa.create");
            Route::get("/mahasiswa/{id}", "show")->name("mahasiswa.show");
            Route::post("/mahasiswa", "store")->name("mahasiswa.store");
            Route::get("/mahasiswa/{id}/edit", "edit")->name("mahasiswa.edit");
            Route::put("/mahasiswa/{id}", "update")->name("mahasiswa.update");
            Route::delete("/mahasiswa/{id}", "destroy")->name("mahasiswa.destroy");
        });
        Route::controller(BukuController::class)->group(function () {
            Route::get("/buku", "index")->name("buku.index");
            Route::get("/buku/create", "create")->name("buku.create");
            Route::get("/buku/{id}", "show")->name("buku.show");
            Route::post("/buku", "store")->name("buku.store");
            Route::get("/buku/{id}/edit", "edit")->name("buku.edit");
            Route::put("/buku/{id}", "update")->name("buku.update");
            Route::delete('/buku/{id}', 'destroy')->name('buku.destroy');
        });

        Route::controller(PenulisController::class)->group(function () {
            Route::get("/penulis", "index")->name("penulis.index");
            Route::get("/penulis/create", "create")->name("penulis.create");
            Route::get("/penulis/{id}", "show")->name("penulis.show");
            Route::post("/penulis", "store")->name("penulis.store");
            Route::get("/penulis/{id}/edit", "edit")->name("penulis.edit");
            Route::put("/penulis/{id}", "update")->name("penulis.update");
            Route::delete('/penulis/{id}', 'destroy')->name('penulis.destroy');
            Route::get('penulis/search', 'search')->name('penulis.search');
        });

        Route::controller(UserController::class)->group(function () {
            Route::get("/user", "index")->name("user.index");
            Route::get("/user/create", "create")->name("user.create");
            Route::get("/user/{id}", "show")->name("user.show");
            Route::post("/user", "store")->name("user.store");
            Route::get("/user/{id}/edit", "edit")->name("user.edit");
            Route::put("/user/{id}", "update")->name("user.update");
            Route::delete('/user/{id}', 'destroy')->name('user.destroy');
        });

        Route::controller(PenerbitController::class)->group(function () {
            Route::get("/penerbit", "index")->name("penerbit.index");
            Route::get("/penerbit/create", "create")->name("penerbit.create");
            Route::get("/penerbit/{id}", "show")->name("penerbit.show");
            Route::post("/penerbit", "store")->name("penerbit.store");
            Route::get("/penerbit/{id}/edit", "edit")->name("penerbit.edit");
            Route::put("/penerbit/{id}", "update")->name("penerbit.update");
            Route::delete('/penerbit/{id}', 'destroy')->name('penerbit.destroy');
        });
        

        Route::controller(SecurityController::class)->group(function () {
            Route::get("/logout", "logout")->name("logout");
        });
});

Route::controller(SecurityController::class)->group(function () {
    Route::get("/login", "formLogin")->name("login");
    Route::post("/login", "prosesLogin")->name("login.proses");
    Route::get("/logout", "logout")->name("logout");
});
