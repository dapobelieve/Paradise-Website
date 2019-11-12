<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Store;

use Image;

class AddController extends Controller
{
    private $image2db;

    public function index()
    {
        $products = Store::all();
        return view('admin.store', compact('products'));
    }

    public function store(Request $request)
    {
        // validate the product here

        // if request has image
        if ($request->hasFile('pimage')){
            // dd('has image');
            $originalImagePath = public_path('storage/original/');
            $cropImagePath = public_path('storage/crop/');
            $imageName = uniqid() .".jpg";

            $image = Image::make($request->pimage);

            // cropped image
            $image->resize(300, 200, function($constraint) {
                $constraint->upsize();
            })->save($cropImagePath.$imageName, 70);

            $this->image2db = 'crop/'.$imageName;
        }
        
        Store::create([
            'title' => $request->title,
            'price' => (int)$request->price,
            'slug'  => str_slug($request->title),
            'body'  => $request->desc,
            'image' => $this->image2db
        ]);

        return redirect()->back()->with('message', 'Product Successfully Added!');
    }
}
