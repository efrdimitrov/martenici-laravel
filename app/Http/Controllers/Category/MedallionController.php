<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MedallionController extends Controller
{
    public function medallion()
    {
        $all = DB::table('articles')
            ->where('category', 'LIKE', '%медальон%')
            ->where('size', '=', 1)
            ->where('quantity', '>', 0)
            ->orderByRaw("category DESC, sorting DESC, info DESC, code DESC, id DESC")
            ->get();

        return view('/category.medallions',['all' => $all]);
    }
}
