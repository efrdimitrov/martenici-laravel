<?php

namespace App\Http\Controllers\Sort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensiveController extends Controller
{
    public function expensive()
    {
        $all = DB::table('articles')
            ->where('quantity', '>', 0)
            ->orderByRaw("price DESC, size ASC, category DESC, sorting DESC, info DESC, code DESC")
            ->get();

        return view('sorts.expensive', ['all' => $all]);
    }
}
