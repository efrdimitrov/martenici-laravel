<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PromoController extends Controller
{
    public function promo()
    {
        $squaresAndSlim = DB::table('articles')
            ->whereRaw('price < price_old')
            ->where('size', '!=', 3)
            ->where('quantity', '>', 0)
            ->orderByRaw("size ASC, price_old / price DESC, price ASC, category DESC, sorting DESC,
            info DESC, code DESC, id DESC")
            ->get();

        $homes = DB::table('articles')
            ->whereRaw('price < price_old')
            ->where('size', '=', 3)
            ->where('quantity', '>', 0)
            ->orderByRaw("price_old / price DESC, price ASC, category DESC, sorting DESC,
            info DESC, code DESC, id DESC")
            ->get();

        $all = $squaresAndSlim->merge($homes);

        return view('promo', compact(['squaresAndSlim', 'homes', 'all']));
    }

//    public function promoSquareAvailable()
//    {
//        return DB::table('articles')
//            ->where('size', '=', 1)
//            ->where('quantity', '>', 0)
//            ->whereRaw('price < price_old')
//            ->orderByRaw("quantity = 0 ASC, price_old / price DESC, price ASC, category DESC, sorting DESC,
//            info DESC, code DESC, id DESC")
//            ->get();
//    }
}
