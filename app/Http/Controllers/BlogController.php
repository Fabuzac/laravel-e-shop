<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        return view('blog', [
            'articles' => Article::latest()->paginate(5),
            'categories' => Category::all(),
            'bestCategories' => Category::latest()->paginate(3),
        ]);
    }

    public function show(Article $article)
    {
        return view('article', [
            'article' => $article,
            'categories' => Category::all(),
        ]);
    }

}
