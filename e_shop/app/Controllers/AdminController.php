<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductsModel;

class AdminController extends BaseController
{

    public $session=null;
	public function __construct(){
		helper('form');
		$this->$session = \Config\Services::session();
	}

    public function category()
	{	
		$categoryModel=new CategoryModel($db);
		$categories=$categoryModel->findAll();
		$categories=array('categories' =>$categories);
        return view("users/header").view("admin/Viewcategory",$categories);
	}

	public function products()
	{	
		$categoryModel=new CategoryModel($db);
		$categories=$categoryModel->findAll();

		$productsModel=new ProductsModel($db);
		$products=$productsModel->findAll();
		$products=array('products' =>$products,'categories' =>$categories);
        return view("users/header").view("admin/Viewproducts",$products);
	}

	

	public function index()
	{

	}

	//--------------------------------------------------------------------

}