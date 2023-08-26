<?php

namespace App\Http\Controllers\Edit;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditSquareController extends Controller
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
        $squares = DB::table('articles')
            ->whereRaw('size = 1 and quantity > 0')
            ->orderByRaw("quantity ASC, category ASC")
            ->get();
        return view('/edit/edit-square',['squares' => $squares]);
    }

    public function editSquare(Request $req)
    {
        $zeroedSquare = $req->input('zeroedSquare');
        $zeroedAllSquare = $req->input('zeroedAllSquare');
        $deleteSquare = $req->input('deleteSquare');
        $data = Article::find($req->id);

        if (isset($zeroedSquare))
            $data->quantity = 0;

        else if(isset($zeroedAllSquare))
        {
            Article::where("size", 1)
                ->update(["box" => 0]);

            return redirect('edit-square');
        }

        else if (isset($deleteSquare))
        {
            Article::where('id', $req->id)
                ->delete();

            return redirect('edit-square');
        }

        else {
            $data->price = $req->price;
            $data->price_old = $req->price_old;
            $data->quantity = $req->quantity;
            $data->box = $req->box;
            $data->sorting = $req->sorting;
            if (is_null($req->sorting))
                $data->sorting = '';

            $bracelet = (isset($req->bracelet)) ? 'гривна' : '';
            $lady = (isset($req->lady)) ? ' дамска' : '';
            $kid = (isset($req->kid)) ? ' детска' : '';
            $home = (isset($req->home)) ? ' за дома' : '';
            $hanging = (isset($req->hanging)) ? ' закачаща' : '';
            $medallion = (isset($req->medallion)) ? ' медальон' : '';
            $paket = (isset($req->paket)) ? 'повече бройки' : '';
            $data->category = $bracelet . $lady . $kid . $home . $hanging . $medallion . $paket;
            $data->info = $req->info;
            if (is_null($req->info))
                $data->info = '';
        }
        $data->save();

        return redirect('edit-square');
    }

    public static function getCountSquarePositive()
    {
        return DB::table('articles')
            ->whereRaw('size = 1 and quantity > 0')
            ->get();
    }

    public static function getCountSquareNegative()
    {
        return DB::table('articles')
            ->whereRaw('size = 1 and quantity = 0')
            ->get();
    }
}
