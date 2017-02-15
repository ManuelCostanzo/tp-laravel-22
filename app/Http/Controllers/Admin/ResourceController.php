<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

abstract class ResourceController extends Controller
{

	public function index()
	{
		$this->array['objects'] = $this->class->paginate(2);

        $this->parameters_to_index();

        return $this->show_view('index', $this->array);
	}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
	public function show($id)
	{
		$this->array['object'] = $this->getItem($id);

        $this->parameters_to_show();


        return $this->show_view('show', $this->array);
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->array['action'] = 'create';
 
        $this->parameters_to_create_edit();

        return $this->show_view('create-edit', $this->array);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    	$this->validator($this->store_validates(), $request);

        $object = $this->class->create($this->modify_request($request)->all());

        $this->after_store($object, $request);

        Session::flash('flash_message', "$this->object_name successfully added!");

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
    	$this->array['object'] = $this->getItem($id);

        $this->array['action'] = 'edit';

        $this->parameters_to_create_edit();

        return $this->show_view('create-edit', $this->array);
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

        $this->after_update($object, $request);

        Session::flash('flash_message', "$this->object_name successfully updated!");

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
        $object = $this->class->findOrFail($id);

		try {
	       $object->delete();

           Session::flash('flash_message', "$this->object_name successfully deleted!");

	    } catch ( \Exception $e) {

	       Session::flash('flash_error_message', "Cant delete becouse $this->object_name has items related");
	    }

        return redirect()->route($this->route_name . '.index');
    }


    public function search(Request $request) {

    	$this->validator($this->search_validates(), $request);

        return $this->show_view('index', $this->search_condition($request));
    }




    ###### FUNCIONES PARA AGREGAR FUNCIONALIDAD #########

    protected function after_store($object, Request $request) {}

    protected function after_update($object, Request $request) {}

    protected function parameters_to_index() {
        #this->array['objects'] = $datas
    }

    protected function parameters_to_show() {
        #this->array['objects'] = $datas
    }

    protected function parameters_to_create_edit() {
        #$this->array['key'] = $datas
    }

    protected function search_validates() {

        return ['q' => 'required|max:255'];
    }

    protected function modify_request(Request $request) {
    	return $request;
    }

    protected function show_view($section, $params) {
        return view('admin.resource', $params, $this->get_view_params($section));
    }

    protected function get_view_params($section) {
        return [
            'view' => $section, 
            'route' => $this->route_name,
            'object_name' => $this->object_name
        ];
    }


    ###### FUNCIONES PRIVADAS #########
    private function validator($validators, Request $request) {

        $this->validate($request, $validators);
    }

    private function getItem($id) {

        return $this->class->findOrFail($id);
    }
}