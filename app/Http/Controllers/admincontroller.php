<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class admincontroller extends Controller
{
    public function showImage(string $filename)
    {
        // Define the file path
        $path = "/{$filename}";

        // Check if the file exists
        if (!Storage::exists($path)) {
            abort(404);
        }

        // Get file contents and MIME type
        $file = Storage::get($path);
        $type = Storage::mimeType($path);

        // Return the image as a response
        return response($file, 200)->header("Content-Type", $type);
    }
}
