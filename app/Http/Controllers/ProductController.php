<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('product',['product'=>$product]);
    }

    public function index2(){

        $data = Product::get();

        if (request()->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('store_id', function($item) {
                    return $item->Store->name;
                })
                ->addColumn('action', function($item){
                    $render =
                    '
                    <a href="/product-edit/'.$item->id.'">Update</a>
                    <a href="/product-delete/'.$item->id.'" class="text-danger">Delete</a>
                    ';
                    return $render;
                })

                ->make(true);
        }

        return view('store');
    }



    public function insert(){
        $store = Store::all();
        return view('product-input',['store'=>$store]);
    }

    public function store(Request $request){
        $bukti = $request->photo;
        $namafile = time().rand(100,999).".".$bukti->getClientOriginalExtension();
        $slug = 'product-'.$request->name."-".time();

        Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'price' => $request->price,
            'description' => $request->description,
            'photo' => $namafile,
            'store_id' => $request->store_id,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        $bukti->move(public_path().'/img/uploads', $namafile);

        return redirect('/product');
    }

    public function edit($id){
        $product = Product::find($id);
        $store = Store::all();
        return view('product-edit',[
            'product'=>$product,
            'store'=>$store
        ]);
    }

    public function update(Request $request, $id){

        Product::where('id',$id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'store_id' => $request->store_id,
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        return redirect('/product');
    }

    public function export(){
        return Excel::download(new ProductExport, 'users.xlsx');
    }

    public function destroy($id){
        Product::destroy($id);

        return redirect('/product');
    }
}
