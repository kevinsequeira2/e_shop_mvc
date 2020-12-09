<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\CategoryModel;

class CategoryController extends BaseController
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

	public function saveCategory(){
		$categoryModel=new CategoryModel($db);		
		$request = \Config\Services::request();

		$data =array('name' => $request->getPostGet('name'));

		if ($request->getPostGet('id')) {
			$data['id']=$request->getPostGet('id');
		}

		if ($request->getPostGet('id')) {
			//$categories=$categoryModel->findAll();
            $categories=$categoryModel->find([$request->getPostGet('id')]);
			$categories=array('categories' =>$categories);
			$result= view("users/header").view("admin/Viewcategory",$categories);
		}
		if ($categoryModel->save($data)){
			$categoryModel=new CategoryModel($db);
			$categories=$categoryModel->findAll();
			$categories=array('categories' =>$categories);
			$result= view("users/header").view("admin/Viewcategory",$categories);
            }

			return $result;
    }
    public function insertCategory(){
        $request = \Config\Services::request();
        $data =array('name' => $request->getPostGet('name'));
        $categoryModel=new CategoryModel($db);
        if($categoryModel->insert($data)){
            
            $categoryModel=new CategoryModel($db);
			$categories=$categoryModel->findAll();
			$categories=array('categories' =>$categories);
			$result= view("users/header").view("admin/Viewcategory",$categories);
            }
			return $result;
    }
    public function addCategory(){

			return view("users/header").view("admin/ViewaddCategory");
    }
    public function back(){
        $db2 = \Config\Database::connect();
		$query2 = $db2->query('SELECT count(distinct purchase.id_client) as client_buy,
		sum(buy.quantity) as total_product
		,sum(purchase.total) as total_cash from purchase INNER JOIN buy');
		$results = $query2->getResult();

		foreach ($results as $row2)
			{
			}
		$estadistic=array('email'=>$email,'client_buy'=>$row2->client_buy,'total_product'=>$row2->total_product,'total_cash'=>$row2->total_cash);

        return view('users/header').view('users/viewAdmin',$estadistic);
    }

	public function editCategory(){
		$categoryModel=new CategoryModel($db);		
		$request = \Config\Services::request();
		$id=$request->getPostGet('id');
		$categories=$categoryModel->find([$id]);
		$categories=array('categories' =>$categories);
		return view("users/header").view("admin/Viewcategory",$categories);
    }
    public function deleteCategory(){
		$categoryModel=new CategoryModel($db);		
		$request = \Config\Services::request();
		$id=$request->getPostGet('id');
		$categoryModel->delete($id);
		$categories=$categoryModel->findAll();
		$categories=array('categories' =>$categories);
		return view("users/header").view("admin/Viewcategory",$categories);
	}

	public function index()
	{

	}

	//--------------------------------------------------------------------

}