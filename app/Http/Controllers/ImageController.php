<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $name = $request->input('name');
        $image = $request->file('image');

        $filename = time() . '_' . $image->getClientOriginalName();

        $image->storeAs('public/images', $filename);

        $image = new Image();
        $image->name = $name;
        $image->filename = $filename;
        $image->save();

        // Code to upload image to Google Drive

        return redirect('/images/create')->with('success', 'Image uploaded successfully!');
    }
}