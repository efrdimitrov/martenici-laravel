<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\DB;

class AllController extends Controller
{
    public function allArticles()
    {
        $squaresAndSlim = DB::table('articles')
            ->where('size', '!=', 3)
            ->where('quantity', '>', 0)
            ->orderByRaw("size ASC, category DESC, sorting DESC, info DESC, code DESC")
            ->get();

        $homes = DB::table('articles')
            ->where('size', '=', 3)
            ->where('quantity', '>', 0)
            ->orderByRaw("width = 600 DESC, width DESC, width = 200 ASC, sorting ASC, info ASC")
            ->get();

        $all = $squaresAndSlim->merge($homes);

        $noQuantities = DB::table('articles')
            ->where('quantity', '==', 0)
            ->orderByRaw("size ASC, category DESC, sorting DESC, info DESC, code DESC")
            ->get();

        return view('/all', compact(['squaresAndSlim', 'homes', 'all', 'noQuantities']));
    }
}
