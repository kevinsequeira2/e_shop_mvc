<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		$userModel=new UserModel($db);
		//$user=$userModel->find('1');
		$users=$userModel->findAll();
		$users=array('users' =>$users);
		//var_dump($user);
		return view('welcome_message',$users);
	}

	//--------------------------------------------------------------------

}
