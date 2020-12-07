<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\UserModel;

class AdminController extends BaseController
{

    public $session=null;
	public function __construct(){
		helper('form');
		$this->$session = \Config\Services::session();
	}

    public function estadistic()
    {
     
        $request = \Config\Services::request();

		$db = \Config\Database::connect();
		$builder = $db->select('SELECT count(distinct purchase.id_client) as client_buy,
        sum(buy.quantity) as total_product
        ,sum(purchase.total) as total_cash from purchase INNER JOIN buy',FALSE);
		$query = $builder->get();

		foreach ($query->getResult() as $row)
			{
                    echo $row->client_buy;
                    echo $row->total_product;
                    echo $row->total_cash;
			}
        $estadistic=array('client_buy'=>$row->client_buy,'total_product'=>$row->total_product,'total_cash'=>$row->total_cash);
	    $result= view('users/header').view('users/viewAdmin',$estadistic);
		
		return $result;

    } 



	public function index()
	{

	}

	//--------------------------------------------------------------------

}