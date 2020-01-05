<?php

include_once('../database/db.php'); 
// include_once('process.php');

class Dbmodel {

	private $dbcon;

	public function __construct(){
		
		$db = new Database();
		$this->dbcon = $db->connect();
	}
//==Category Process====================================================================
	private function main_category_exists($category){
		$sql = "SELECT * FROM `categories` WHERE `category_name`=?";
		$stmt = $this->dbcon->prepare($sql);
		$stmt->bind_param("s", $category);
		$stmt->execute() or die($this->dbcon->error);
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			return 1;
		}else{
			return 0;
		}

	}

	public function addCategory($parent, $category){

		if ($this->main_category_exists($category)) {
			return "Category or Subcategory already exists";


		}else{
			$stmt = $this->dbcon->prepare("INSERT INTO `categories`(`parent_cat`,`category_name`, `status`) VALUES(?,?,?)");
			$status = 1;
			$stmt->bind_param("isi",$parent,$category, $status);
			$result = $stmt->execute() or die($this->dbcon->error);
			if($result){
				if($parent == 0 ){
					return 'Main category';
				}else{
					return 'Subcategory';
				}
				//header("Location: templates/category.php?added");
			}else{

				return 0;
			}
		}

	}

	public function getAllcategory($table){

		$stmt= $this->dbcon->prepare("SELECT * FROM ".$table);
		$stmt->execute() or die($this->dbcon->error);
		$result = $stmt->get_result();
		$rows = array();
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;

			}
			return $rows;
		}
		return "No Data";
	}

//==Brand Process
    private function brand_exists($brand){
    	$sql = "SELECT * FROM `brands` WHERE `brand_name`=?";
    	$stmt = $this->dbcon->prepare($sql);
    	$stmt->bind_param('s', $brand);
    	$stmt->execute() or die($this->dbcon->error);
    	$result = $stmt->get_result();
    	if($result->num_rows > 0){
    		return 1;
    	}else{
    		return 0 ;
    	}

    }

    public function addBrand($brand){

    	if($this->brand_exists($brand)){

    		return "This brand already exists";

    	}else{

    		$sql = "INSERT INTO `brands`(`brand_name`,`status`) VALUES(?,?)";
    		$status = 1;
    		$stmt = $this->dbcon->prepare($sql);
    		$stmt->bind_param('si', $brand, $status);
    		$result = $stmt->execute() or die($ths->dbcon->error);
    		if($result) {
    			return "success";
    		}else{

    			return "error";
    		}


    	}
    }

    public function getAllBrands($table){
       $stmt =  $this->dbcon->prepare("SELECT * FROM ".$table);
       $stmt->execute() or die($this->dbcon->error);
       $result = $stmt->get_result();
       $rows = array();
       if ($result->num_rows > 0) {
       	 while($row = $result->fetch_assoc()){
       	 	$rows[] = $row;
       	 }
       	 return $rows;
       }
       return "No Data";

    }

  

//====Add Products===============================
     private function product_exists($product){
    	$sql = "SELECT `p_id` FROM `products` WHERE `product_name`=?";
    	$stmt = $this->dbcon->prepare($sql);
    	$stmt->bind_param('s', $product);
    	$stmt->execute() or die($this->dbcon->error);
    	$result = $stmt->get_result();
    	if($result->num_rows > 0){
    		return 1;
    	}else{
    		return 0 ;
    	}

    }

    public function addProduct($cat_id,$brand_id,$product_name,$product_price,$product_stock){

    	if($this->product_exists($product_name)){

    		return "This product already exists";

    	}else{

    		$sql = "INSERT INTO `products`(`cat_id`,`brand_id`,`product_name`,`product_price`,`product_stock`,`p_status`,`created_at`) VALUES(?,?,?,?,?,?,?)";
    		$p_status = 1;
            $date = date('Y-m-d H:i:s'); 
    		$stmt = $this->dbcon->prepare($sql);
    		$stmt->bind_param('iisdiis', $cat_id,$brand_id,$product_name,$product_price,$product_stock,$p_status, $date);
    		$result = $stmt->execute() or die($ths->dbcon->error);
    		if($result) {
    			return "success";
    		}else{

    			return "error";
    		}


    	}
    }






}




//$dbdata = new Dbmodel();
//$dbdata->addCategory(0, 'Cars');
//echo "<pre>";
//print_r($dbdata->getAllcategory("categories"));


