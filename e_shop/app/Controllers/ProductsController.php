<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\ProductsModel;
use App\Models\CategoryModel;

class ProductsController extends BaseController
{
    public $session=null;
	public function __construct(){
		helper('form');
		$this->$session = \Config\Services::session();
    }
    

    public function products()
	{	
        $categoryModel=new CategoryModel($db);
		$categories=$categoryModel->findAll();

		$productsModel=new ProductsModel($db);
		$products=$productsModel->findAll();
		$products=array('products' =>$products);
        return view("users/header").view("admin/Viewproducts",$products);
    }
    public function getProducts(){

        return view("users/header").view("admin/VieweditProducts");
    }

    public function edit_Products(){
		$productsModel=new ProductsModel($db);		
		$request = \Config\Services::request();
        $destino = 'assets/img/'.$request->getPostGet('image');
		$data =array('SKU' => $request->getPostGet('SKU'),'description' => $request->getPostGet('description'),
        'image' => $destino,'Precio' => $request->getPostGet('Precio'),'Stock' => $request->getPostGet('Stock'),
        'name' => $request->getPostGet('name'),'id_category' => $request->getPostGet('id_category'));
        $id=$request->getPostGet('id');
		
        $productsModel->update($id,$data);
        $categoryModel=new CategoryModel($db);
		$categories=$categoryModel->findAll();
		$productsModel=new ProductsModel($db);
		$products=$productsModel->findAll();
		$products=array('products' =>$products,'categories' =>$categories);
		$result= view("users/header").view("admin/Viewproducts",$products);
            

		return $result;
    }

    public function editProducts(){
		$productsModel=new ProductsModel($db);		
		$request = \Config\Services::request();
		$id=$request->getPostGet('id');
		$products=$productsModel->find([$id]);
		$products=array('products' =>$products);
		return view("users/header").view("admin/VieweditProducts",$products);
    }

    public function deleteProducts(){
        $categoryModel=new CategoryModel($db);
	    $categories=$categoryModel->findAll();
		$productsModel=new ProductsModel($db);		
		$request = \Config\Services::request();
		$id=$request->getPostGet('id');
		$productsModel->delete($id);
		$products=$productsModel->findAll();
		$products=array('products' =>$products,'categories' =>$categories);
		return view("users/header").view("admin/Viewproducts",$products);
	}

    Public function saveProducts(){
        $request = \Config\Services::request();
        $destino = 'assets/img/'.$request->getPostGet('image');
        $data =array('SKU' => $request->getPostGet('SKU'),'description' => $request->getPostGet('description'),
        'image' => $destino,'Precio' => $request->getPostGet('Precio'),'Stock' => $request->getPostGet('Stock'),
        'id_category' => $request->getPostGet('id_category'),'name' => $request->getPostGet('name'));
        $productsModel=new ProductsModel($db);
        if($productsModel->insert($data)){
            $categoryModel=new CategoryModel($db);
		    $categories=$categoryModel->findAll();

            $productsModel=new ProductsModel($db);
			$products=$productsModel->findAll();
			$products=array('products' =>$products,'categories' =>$categories);
			$result= view("users/header").view("admin/Viewproducts",$products);
            }
			return $result;
    }

	public function index()
	{

	}

	//--------------------------------------------------------------------

}
