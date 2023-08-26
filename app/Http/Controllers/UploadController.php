<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class UploadController extends Controller
{
    public static function getLastCode()
    {
        return DB::table('articles')
            ->orderByRaw("code DESC")
            ->first();
    }

    public function index()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpg,gif'
            ]);

            $code = self::getLastCode()->code + 1;
            $type = $request->input('type');
            if (!isset($request->type))
                $type = 'jpg';
            $imageName      = $code . '.' . $type;
            $thumbImageName =  $code . 'thumb.' . $type;
            $sizeHome       = $request->input('size_home');
            //upload
            $size        = $request->input('size');
            $image       = $request->file('image');
            $filePath    = public_path('/images/square');
            $width       = 600;
            $height      = 900;
            $widthThumb  = 100;
            $heightThumb = 150;
            if ($size ==  2) {
                $filePath    = public_path('/images/slim');
                $width       = 900;
                $height      = 200;
                $widthThumb  = 200;
                $heightThumb = 26;
            }
            if ($size ==  3) {
                $filePath    = public_path('/images/home');
                $width       = substr($sizeHome, 0, 3);
                $height      = substr($sizeHome, 3);
                $widthThumb  = $width / 3;
                $heightThumb = $height / 3;
            }
            $img = Image::make($image->path());
            $img->resize($width, $height)->save($filePath.'/'.$imageName);
            $img->resize($widthThumb, $heightThumb)->save($filePath.'/'.$thumbImageName);

            $newCode = $this->getLastCode()->code + 1;
            $price   = $request->input('price');
            $info    = $request->input('info');
            if (is_null($info))
                $info = '';
            if (isset($request->five_pieces))
                $info = '5 бр. в пакет';
            if (isset($request->ten_pieces))
                $info = '10 бр. в пакет';
            $quantity = $request->input('quantity');
            if (is_null($quantity))
                $quantity = 1;
            // category
            $bracelet  = $request->input('bracelet');
            $lady      = $request->input('lady');
            $kid       = $request->input('kid');
            $hanging   = $request->input('hanging');
            $medallion = $request->input('medallion');

            $image = new Article();
            $image->category  = $bracelet . ' ' . $lady . ' ' . $kid . ' ' . $hanging . ' ' . $medallion;

            $image->width  = 600;
            $image->height = 900;
            if ($size == 2) {
                $image->width  = 900;
                $image->height = 200;
            }
            if ($size == 3) {
                $image->width  = $width;
                $image->height = $height;
                $image->category = 'за дома';
            }

            $image->size      = $size;
            $image->code      = $newCode;
            $image->price     = $price;
            $image->price_old = 0;
            $image->info      = $info;
            $image->quantity  = $quantity;

            if (isset($request->five_pieces) || isset($request->ten_pieces))
                $image->category = 'повече бройки';
            $image->box     = 0;
            $image->type    = $type;
            $image->sorting = '';

            $image->save();
        }

        return back()->with('success', 'Image uploaded Successfully!');
    }
}
