<?php 
include"includes/dbconnect.php";
$page = "";
if(isset($_GET['page'])) {
	$page = $_GET['page'];
}
if($page == "" || $page == "1") {
	$page1 = 0;
} else {
   $page1 = ($page * 5) - 5;  
}	 
$sql = "SELECT * FROM coursecontents LIMIT $page1,5";
$query = $conn->query($sql);
while($row = mysqli_fetch_array($query)) {
	echo $row["content_id"]." ".$row['course_title'];
	echo '<br />'.'<br />';
}
$sql1 = "SELECT * FROM coursecontents";
$query1 = $conn->query($sql1);
$rowcount = mysqli_num_rows($query1);
$nums = $rowcount/5;
$nums = ceil($nums);

for($i = 1; $i <= $nums; $i++) {
?>
<a href="pagination.php?page=<?php echo $i; ?>" style="text-decoration: none"><?php echo $i; ?></a>
<?php
}
?>
