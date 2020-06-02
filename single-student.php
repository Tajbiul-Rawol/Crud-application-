<?php  include_once "Library_Functions/Functionlib.php"; ?>
<?php  include_once "Library_Functions/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sin Up to get Started!!!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    

    <?php 

          if (isset($_GET['id'])) {
          	
          	$id = $_GET['id'];
          }

          $sql = "SELECT * FROM students WHERE id='$id' ";

          $data = $connection -> query($sql);

          $student_data = $data -> fetch_assoc();

     ?>


   <div class="container">
   	   
   	   <div class="log w-50 mx-auto mt-5">
   	   	
           <a  class="btn btn-success btn-sm" href="addstudent.php">Add Student</a>
   	   	  <div class="card shadow">
   	      	
   	      	<div class="card-header">
   	      		<h2>Student Information</h2>
   	      	</div>
   	      	<div class="card-body">
   	      		<img style="width: 200px: margin:20px auto; display:block;" src="photos/<?php echo $student_data['files'] ?>">
   	      		<br>
   	      		<table class="table table-striped">
   	      			<tr>
   	      				<td>First name</td>
   	      				<td><?php echo $student_data['firstname'] ?></td>
   	      			</tr>

   	      			<tr>
   	      				<td>Last name</td>
   	      				<td><?php echo $student_data['lastname'] ?></td>
   	      			</tr>

   	      			<tr>
   	      				<td>Email</td>
   	      				<td><?php echo $student_data['email'] ?></td>
   	      			</tr>

   	      			<tr>
   	      				<td>Location</td>
   	      				<td><?php echo $student_data['location'] ?></td>
   	      			</tr>

   	      			<tr>
   	      				<td>Gender</td>
   	      				<td><?php echo $student_data['gender'] ?></td>
   	      			</tr>

   	      			<tr>
   	      				<td>Age</td>
   	      				<td><?php echo $student_data['age'] ?></td>
   	      			</tr>
   	      		</table>
         

   	      	</div>
   	      	
   	      </div>

   	   </div>
   	     
   </div>





<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>   