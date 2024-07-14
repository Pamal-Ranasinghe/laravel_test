<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function testFunction(Request $request){
        $file = $request->file('file');

        // Generate a unique filename
        $filename = uniqid() . '_' . $file->getClientOriginalName();

        // Upload file to S3
        $path = Storage::disk('s3')->put('uploads', $file, $filename, 'public');

        print_r($path);

        // Optionally, you can get the URL of the uploaded file
        // 'n$url = Storage::disk('s3')->url($path);

        return response()->json(["data" => "Hello"]);
    }    
}
