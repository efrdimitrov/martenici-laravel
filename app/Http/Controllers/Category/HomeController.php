<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $all = DB::table('articles')
            ->where('size', '=', 3)
            ->where('quantity', '>', 0)
            ->orderByRaw("width = 600 DESC, width DESC, width = 200 ASC, sorting ASC, info ASC, id DESC")
            ->get();
        return view('/category.homes',['all' => $all]);
    }
}
