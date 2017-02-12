<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;
use Session;

class ProviderController extends Controller
{

    public function __construct()
    {
    }


   public function index()
    {
        return view('admin.providers/index', [
            'providers' => Provider::paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.providers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:45|unique:providers',
            'cuit' => 'required|numeric|unique:providers',
        ]);

        Provider::create($request->all());

        Session::flash('flash_message', 'Provider successfully added!');

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
        return view('admin.providers/show', [
            'provider' => Provider::findOrFail($id)
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
        return view('admin.providers/edit', [
            'provider' => Provider::findOrFail($id)
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
        $provider = Provider::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|min:5|max:45|unique:providers,name,'.$provider->id,
            'cuit' => 'required|min:5|max:45|unique:providers,cuit,'.$provider->id,
        ]);

        $provider->fill($request->all())->update();

        Session::flash('flash_message', 'Provider successfully updated!');

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
        $provider = Provider::findOrFail($id);

        if ($provider->products->count() > 0) {
            Session::flash('flash_error_message', 'Cant delete becouse provider has products');
        } else {
            $provider->delete();
            Session::flash('flash_message', 'Provider successfully deleted!');
        }

        return redirect()->route('providers.index');
    }
}