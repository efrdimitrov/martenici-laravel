<?php

namespace App\Http\Controllers\Edit;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditSquareQuantityController extends Controller
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
            ->whereRaw('size = 1')
            ->orderByRaw("quantity = 0 ASC, box ASC, category ASC")
            ->get();
        return view('edit/edit-square-quantity',['squares' => $squares]);
    }

    public function editQuantitySquare(Request $req)
    {
        $data=Article::find($req->id);
        $data->quantity = $req->quantity;
        $zeroedSquare = $req->input('zeroedSquare');
        if (isset($zeroedSquare))
            $data->quantity = 0;
        $data->box = $req->box;

        $data->save();

        return redirect('edit-square-quantity');
    }
}
