<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function image(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048', // Max 2MB
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads/content', 'public');
            
            return response()->json([
                'location' => Storage::url($path)
            ]);
        }

        return response()->json([
            'error' => 'Tidak ada file yang diupload'
        ], 400);
    }
}
