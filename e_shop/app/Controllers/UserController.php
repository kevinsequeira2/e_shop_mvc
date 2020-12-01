<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\UserModel;

class UserController extends BaseController
{
	public $session=null;
	public function __construct(){
		helper('form');
		$this->$session = \Config\Services::session();
	}

	public function firstView(){

		return view('users/header').view('users/viewLogin');
	}
	public function register(){
		return view('users/header').view('users/viewSingnup');
	}
	public function addUser(){
		$userModel=new UserModel($db);		
		$request = \Config\Services::request();
		$data =array('user' => $request->getPostGet('name'), 
					'lastName' => $request->getPostGet('lastName'),
					'email' => $request->getPostGet('email'),
					'cellPhone' => $request->getPostGet('cellPhone'),
					'address' => $request->getPostGet('address'),
					'type' => 'client',
					'password' => $request->getPostGet('password')
				);
		

		if ($userModel->save($data)){
			$userModel=new UserModel($db);
			$result= view('users/header').view('users/viewLogin');
		}
		return $result;
	}
	public function validLogin(){
		$request = \Config\Services::request();
		$userModel=new UserModel($db);
		
		$newdata = [
        'email'  => $request->getPostGet('email'),
        'password' => $request->getPostGet('password'),
        'logged_in' => TRUE
			];

		$this->$session->set($newdata);
		
		
		$email=$this->$session->get('email');
		$password=$this->$session->get('password');
		
		$sql = "SELECT * FROM users WHERE email = ? AND password = ? ";
		$dbuser=$userModel->query($sql, [$this->$session->get('email'),$this->$session->get('password')]);

		$row = $dbuser->getRow();
		
		if($email==$row->email && $password==$row->password && 'client'==$row->type){
			$users=array('email'=>$email);
			$result= view('users/header').view('users/viewClient',$users);
		}
		elseif ($email==$row->email && $password==$row->password && 'admin'==$row->type) {
			$users=array('email'=>$email);
			$result= view('users/header').view('users/viewAdmin',$users);
		}
		else{
			$users=array('error'=>'error user no find');
			$result= view('users/header').view('users/viewLogin',$users);
		}
		
		return $result;
	}

	public function index()
	{
		return view('users/header').view('users/viewWelcome');
	}

	//--------------------------------------------------------------------

}