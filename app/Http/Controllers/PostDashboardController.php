<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PostDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index', [
            'posts' => Post::latest()->filters(request(['keyword']))->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create', [
            'title' => 'Create New Post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|min:5|max:255|unique:posts',
            'category_id' => 'required',
            'body' => 'required|min:10'

        ], [
            'title.required' => 'Judulnya wajib diisi woyy',
            'title.min' => 'Dikit amat judulnya, minimal 5 karakter kocak!',
            'title.max' => 'Kepanjangan itu judulnya woyy!',
            'title.unique' => 'WKWK JANGAN PLAGIAT ANYINKK',
            'category_id.required' => 'Kategori nya dipilih dulu doongg',
            'body.required' => 'Lah ini yang paling penting malah gaada isinya!',
            'body.min' => 'Itu blog apa joni elo? pendek amat wkwk'
        ])->validate();

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'body' => $request->body,
        ]);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', [
            'title' => 'Single Post',
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
