<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with("categories")->get();
        
        return view('admin.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $fileName = time().$request->file("image")->getClientOriginalName();
        $path = $request->file("image")->storeAs("image", $fileName, "public");
        $image = "/storage/".$path;

        try{
            $product = new Product();
            $product->image = $image;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->save();

            foreach($request->categories as $category){
                $product->categories()->create([
                    "product_id" => $product->id,
                    "category_id" => $category
                ]);
            }
            
            session()->flash("alert_status", "success");
            session()->flash("alert_message", "Ürün Eklendi");
        }catch(Exception $err){
            session()->flash("alert_status", "error");
            session()->flash("alert_message", $err);
        }

        return redirect("/admin/urunler");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.products.update-product');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if(!$product)
            return redirect('/admin/urunler');

        try{
            $product->delete();

            session()->flash('alert_status', 'success');
            session()->flash('alert_message', 'Kategori Silindi');
        }catch(Exception $err){
            session()->flash('alert_status', 'error');
            session()->flash('alert_message', 'Kategori Silinmedi');
        }

        return redirect('/admin/urunler');
    }
}
