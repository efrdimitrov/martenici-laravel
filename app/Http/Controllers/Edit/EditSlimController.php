<?php

namespace App\Http\Controllers\Edit;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditSlimController extends Controller
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
        $slims = DB::table('articles')
            ->whereRaw('size = 2 and quantity > 0')
            ->orderByRaw("quantity ASC, category DESC")
            ->get();
        return view('/edit/edit-slim',['slims' => $slims]);
    }

    public function editSlim(Request $req)
    {
        $zeroedSlim = $req->input('zeroedSlim');
        $zeroedAllSlim = $req->input('zeroedAllSlim');
        $deleteSlim = $req->input('deleteSlim');
        $data = Article::find($req->id);

        if (isset($zeroedSlim))
            $data->quantity = 0;

        else if(isset($zeroedAllSlim))
        {
            Article::where("size", 2)
                ->update(["box" => 0]);

            return redirect('edit-slim');
        }

        else if (isset($deleteSlim))
        {
            Article::where('id', $req->id)
                ->delete();

            return redirect('edit-slim');
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

        return redirect('edit-slim');
    }

    public static function getCountSlimPositive()
    {
        return DB::table('articles')
            ->whereRaw('size = 2 and quantity > 0')
            ->get();
    }

    public static function getCountSlimNegative()
    {
        return DB::table('articles')
            ->whereRaw('size = 2 and quantity = 0')
            ->get();
    }
}
