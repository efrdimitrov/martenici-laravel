<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KidController extends Controller
{
    public function kid()
    {
        $all = DB::table('articles')
            ->where('category', 'LIKE', '%детска%')
            ->where('size', '!=', 3)
            ->where('quantity', '>', 0)
            ->orderByRaw("size ASC, category DESC, sorting DESC, info DESC, code DESC, id DESC")
            ->get();

        return view('category.kids', ['all' => $all]);
    }
}
