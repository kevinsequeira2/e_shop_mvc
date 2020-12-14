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

    public function viewCar()
    {
        $userModel=new UserModel($db);
			$users3 = $userModel->where('email', $this->$session->get('email'))
				   ->findAll();
			foreach ($users3 as $key) {
				# code...
			}
        $db = \Config\Database::connect();
        $query = $db->query('SELECT c.quantity,p.id,p.name,p.id_category,p.description,p.Precio,p.Stock,p.SKU,p.image from products as p
        INNER JOIN car as c 
        on p.id = c.id_product
        INNER JOIN users as u
        on c.id_client = u.id and id_client = '.$key['id'].' ');
        $results = $query->getResult();
        $content=array('content'=>$results);
        return view('users/header').view('client/ViewCarClient',$content);
    }
    public function updateCar()
    {
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
        $userModel=new UserModel($db);
			$users3 = $userModel->where('email', $this->$session->get('email'))
				   ->findAll();
			foreach ($users3 as $key) {
				# code...
			}
        
        $query = $db->query('SELECT c.quantity,p.id,p.name,p.id_category,p.description,p.Precio,p.Stock,p.SKU,p.image from products as p
        INNER JOIN car as c 
        on p.id = c.id_product
        INNER JOIN users as u
        on c.id_client = u.id and id_client = '.$key['id'].' ');
        $results = $query->getResult();
        $content=array('content'=>$results);
        $id_client= $key['id'];
        $id_product= $request->getPostGet('id');
        $sql = "UPDATE car SET quantity=quantity+1 WHERE id_client = '$id_client' and id_product = '$id_product' ";
        $db->query($sql);
        $sql2 = "UPDATE products SET Stock=Stock-1 WHERE id = '$id_product' ";
        $db->query($sql2);

        return view('users/header').view('client/ViewCarClient',$content);
    }
    public function deleteCar()
    {
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
        $userModel=new UserModel($db);
			$users3 = $userModel->where('email', $this->$session->get('email'))
				   ->findAll();
			foreach ($users3 as $key) {
				# code...
			}
        
        $query = $db->query('SELECT c.quantity,p.id,p.name,p.id_category,p.description,p.Precio,p.Stock,p.SKU,p.image from products as p
        INNER JOIN car as c 
        on p.id = c.id_product
        INNER JOIN users as u
        on c.id_client = u.id and id_client = '.$key['id'].' ');
        $results = $query->getResult();
        $content=array('content'=>$results);
        $id_client= $key['id'];
        $id_product= $request->getPostGet('id');
        $sql = "DELETE FROM car WHERE id_client = '$id_client' and id_product = '$id_product' ";
        $db->query($sql);

        return view('users/header').view('client/ViewCarClient',$content);
    }

    public function checkout()
    {
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
        $userModel=new UserModel($db);
			$users3 = $userModel->where('email', $this->$session->get('email'))
				   ->findAll();
			foreach ($users3 as $key) {
				# code...
			}
        
        $query = $db->query('SELECT sum(quantity) as total_of_products,sum(quantity*products.Precio) as total
        from car INNER JOIN products
        on id_product=products.id and  id_client= '.$key['id'].' ');
        $results = $query->getResult();
        $content=array('content'=>$results);
        $id_client= $key['id'];
        $id_product= $request->getPostGet('id');
        $code=random_int(100,100000);
        $date=date('Y/m/d H:i:s');
        $sql = "INSERT INTO buy(id_client,id_product,quantity,code,date) SELECT id_client,id_product,quantity,'$code','$date' FROM car
        WHERE id_client = '$id_client' ";
        $db->query($sql);
        $sql2 = "INSERT INTO purchase(id_client,code,date,total) 
        SELECT id_client,'$code','$date',sum(products.Precio*car.quantity) FROM car
        INNER JOIN products on car.id_product=products.id and car.id_client= '$id_client' ";
        $db->query($sql2);

        return view('users/header').view('client/ViewCheckout',$content);
    }

    public function dropCar()
    {
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
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
        $id_client= $key['id'];
        $id_product= $request->getPostGet('id');
        $sql = "DELETE FROM car WHERE id_client = '.$id_client.' ";
        $db->query($sql);

        return view('users/header').view('users/ViewClient',$estadistic);
    }

    public function total()
    {
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
        $userModel=new UserModel($db);
			$users3 = $userModel->where('email', $this->$session->get('email'))
				   ->findAll();
			foreach ($users3 as $key) {
				# code...
			}

        $query = $db->query('SELECT *FROM purchase WHERE id_client = '.$key['id'].' ');
		$results = $query->getResult();
        $estadistic=array('content'=>$results);
        return view('users/header').view('client/ViewBuyUser',$estadistic);
    }

    public function especifict()
    {
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
        $userModel=new UserModel($db);
			$users3 = $userModel->where('email', $this->$session->get('email'))
				   ->findAll();
			foreach ($users3 as $key) {
				# code...
			}
        $id_client= $key['id'];
        $id= $request->getPostGet('id');
        $query = $db->query('SELECT buy.date,(buy.quantity*products.Precio) as total,products.description,products.Precio FROM buy 
        INNER JOIN products
        on buy.id_product=products.id and buy.id_client= '.$id_client.'
        INNER JOIN purchase
        on purchase.id_client = buy.id_client and purchase.code=buy.code and buy.code='.$id.' ');
		$results = $query->getResult();
        $estadistic=array('content'=>$results);
        return view('users/header').view('client/ViewEspecifict',$estadistic);
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