<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

abstract class ResourceController extends Controller
{

	public function index()
	{
		$this->array[$this->route_name] = $this->class::paginate(2);

		return view($this->view_path . '/index', $this->array);
	}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
	public function show($id)
	{
		$this->array[$this->item_name] = $this->getItem($id);

		return view($this->view_path . '/show', $this->array);
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->view_path . '/create', $this->array);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

    	$this->validator($this->store_validates(), $request);

        $this->class::create($this->modify_request($request)->all());

        Session::flash('flash_message', "$this->item_name successfully added!");

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    	$this->array[$this->item_name] = $this->getItem($id);

        return view($this->view_path . '/edit', $this->array);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  object  $object
     * @return Response
     */
    public function update($id, Request $request)
    {
    	$object = $this->getItem($id);

    	$this->validator($this->update_validates($object), $request);

        $object->fill($this->modify_request($request)->all())->update();

        Session::flash('flash_message', "$this->item_name successfully updated!");

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
        $object = $this->class::findOrFail($id);

		try {
	       $object->delete();
           Session::flash('flash_message', "$this->item_name successfully deleted!");
	    } catch ( \Exception $e) {
	       Session::flash('flash_error_message', "Cant delete becouse $this->item_name has items related");
	    }

        return redirect()->route($this->route_name . '.index');
    }


    public function search(Request $request) {

    	$this->validator($this->search_validates(), $request);

		return view($this->view_path . '/index', $this->search_condition($request));
    }

    public function search_validates() {
        return ['q' => 'required|max:255'];
    }

    protected function validator($validators, Request $request) {

        $this->validate($request, $validators);
    }

    protected function getItem($id) {
		return $this->class::findOrFail($id);
    }

    public function modify_request(Request $request) {
    	return $request;
    }
}