<?php

namespace App\Http\Controllers\Property;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use App\Traits\CloudinaryUpload;
use Illuminate\Support\Str;
use Cloudder;

class PropertyController extends Controller
{
    use CloudinaryUpload;
    public function index()
    {
        $properties = Property::latest()->get();
        return response()->json([
            'data' => $properties,
            'message' => 'success'
        ], 200);
    }


    public function home()
    {
        $properties = Property::with('images')->latest()->get();

        return view('pages.property')->with('properties', $properties);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'numeric',
            'images.*' => 'image|max:2048'
        ]);

        // save property here
        $property = Property::create([
            'title' => $request->title,
            'price' => $request->has('prrice') ? $request->price : 0,
            'details' => $request->details,
            'slug' => Str::slug($request->title)
        ]);

        if ($request->hasFile('images')) {

            $images = $request->file('images');
            try {
                foreach($images as $file) {
                    $imageData = $this->upload($file, 'paradise', 360, null);

                    $data = [
                        'public_id' => $imageData['public_id'],
                        'secure_url' => $imageData['secure_url']
                    ];

                    $property->images()->create([
                        'url' => json_encode($data)
                    ]);

                }
            }catch (\Exception $e) {
                return response()->json([
                    'data' => [],
                    'message' => $e->getMessage()
                ], 500);
            }

        }

        return response()->json([
            'data' => [
                'property' => $property->load('images')
            ],
            'message' => 'Property Added!'
        ]);
    }

    public function details(Property $property)
    {
        if(!$property) {
            abort(404);
        }

        return view('pages.property-details')->with('property', $property->load('images'));
    }
}
