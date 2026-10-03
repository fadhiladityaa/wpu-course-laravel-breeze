<?php

use App\Http\Controllers\PostDashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {

    $posts = Post::latest()->titleSearch(request(['keyword', 'category', 'author']))->paginate(8)->withQueryString();
    return view('posts', [
        'title' => 'Blog',
        'posts' => $posts,
    ]);
});


Route::get('/post/{post:slug}', function(Post $post) 
{
    return view('post', [
        'title' => 'Single Post',
        'post' => $post,
    ]);
});


Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [PostDashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/post', [PostDashboardController::class, 'store'])->name('post.store');
    Route::get('/dashboard/create', [PostDashboardController::class, 'create']);
    Route::delete('/dashboard/{post:slug}', [PostDashboardController::class, 'destroy'])->name('post.destroy');
    Route::get('/dashboard/{post:slug}', [PostDashboardController::class, 'show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// email verification
require __DIR__.'/auth.php';
