<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ApiController extends Controller
{
    public function image(Request $request)
    {
        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('image', $image_new_name);
        $data = new Image;
        $data->image = $image_new_name;
        $data->number = $request->number;
        $data->save();
        return response()->json($data);
    }

    public function getImage($number)
    {
        $image = Image::where('number', $number)->first();
        return response()->json($image);
    }
}
