<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function package()
    {
        $all = DB::table('articles')
            ->where('category', 'LIKE', '%повече бройки%')
            ->where('size', '=', 1)
            ->where('quantity', '>', 0)
            ->orderByRaw("category DESC, sorting DESC, info DESC, code DESC, id DESC")
            ->get();

        return view('/category.packages',['all' => $all]);
    }
}
