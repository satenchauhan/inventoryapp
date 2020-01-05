<?php

include_once('../database/db.php'); 

class Manage{

		private $dbcon;

		public function __construct(){

			$db = new Database();
			$this->dbcon = $db->connect();
		}

		public function manageDataWithPagination($table, $pno){
			$p = $this->pagination($this->dbcon,$table,$pno,5);
			if($table == "categories"){
				$sql ="SELECT p.`category_name` as category, s.`category_name` as subcategory,p.status,p.cat_id FROM categories p LEFT JOIN categories s ON p.parent_cat = s.cat_id ".$p['limit'];

			}else if($table == "products"){
               $sql ="SELECT p.p_id, p.product_name,c.category_name,b.brand_name,p.product_price,p.product_stock,p.created_at,p.p_status FROM products p, brands b, categories c WHERE p.brand_id = b.brand_id AND p.cat_id = c.cat_id ".$p['limit'];

			}else{
				$sql ="SELECT * FROM ".$table." ".$p['limit'];
			}
			$result = $this->dbcon->query($sql) or die($this->dbcon->error);
			$rows = array();
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$rows[] = $row;
				}
			}
			return ["rows"=>$rows, "pagination"=>$p["pagination"]];
			
		} 

		private function pagination($dbcon, $table, $pno, $n){
			$query = $dbcon->query("SELECT COUNT(*) as rows FROM ".$table);
			$row = mysqli_fetch_assoc($query);
			$page_no = $pno;
			$number_of_record_per_page = $n;
			//$total_page = ceil($total_records/$number_of_record_per_page);
			$last_page = ceil($row['rows']/$number_of_record_per_page);
			//echo "Total pages " .$last_page. "<br>";
			$pagination = "<ul class='pagination'>";
			if ($last_page != 1) {

				if($page_no > 1){
					$previous = "";
					$previous = $page_no -1;
					//$pagination .= "<a href='pagination.php?page_no=".$previous."' style='color:red; text-decoration:none;'> Previous &nbsp; </a>";
					$pagination .="<li class='page-item'><a class='page-link' pn='".$previous."' href='#' style='color:red; text-decoration:none;'> Previous &nbsp; </a></li>";
				}	
				for($x= $page_no - 5;   $x < $page_no;   $x++){ 

					if($x > 0){
						//$pagination .= "<a href='pagination.php?page_no=".$x."' style='text-decoration:none;'> ".$x." </a>";
						$pagination .="<li class='page-item'><a class='page-link' pn='".$x."' href='#' style='text-decoration:none;'> ".$x." </a></li>";
					}
				}
				//$pagination .= "<a href='pagination.php?page_no=".$page_no."' style='red;text-decoration:none;'> ".$page_no." </a>";
				$pagination .= "<li class='page-item'><a class='page-link' pn='".$page_no."' href='#' style='red;text-decoration:none;'> ".$page_no." </a></li>";

				for($x=$page_no + 1;   $x <= $last_page;   $x++){ 
					//$pagination .= "<a href='pagination.php?page_no=".$x."' style='text-decoration:none;'> ".$x." </a>";
					$pagination .="<li class='page-item'><a class='page-link' pn='".$x."' href='#' style='text-decoration:none;'> ".$x." </a></li>";
					if($x > $page_no + 5){
						break;
					}
				}
				if($last_page > $page_no){
					$next = "";
					$next = $page_no + 1;
					//$pagination .= "<a href='pagination.php?page_no=".$next."' style='color:red; text-decoration:none;'> Next </a>";
					$pagination .= "<li class='page-item'><a class='page-link' pn='".$next."' href='#' style='color:red; text-decoration:none;'> Next </a></li></ul>";
				}
			}

			$limit = "LIMIT ".($page_no -1) * $number_of_record_per_page.",".$number_of_record_per_page;
			return ['pagination'=>$pagination, 'limit'=>$limit];
			//return $pagination;

		}

		public function delete_category($table,$pid, $id){
			if($table == "categories"){
				$sql = "SELECT cat_id FROM ".$table." WHERE parent_cat=?";
				$stmt = $this->dbcon->prepare($sql);
				$stmt->bind_param('i',$id);
				$stmt->execute() or die($this->dbcon->error);
				$result = $stmt->get_result();
				if($result->num_rows >0){
					return "Main_Category";
				}else{
					$sql= "DELETE FROM ".$table." WHERE ".$pid." =?";
					$stmt = $this->dbcon->prepare($sql);
					$stmt->bind_param('i',$id);
					$result = $stmt->execute() or die($this->dbcon->error);
					if($result){
						return "Category_Deleted";
					}
				} 
			}else{
			    $sql= "DELETE FROM ".$table." WHERE ".$pid." = ?";
				$stmt = $this->dbcon->prepare($sql);
				$stmt->bind_param('i',$id);
				$result = $stmt->execute() or die($this->dbcon->error);
				if($result){
					return "Deleted";
				}

			}
		}

		public function get_single_record($table, $pid, $id){
			$sql = "SELECT * FROM ".$table." WHERE ".$pid."= ? LIMIT 1";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param('i',$id);
			$stmt->execute() or die($this->dbcon->error);
			$result = $stmt->get_result();
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
			}
			return $row;

		}
		    
		public function update_record($table, $where, $fields){
			$sql = "";
			$condition = "";
			foreach ($where as $key => $value) {

			  $condition .= $key . "='" . $value . "' AND ";
			}
			$condition = substr($condition, 0, -5);

			foreach ($fields as $key => $value) {
			 //Updaate table SET m_name = '', qty = '' WHERE ID = ''
				$sql .= $key . "='" . $value ."', ";
			}
			$sql = substr($sql, 0, -2);
			$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
			if(mysqli_query($this->dbcon,$sql)){
				return "Updated";
			}
		}
		  
		public function save_customer_order_invoice($order_date,$customer_name,$arr_total_qty,$arr_qty,$arr_price,$arr_pro_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_method){
			if($discount < $sub_total){
			   $discount = 0;
			}
			if($paid > $net_total){
			   $paid = 0;
			}

			$sql ="INSERT INTO `invoice`(`customer_name`,`order_date`,`sub_total`,`gst`,`discount`, `net_total`,`paid`,`due`,`payment_method`) VALUES (?,?,?,?,?,?,?,?,?)";
			$stmt = $this->dbcon->prepare($sql);
			$stmt->bind_param('ssdddddds',$customer_name,$order_date,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_method);
			$stmt->execute() or die($this->dbcon->error);
			$invoice_no = $stmt->insert_id;
			if ($invoice_no != null) {
				for($i=0; $i < count($arr_price); $i++){

				    $remaining_qty = $arr_total_qty[$i] - $arr_qty[$i];

					if($remaining_qty < 0 ){

						return "Out of Stock";

					}else{
						// Update product stock
						$sql = "UPDATE products SET product_stock='$remaining_qty' WHERE product_name='".$arr_pro_name[$i]."'";
						$this->dbcon->query($sql);
					}

					$sql ="INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `price`, `qty`) VALUES (?,?,?,?)";
				    $insert_product = $this->dbcon->prepare($sql);	
				    $insert_product->bind_param("isdd", $invoice_no,$arr_pro_name[$i],$arr_price[$i],$arr_qty[$i]);
				    $insert_product->execute() or die($this->dbcon->error);
				}

				return "Order_Saved";
				
			}

			
		}  
}

//$obj = new Manage();
//echo "<pre>";
//print_r($obj->manageDataWithPagination("categories",1));
//echo $obj->delete_category("categories","cat_id",16);
//print_r($obj->get_single_record("categories","cat_id",5));\
//echo $obj->update_record("categories",['cat_id'=>1],['parent_cat'=>0,"category_name"=>"Electronics","status"=>1]);