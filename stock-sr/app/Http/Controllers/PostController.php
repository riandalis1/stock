<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index(){

        $title = '';

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        return view('posts', [
            "title"     => "All Posts" . $title,
            "active"    => "posts",
            "posts"     => Post::latest()->filter(request(['search', 'category']))->paginate(22)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "title" => "Deskripsi Barang",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
