<?php

namespace App\Http\Controllers\Sort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecentController extends Controller
{
    public function recent()
    {
        $all = DB::table('articles')
            ->where('quantity', '>', 0)
            ->orderByRaw("code DESC, size ASC, category DESC, sorting DESC, info DESC, code DESC")
            ->get();

        return view('sorts.recent', ['all' => $all]);
    }
}
