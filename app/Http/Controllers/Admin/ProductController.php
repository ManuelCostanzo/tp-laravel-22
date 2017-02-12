<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Session;

class ProductController extends Controller
{

   public function index()
    {
        return view('admin.products/index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.products/create', [
            'categories' => \App\Category::pluck('name', 'id'),
            'brands' => \App\Brand::pluck('name', 'id'),
            'providers' => \App\Provider::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:45|unique:products',
            'barcode' => 'required|unique:products',
            'stock' => 'required|numeric',
            'minimum_stock' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'provider_id' => 'required|exists:providers,id'
        ]);

        Product::create($request->all());

        Session::flash('flash_message', 'Product successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin.products/show', [
            'product' => Product::findOrFail($id)
        ]);
    }


        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.products/edit', [
            'product' => Product::findOrFail($id),
            'categories' => \App\Category::pluck('name', 'id'),
            'brands' => \App\Brand::pluck('name', 'id'),
            'providers' => \App\Provider::pluck('name', 'id')
        ]);
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|min:5|max:45|unique:products,name,'.$product->id,
            'barcode' => 'required|unique:products,barcode,'.$product->id,
            'stock' => 'required|numeric',
            'minimum_stock' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'provider_id' => 'required|exists:providers,id'
        ]);

        $product->fill($request->all())->update();

        Session::flash('flash_message', 'Product successfully updated!');

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();

        Session::flash('flash_message', 'Product successfully deleted!');

        return redirect()->route('products.index');
    }


    public function missing() {

        return view('admin.products/index', [
            'products'  => Product::whereRaw('stock < minimum_stock')->get()
        ]);
    }

    public function minimum() {

        return view('admin.products/index', [
            'products'  => Product::whereRaw('stock = minimum_stock')->get()
        ]);
    }
}