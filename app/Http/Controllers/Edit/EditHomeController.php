<?php

namespace App\Http\Controllers\Edit;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $homes = DB::table('articles')
            ->whereRaw('size = 3 and quantity > 0')
            ->orderByRaw("quantity ASC, category DESC")
            ->get();
        return view('/edit/edit-home',['homes' => $homes]);
    }

    public function editHome(Request $req)
    {
        $zeroedHome = $req->input('zeroedHome');
        $zeroedAllHome = $req->input('zeroedAllHome');
        $deleteHome = $req->input('deleteHome');
        $data = Article::find($req->id);

        if (isset($zeroedHome))
            $data->quantity = 0;

        else if(isset($zeroedAllHome))
        {
            Article::where("size", 3)
                ->update(["box" => 0]);

            return redirect('edit-quantity-home');
        }

        else if (isset($deleteHome))
        {
            Article::where('id', $req->id)
                ->delete();

            return redirect('edit-home');
        }

        else {
            $data = Article::find($req->id);
            $data->price = $req->price;
            $data->price_old = $req->price_old;
            $data->quantity = $req->quantity;
            $data->box = $req->box;
            $data->sorting = $req->sorting;
            if (is_null($req->sorting))
                $data->sorting = '';
            $data->info = $req->info;
            if (is_null($req->info))
                $data->info = '';
        }
        $data->save();

        return redirect('edit-home');
    }

    public static function getCountHomePositive()
    {
        return DB::table('articles')
            ->whereRaw('size = 3 and quantity > 0')
            ->get();
    }

    public static function getCountHomeNegative()
    {
        return DB::table('articles')
            ->whereRaw('size = 3 and quantity = 0')
            ->get();
    }
}
