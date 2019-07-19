<?php
include'includes/header.php';
if(isset($_SESSION['instructor_uid'])) {
?>
<!--Breadcrumb start-->
<style>
table{
     background-color:#002020;
    margin-top: 50px;
    }
    table .tr:hover{
        border: 2px solid #167AC6;
    }
    table tr td{
        color:white;
        text-align: center;
    }
    table h3{
        color: #167AC6;
        text-align: center;
        font-size: 20px;
    }
    form button{
        color: black;
        width: 100px;
        float: right;
        margin-right: 130px;
        margin-top: 10px;
        height: 40px;
        border-radius: 4px;
    }
    form button:hover{
        background-color: #167AC6;
        color: white;
    }
    .tr{
        height: 60px;
    }
    tr h3{
        padding-top: 20px;
    }
    .tr input{
        height: 30px;
        flex: 1;
        color: black;
        width: 100%;
    }
    div h1{
        text-align: center;
        font-weight: bolder;
        color: #006E4D;
        text-transform: capitalize;font-size: 30px;
    }

</style>
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Edit course</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php?ho=ho">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="course-single.php?si=si">Edit course</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--Single content start-->
<div class="ed_graysection ed_course_single ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">
<?php if(isset($_GET['v_id'])){
        $vid_id = $_GET['v_id'];
                $sql = "SELECT * FROM coursecontents WHERE content_id = '$vid_id'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
?>
		<?php include'includes/edit_course_script.php'; ?>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div class="form-group"><h1>Make Changes to this Course</h1></div>
				<div class="ed_course_single_item">

                    <div class="ed_course_single_image">
                     <img src="<?php echo $row['poster_path']; ?>" /> 
					</div>
					<div id="form-messages"></div>
					<div class="row">
					<div class="ed_course_single_info">
					<form  id="form-ajax" class="form-group" method="post" action="">
					<table>
					    <tbody>
                        <tr>
                            <td><h3>course title</h3></td>
                            <td><h3>update course title</h3></td>
                        </tr>
					        <tr class="tr">
					            <td><?php echo $row['course_title']; ?></td><td>New course title<input  id="title" type="text" name="course_title" /></td>
					        </tr>
					                                <tr>
                            <td><h3>course descritpion</h3></td>
                            <td><h3>update course description</h3></td>
                        </tr>
					        <tr class="tr">
					            <td><?php echo $row['course_description']; ?></td><td>New description:<input id="description" type="text" name="course_description" /> </td>
					        </tr>
					   <tr>
                    <td><h3>course duration</h3></td>
                    <td><h3>update course duration</h3></td>
                        </tr>
					        <tr class="tr">
					            <td><?php echo $row['course_duration']; ?> hrs</td><td>New duration:<input id="duration" type="text" name="course_duration" /></td>
					        </tr>
					    </tbody>
					</table>
	<div class="form-group">
<!--                                             <button class="ed_getinvolved" class="btn ed_btn ed_green">-->
                        <button type="submit" name="edit">update
                                                 </button>
                       </div>
					</form>
						</div>
                    </div>
				</div>	
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!--Single content end-->
<?php include_once'includes/footer.php';
} else {
    header("location:not-found.php");
}
?>