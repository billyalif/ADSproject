<?php

namespace App\Http\Controllers\API;
use App\Models\Product;
use App\Models\User;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product =  Product::query()
                    ->where('name', 'like', '%' . request('keyword') . '%')
                    ->paginate(10);

        return response()->json([
            'message'   => 'success',
            'data'      => ProductResource::collection($product),
        ]);
    }

    public function store(Request $request)
    {
        $photo      = $request->file('photo');
        $fileName   = time().'_'.$photo->getClientOriginalName();
        $filePath   = $photo->storeAs('images/products', $fileName, 'public');

        $product = auth()->user()->product()->create([
            'name'      => $request->name,
            'slug'      => \Str::slug($request->name),
            'price'     => $request->price,
            'description' => $request->description,
            'photo'     => $filePath,
            'store_id' => $request->store_id,
        ]);


        return response()->json([
            'message'   => 'success',
            'data'      => new ProductResource($product),
        ]);
    }

    public function show($id)
    {
        $product = auth()->User()->Product()->find($id);

        if (!$product) {
            return response()->json([
                'message'   => 'error',
                'data'      => 'Product not found',
            ]);
        }

        return response()->json([
            'message'   => 'success',
            'data'      => new ProductResource($product),
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = auth()->user()->product()->find($id);

        if (!$product) {
            return response()->json([
                'message'   => 'error',
                'data'      => 'Product not found',
            ]);
        }

        $photo      = $request->file('photo');
        if ($photo) {
            \Storage::delete('public/'.$product->photo);
            $fileName   = time().'_'.$photo->getClientOriginalName();
            $filePath   = $photo->storeAs('images/products', $fileName, 'public');
        } else {
            $filePath   = $product->photo;
        }


        $product->update([
            'name'      => $request->name,
            'slug'      => \Str::slug($request->name),
            'price'     => $request->price,
            'description' => $request->description,
            'photo'     => $filePath,
            'store_id' => $request->store_id,
        ]);

        return response()->json([
            'message'   => 'success',
            'data'      => new ProductResource($product),
        ]);
    }

    public function destroy($id)
    {
        $product = auth()->user()->product()->find($id);

        if (!$product) {
            return response()->json([
                'message'   => 'error',
                'data'      => 'Product not found',
            ]);
        }

        \Storage::delete('public/'.$product->photo);
        $product->delete();

        return response()->json([
            'message'   => 'success',
        ]);
    }
}
