<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{

	public function __construct()
	{
        $this->middleware('auth');
	}

    public function index() {

    	echo 'Management panel';
    }
}
