<?php

namespace App\Http\Controllers\Sort;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CheapController extends Controller
{
    public function cheap()
    {
        $all = DB::table('articles')
            ->where('quantity', '>', 0)
            ->orderByRaw("price ASC, price_old / price DESC, category DESC, sorting DESC, info DESC, code DESC")
            ->get();

        return view('sorts.cheap', ['all' => $all]);
    }
}
