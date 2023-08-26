<?php

namespace App\Http\Controllers\Edit;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditSlimQuantityController extends Controller
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
            ->whereRaw('size = 2')
            ->orderByRaw("quantity = 0 ASC, box ASC, category ASC")
            ->get();
        return view('edit/edit-slim-quantity',['slims' => $slims]);
    }

    public function editQuantitySlim(Request $req)
    {
        $data=Article::find($req->id);
        $data->quantity = $req->quantity;
        $zeroedSlim = $req->input('zeroedSlim');
        if (isset($zeroedSlim))
            $data->quantity = 0;
        $data->box = $req->box;

        $data->save();

        return redirect('edit-slim-quantity');
    }
}
