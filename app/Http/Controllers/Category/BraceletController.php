<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BraceletController extends Controller
{
    public function bracelet()
    {
        $all = DB::table('articles')
            ->where('category', 'LIKE', '%гривна%')
            ->where('size', '!=', 3)
            ->where('quantity', '>', 0)
            ->orderByRaw("size ASC, category DESC, sorting DESC, info DESC, code DESC")
            ->get();

        return view('category.bracelets', ['all' => $all]);
    }

//    public function braceletsSquaresOnlyAvailable()
//    {
//        return DB::table('articles')
//            ->where('size', '=', 1)
//            ->where('quantity', '>', 0)
//            ->where('category', 'LIKE', '%гривна%')
//            ->orderByRaw("category DESC, sorting DESC, info DESC, code DESC")
//            ->get();
//    }
}
