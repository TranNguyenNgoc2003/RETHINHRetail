<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductAndInventoryController extends Controller
{
    public function allProduct(): View
    {
        $pagination = 10;

        $products = Product::orderBy('id', 'desc')->paginate($pagination);

        return view('manager.allProduct', compact('products', 'pagination'));
    }

    public function editProduct($id): View
    {
        $product = Product::findOrFail($id);

        return view('manager.editProduct', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name_product' => $request->name_product,
            'price' => $request->price,
            'option_cpu' => $request->option_cpu,
            'option_gpu' => $request->option_gpu,
            'option_ram' => $request->option_ram,
            'option_hard' => $request->option_hard,
            'discount' => $request->discount,
            'rating' => $request->rating,
            'total_product' => $request->total_product,
            'description' => $request->description,
            'category' => $request->category,
            'Screen_size' => $request->screen_size,
            'Panel_material' => $request->panel_material,
            'Screen_resolution' => $request->screen_resolution,
            'Screen_features' => $request->screen_features,
            'Screen_ratio' => $request->screen_ratio,
            'Rear_camera' => $request->Rear_camera,
            'Video_recording' => $request->video_recording,
            'Front_camera' => $request->front_camera,
            'CPU' => $request->cpu,
            'GPU' => $request->gpu,
            'RAM_capacity' => $request->ram_capacity,
            'Hard_capacity' => $request->hard_capacity,
            'Operating_system' => $request->operating_system,
            'Size' => $request->size,
            'Weight' => $request->weight,
            'Material' => $request->material,
            'Tech_Utilities' => $request->tech_Utilities,
            'Sound_tech' => $request->sound_tech,
            'Charging_tech' => $request->charging_tech,
            'WiFi' => $request->wifi,
            'Bluetooth' => $request->bluetooth,
            'Pin' => $request->pin,
            'Release_date' => $request->release_date,
            'Producer' => $request->producer,
        ]);

        if ($request->image != null) {
            Image::create([
                'product_id' => $product->id,
                'path_img' => $request->image,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->back();
    }

    public function deleteImage($id)
    {
        $image = Image::where('id', $id)->first();

        if ($image) {
            $image->delete();
        }

        return redirect()->back();
    }

    public function newProduct(): View
    {
        return view('manager.newProduct');
    }

    public function addProduct(Request $request)
    {
        $product = Product::create([
            'name_product' => $request->name_product,
            'price' => $request->price,
            'option_cpu' => $request->option_cpu,
            'option_gpu' => $request->option_gpu,
            'option_ram' => $request->option_ram,
            'option_hard' => $request->option_hard,
            'discount' => $request->discount,
            'rating' => $request->rating,
            'total_product' => $request->total_product,
            'description' => $request->description,
            'category' => $request->category,
            'Screen_size' => $request->screen_size,
            'Panel_material' => $request->panel_material,
            'Screen_resolution' => $request->screen_resolution,
            'Screen_features' => $request->screen_features,
            'Screen_ratio' => $request->screen_ratio,
            'Rear_camera' => $request->Rear_camera,
            'Video_recording' => $request->video_recording,
            'Front_camera' => $request->front_camera,
            'CPU' => $request->cpu,
            'GPU' => $request->gpu,
            'RAM_capacity' => $request->ram_capacity,
            'Hard_capacity' => $request->hard_capacity,
            'Operating_system' => $request->operating_system,
            'Size' => $request->size,
            'Weight' => $request->weight,
            'Material' => $request->material,
            'Tech_Utilities' => $request->tech_Utilities,
            'Sound_tech' => $request->sound_tech,
            'Charging_tech' => $request->charging_tech,
            'WiFi' => $request->wifi,
            'Bluetooth' => $request->bluetooth,
            'Pin' => $request->pin,
            'Release_date' => $request->release_date,
            'Producer' => $request->producer,
        ]);

        Image::create([
            'product_id' => $product->id,
            'path_img' => $request->image,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back();
    }
}
