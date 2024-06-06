<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/uploads');
            $url = Storage::url($path);
            return response()->json(['location' => $url]);
        }
        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}
