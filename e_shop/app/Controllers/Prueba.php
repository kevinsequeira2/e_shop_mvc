<?php namespace App\Controllers;

class Prueba extends BaseController
{
	public function index()
	{
		return view('Vprueba');
	}

	public function crack()
	{
		$datos['data']='eres un pro';
		return view('Vprueba',$datos).view('h1');
	}

	public function pro()
	{
		$datos['data']='eres un pro';
		return view('Vprueba',$datos).view('h1').view('table');
	}

	//--------------------------------------------------------------------

}
