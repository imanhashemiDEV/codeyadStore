<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function ckeditor_image(Request $request)
    {
        if($request->hasFile('upload')){
            $url=ImageManager::ckImage('products',$request->upload);
            return response()->json(['url'=>$url]);
        }
    }
}
