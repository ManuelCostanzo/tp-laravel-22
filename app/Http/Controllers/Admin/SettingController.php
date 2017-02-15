<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Session;


class SettingController extends Controller
{

    public function __construct(Request $request) {}

    public function index() {
        return view('admin.settings/index', ['object' => Setting::findOrFail(1)]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  object  $object
     * @return Response
     */
    public function update($id, Request $request)
    {
        $object = Setting::findOrFail(1);

        $this->validate($request, [
            'title'                 => 'required|min:5|max:45',
            'description'           => 'required|min:5|max:255',
            'contact_email'         => 'required|email',
            'items_per_page'       => 'required|numeric|min:1',
            'site_enabled'               => 'required|boolean',
            'maintenance_message'    => 'required|min:5|max:255'
        ]);

        $object->fill($request->all())->update();

        Session::flash('flash_message', "Settings successfully updated!");

        return redirect()->back();
    }
}