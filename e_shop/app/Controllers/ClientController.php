<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\UserModel;
use App\Models\ProductsModel;
use App\Models\CategoryModel;

class ClientController extends BaseController
{
    public $session=null;
	public function __construct(){
		helper('form');
		$this->$session = \Config\Services::session();
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
        return view('users/header').view('users/viewClient');
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