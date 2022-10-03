<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function store(Request $request)
    {
        $image = $request->file('file');
        $nameOfImage = Str::uuid() . "." . $image->extension();
        $serverImage = Image::make($image);
        $serverImage->fit(1000, 1000);
        $imagePath = public_path('uploads') . '/' . $nameOfImage;
        $serverImage->save($imagePath);
        return response()->json(['image' => $nameOfImage]);
    }
}
