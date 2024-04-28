<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController ;
use App\Http\Controllers\UserProfileController;
use App\Models\userProfile;
use App\Http\Controllers\PostController;




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

Route::get('/', function () {
    return view('myHome');
});

Route::get('/my', function () {
    return view('welcome');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {

    /* for profile and posts */
    Route::get('/profile/{user}/edit',[UserProfileController::class, 'edit'])->name('userProfile.edit');
    Route::get('/profile/{user}',[UserProfileController::class, 'index'])->name('userProfile.show');
    Route::patch('/profile/{user}',[UserProfileController::class, 'update'])->name('userProfile.update');



    Route::get('/p/create', [PostController::class, 'create'])->name('Post.create');
    Route::post('/p',[PostController::class, 'store'])->name('Post.store');
    Route::get('/p/{post}',[PostController::class, 'show'])->name('Post.show');



    /* for products */
    Route::get('/product/index',[ProductController::class, 'index'])->name('product.index');

    Route::get('/product/create',[ProductController::class, 'create'])->name('product.create');

    Route::post('/product',[ProductController::class, 'store'])->name('product.store');

    Route::get('/product/{product}/edit',[ProductController::class, 'edit'])->name('product.edit');

    Route::put('/product/{product}/update',[ProductController::class, 'update'])->name('product.update');

    Route::delete('/product/{product}/delete',[ProductController::class, 'delete'])->name('product.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    

    Route::get('/home', function () {
        return view('dashboard');
    })->name('Home');


    /* Route::get('/home', function () {
        $user = Auth::user(); // Assuming you are trying to pass the authenticated user
    
        return view('dashboard', ['user' => $user]);
    })->name('Home'); */


   /*  Route::get('/', function () {
        return view('welcome');
    })->name('Home'); */
});


require __DIR__.'/auth.php';
