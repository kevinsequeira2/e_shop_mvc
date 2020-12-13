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
			$db = \Config\Database::connect();
			$users3 = $userModel->where('email', $email)
				   ->findAll();
			foreach ($users3 as $key) {
				# code...
			}
			
			$query = $db->query('SELECT purchase.total as total,sum(buy.quantity) as cash FROM purchase
			INNER JOIN buy
			on buy.id_client=purchase.id_client and purchase.id_client='.$key['id'].' ');
			$results = $query->getResult();
			foreach ($results as $row)
			{
					
			}
			$estadistic=array('cash'=>$row->cash,'total'=>$row->total,'id'=>$key['id']);
			return view('users/header').view('users/viewClient',$estadistic);
		}
		elseif ($email==$row->email && $password==$row->password && 'admin'==$row->type) {

			$db2 = \Config\Database::connect();
			$query2 = $db2->query('SELECT count(distinct purchase.id_client) as client_buy,
			sum(buy.quantity) as total_product
			,sum(purchase.total) as total_cash from purchase INNER JOIN buy');
			$results = $query2->getResult();

			foreach ($results as $row2)
			{
					echo $row2->client_buy;
					echo $row2->total_product;
					echo $row2->total_cash;
			}
			$estadistic=array('email'=>$email,'client_buy'=>$row2->client_buy,'total_product'=>$row2->total_product,'total_cash'=>$row2->total_cash);
			$result= view('users/header').view('users/viewAdmin',$estadistic);
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