<?php

$con = mysqli_connect("localhost","root","","paging");

function pagination($dbcon, $table, $pno, $n){
	$query = $dbcon->query("SELECT COUNT(*) as rows FROM ".$table);
	$row = mysqli_fetch_assoc($query);
	$page_no = $pno;
	$number_of_record_per_page = $n;
	//$total_page = ceil($total_records/$number_of_record_per_page);
	$last_page = ceil($row['rows']/$number_of_record_per_page);
	$pagination = " ";
	if ($last_page != 1) {

		if($page_no > 1){
			$previous = "";
			$previous = $page_no -1;
			$pagination .= "<a href='pagination.php?page_no=".$previous."' style='color:red; text-decoration:none;'> Previous &nbsp; </a>";
		}	

		for($x= $page_no - 5;   $x < $page_no;   $x++){ 

			if($x > 0){
				$pagination .= "<a href='pagination.php?page_no=".$x."' style='text-decoration:none;'> ".$x." </a>";
			}
		}
		$pagination .= "<a href='pagination.php?page_no=".$page_no."' style='red;text-decoration:none;'> ".$page_no." </a>";

		for($x=$page_no + 1;   $x <= $last_page;   $x++){ 
			
			$pagination .= "<a href='pagination.php?page_no=".$x."' style='text-decoration:none;'> ".$x." </a>";
			if($x > $page_no + 5){
				break;
			}
		}
		if($last_page > $page_no){
			$next = "";
			$next = $page_no + 1;
			$pagination .= "<a href='pagination.php?page_no=".$next."' style='color:red; text-decoration:none;'> Next </a>";
		}
	}

	$limit = "LIMIT ".($page_no -1) * $number_of_record_per_page.",".$number_of_record_per_page;
	return ['pagination'=>$pagination, 'limit'=>$limit];
	//return $pagination;
}

if (isset($_GET['page_no'])) {
	$page_no = $_GET['page_no'];
	//echo "<pre>";
	//print_r(pagination($con, 'xxxx', $page_no,10));
	$table = "paragraph";
	$array = pagination($con, $table, $page_no,10);

	$sql = "SELECT * FROM ".$table." ".$array['limit'];

	$query = $con->query($sql);

	while ($row = mysqli_fetch_assoc($query)) {
		
		echo "<div style='margin:0 auto; font-size:20px;' >".$row['pid']."</b> ".$row['name']." ".$row['city']." ".$row['country']."</div>";
	}

	echo "<div style='font-size:22px;'>". $array['pagination']."</div>";
}


























?>