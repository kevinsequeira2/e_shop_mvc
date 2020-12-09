<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\ProductsModel;

class ProductsController extends BaseController
{
    public $session=null;
	public function __construct(){
		helper('form');
		$this->$session = \Config\Services::session();
	}

    public function products()
	{	
		$productsModel=new ProductsModel($db);
		$products=$productsModel->findAll();
		$products=array('products' =>$products);
        return view("users/header").view("admin/Viewproducts",$products);
	}


	public function index()
	{

	}

	//--------------------------------------------------------------------

}
