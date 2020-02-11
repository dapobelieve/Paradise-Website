<?php
namespace App\Http\Controllers\Service;

use App\Service;
use App\Http\Controllers\Controller;
use App\Traits\CloudinaryUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    use CloudinaryUpload;

    public function home(Request $request)
    {
        $services = Service::with('images')->latest()->get();

        return view('pages.service',compact('services', $services));
    }

    public function index(Request $request)
    {
        $services = Service::latest()->get();
        return response()->json([
            'data' => $services,
            'message' => ''
        ], 200);
    }

    public function list(Request $request)  {}

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'images.*' => 'image|max:2048'
        ]);

        // save service here
        $service = Service::create([
            'name' => $request->title,
            'text' => $request->details,
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

                    $service->images()->create([
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
                'service' => $service->load('images')
            ],
            'message' => 'Service Added!'
        ], 201);
    }

    public function update(Request $request, $service)
    {
        $service = Service::find($service);

        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'images.*' => 'image|max:2048'
        ]);

        // save service here
        $service->update([
            'name' => $request->title,
            'text' => $request->details,
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

                    $service->images()->create([
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
                'service' => $service->load('images')
            ],
            'message' => 'Service Added!'
        ], 201);
    }
    public function delete($id) {
        $service = Service::find($id);
        if (!$service) {
            $service->delete();
        }


        return response()->json([
            'message' => 'Service deleted'
        ], 204);

    }
    public function edit($id)
    {
        $service = Service::find($id);

        return response()->json($service->load('images'));
    }
}
