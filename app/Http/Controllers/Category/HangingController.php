<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HangingController extends Controller
{
    public function hanging()
    {
        $all = DB::table('articles')
            ->where('category', 'LIKE', '%закачаща%')
            ->where('size', '=', 1)
            ->where('quantity', '>', 0)
            ->orderByRaw("category DESC, sorting DESC, info DESC, code DESC, id DESC")
            ->get();

        return view('/category.hangings',['all' => $all]);
    }
}
