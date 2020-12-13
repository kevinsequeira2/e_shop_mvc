<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\UserModel;
use App\Models\ProductsModel;
use App\Models\CategoryModel;
use App\Models\CarModel;

class ClientController extends BaseController
{
    public $session=null;
	public function __construct(){
		helper('form');
		$this->$session = \Config\Services::session();
    }
    

    public function buyCar()
    {
        $request = \Config\Services::request();
        $carModel=new CarModel($db);
        $userModel=new UserModel($db);
		$users3 = $userModel->where('email', $this->$session->get('email'))
				   ->findAll();
			foreach ($users3 as $key) {
				# code...
			}
			
        $data = [
            'id_product' => $request->getPostGet('id'),
            'id_client'    => $key['id'],
            'date' => date('Y/m/d H:i:s')
        ];
        
        $carModel->insert($data);
        
        $categoryModel=new CategoryModel($db);
		$categories=$categoryModel->findAll();
        
        
        $productsModel=new ProductsModel($db);
        $products = $productsModel->where('id_category',$request->getPostGet('id_category') )
                   ->findAll();

        $categories=array('categories' =>$categories,'products'=>$products);
        
        return view("users/header").view("client/ViewProductsClient",$categories);
    }

    public function viewclientCategories()
    {
        $request = \Config\Services::request();
        $categoryModel=new CategoryModel($db);
		$categories=$categoryModel->findAll();
        
        
        $productsModel=new ProductsModel($db);
        $products = $productsModel->where('id_category',$request->getPostGet('id_category') )
                   ->findAll();

        $categories=array('categories' =>$categories,'products'=>$products);
        
        return view("users/header").view("client/ViewProductsClient",$categories);
    }

    public function viewclientProducts()
    {
        $request = \Config\Services::request();
        $categoryModel=new CategoryModel($db);
		$categories=$categoryModel->findAll();
        
        $productsModel=new ProductsModel($db);
        $products = $productsModel->where('id_category',$request->getPostGet('id_category') )
                   ->findAll();
        $categories=array('categories' =>$categories,'products'=>$products);
        
        return view("users/header").view("client/ViewProductsClient",$categories);
        
    }
    public function backClient()
    {
        $db = \Config\Database::connect();
        $userModel=new UserModel($db);
			$users3 = $userModel->where('email', $this->$session->get('email'))
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