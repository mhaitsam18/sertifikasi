<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // function getFile(Request $request)
    // {
    //     $file = Storage::disk('public')->get($request->image);
    //     return (new Response($file, 200))
    //         ->header('Content-Type', 'image/jpeg');
    // }

    // public function getFile2()
    // {
    //     $files = Storage::files("public/sertifikat");
    //     $images = array();
    //     foreach ($files as $key => $value) {
    //         $value = str_replace("public/", "", $value);
    //         array_push($images, $value);
    //     }
    //     return view('show', ['images' => $images]);
    // }

    // public function getFile3(Request $request)
    // {
    //     return response()->download('public/' . $request->image);
    // }

    public function index()
    {
    }
    public function getFile(Request $request)
    {
        $filename = str_replace($request->file . "/", "", $request->image);
        $tempImage = tempnam(sys_get_temp_dir(), $filename);
        copy(asset('storage/' . $request->image), $tempImage);
        return response()->download($tempImage, 'sertifikat.jpg', ['.jpg']);
    }
}
