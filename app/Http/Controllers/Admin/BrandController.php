<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use Session;

class BrandController extends Controller
{

    public function __construct()
    {
    }


   public function index()
    {
        return view('admin.brands/index', [
            'brands' => Brand::paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.brands/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:45|unique:brands',
        ]);

        Brand::create($request->all());

        Session::flash('flash_message', 'Brand successfully added!');

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
        return view('admin.brands/show', [
            'brand' => Brand::findOrFail($id)
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
        return view('admin.brands/edit', [
            'brand' => Brand::findOrFail($id)
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
        $brand = Brand::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|min:5|max:45|unique:brands,name,'.$brand->id,
        ]);

        $brand->fill($request->all())->update();

        Session::flash('flash_message', 'Brand successfully updated!');

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
        $brand = Brand::findOrFail($id);

        if ($brand->products->count() > 0) {
            Session::flash('flash_error_message', 'Cant delete becouse brand has products');
        } else {
            $brand->delete();
            Session::flash('flash_message', 'Brand successfully deleted!');
        }

        return redirect()->route('brands.index');
    }
}