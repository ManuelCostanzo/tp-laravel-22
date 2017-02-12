<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Session;

class CategoryController extends Controller
{

    public function __construct()
    {
    }

   public function index()
    {
        return view('admin.categories/index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories/create', [
            'categories' => Category::pluck('name', 'id')
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
            'name' => 'required|min:5|max:45|unique:categories',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create($request->all());

        Session::flash('flash_message', 'Category successfully added!');

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
        return view('admin.categories/show', [
            'category' => Category::findOrFail($id)
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
        return view('admin.categories/edit', [
            'category' => Category::findOrFail($id), 
            'categories' => Category::pluck('name', 'id')
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
        $category = Category::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|min:5|max:45|unique:categories,name,'.$category->id,
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $category->fill($request->all())->update();

        Session::flash('flash_message', 'Category successfully updated!');

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
        $category = Category::findOrFail($id);

        if (($category->children->count() > 0) || ($category->products->count() > 0)) {
            Session::flash('flash_error_message', 'Cant delete becouse category has childrens or products');
        } else {
            $category->delete();
            Session::flash('flash_message', 'Category successfully deleted!');
        }

        return redirect()->route('categories.index');
    }
}