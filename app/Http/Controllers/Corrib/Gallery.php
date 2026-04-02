<?php

namespace App\Http\Controllers\Corrib;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class Gallery extends Controller
{
    public function index()
    {
        return view('gallery_img.index');
    }

    public function filter(Request $request)
    {
        $category = $request->category ?? 'all';
        $subcategory = $request->subcategory ?? null;

        $path = public_path('gallery');

        if (!File::exists($path)) {
            return 'Gallery folder does not exist!';
        }

        $files = File::files($path);
        $items = [];

        foreach ($files as $file) {
            $filename = $file->getFilename();

            if ($category !== 'all') {
                if (!str_starts_with($filename, $category)) continue;

                if ($subcategory && !str_starts_with($filename, "{$category}_{$subcategory}")) continue;
            }

            $items[] = $filename;
        }

        return view('gallery_img.partials.items', compact('items', 'category'))->render();
    }
}