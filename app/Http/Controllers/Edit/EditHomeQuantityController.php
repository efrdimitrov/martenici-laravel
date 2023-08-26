<?php

namespace App\Http\Controllers\Edit;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditHomeQuantityController extends Controller
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
            ->whereRaw('size = 3')
            ->orderByRaw("quantity = 0 ASC, box ASC, category ASC")
            ->get();
        return view('edit/edit-home-quantity',['homes' => $homes]);
    }

    public function editQuantityHome(Request $req)
    {
        $data=Article::find($req->id);
        $data->quantity = $req->quantity;
        $zeroedHome = $req->input('zeroedHome');
        if (isset($zeroedHome))
            $data->quantity = 0;
        $data->box = $req->box;

        $data->save();

        return redirect('edit-home-quantity');
    }
}
