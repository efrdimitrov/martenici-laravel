<?php

namespace App\Http\Controllers;


use App\Models\Article;

class ViewerController extends Controller
{
    public function viewArticle(int $code)
    {
        $article = Article::where('code', $code)->first();
        if ($article == null) {
            return view('error-article');
        }
        else {
            $size = 'square';
            if ($article->size == 2)
                $size = 'slim';
            if ($article->size == 3)
                $size = 'home';

            return view('view', compact('article', 'size'));
        }
    }
}
