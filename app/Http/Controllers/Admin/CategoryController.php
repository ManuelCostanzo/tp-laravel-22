<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Session;

class CategoryController extends Controller
{

   public function index()
    {
        return view('admin.categories/index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories/create', ['categories' => Category::all()]);
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

        $input = $request->all();

        Category::create($input);

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
        $cat = Category::findOrFail($id);

        return view('admin.categories/show')->withCategory($cat);
    }
        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $cat = Category::findOrFail($id);

        return view('admin.categories/edit', [
            'category' => $cat, 
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
        $cat = Category::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|min:5|max:45|unique:categories,name,'.$cat->id,
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $input = $request->all();

        $cat->fill($input)->update();

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
        $cat = Category::findOrFail($id);

        $cat->delete();

        Session::flash('flash_message', 'Category successfully deleted!');

        return redirect()->route('categories.index');
    }
}