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

            



            /**
             * 
             //filename extension

             $file_array = explode('.',$file_name);
             $file_extensiion = end($file_array);
             $file_extensiion_low = strtolower($file_extensiion);


             //unique file name for any file using encryption with extension

             $unique_file_name = md5(time().rand(0 , 1000000)).'.'.$file_extensiion_low;


             //for docx,pdf,png,jpeg,etc with date time as naming prefix.

             $student_cv = date('d_m_Y_g_h_s').'_'.$fname.'_'.$lname.'.'.$file_extensiion_low;

             */
       


       if (isset($_POST['register'])) {


       	    /**
       	     * data received from the form
       	     */
       	    
       	     $fname = $_POST['fname'];
       	     $lname = $_POST['lname'];
       	     $email = $_POST['email'];
       	     $pass = $_POST['pass'];
             $location = $_POST['location'];
             $age = $_POST['age'];
             $gender = $_POST['gender'];

       	     //retrieving file name 
       	    
       	     $file_name = $_FILES['files']['name'];
             $file_tmp_name = $_FILES['files']['tmp_name'];
             $file_size = $_FILES['files']['size'] ;
            
            
             //file size
              $size=(($file_size/1024)/1024);
              
              //$fil_ext = ['docx','pdf'];
              
              //$nam_format = 'dt';

              //$fol = 'cv/';
             
              
               
                        /**
                         *  if (in_array($file_extensiion,$file_ex) && $nam_format == 'dt') 
                        {
                           //for docx.
                           $student_cv = date('d_m_Y_g_h_s').'_'.$fname.'_'.$lname.'.'.$file_extensiion;
                        	
                        }
                        elseif (in_array($file_extensiion,$file_ex) && $nam_format == 'enc') {
                        	
                        	$unique_file_name = md5(time().rand(0 , 1000000)).'.'.$file_extensiion;


                        }
                        elseif ($folder == 'cv/') {
                        	
                        	move_uploaded_file( $file_tmp_name, $folder. $student_cv);
                        	
                        }
                        else
                        {
                              $mess = '<p class="alert alert-danger"> registration InComplete! <button data-dismiss="alert" class="close"> &times; </button></p>';

                        }
                         */



       	     //email explode
             /**
              *the string has been exploded to an array and stored in the exploded_email variable
              the end function is used to pickup the last element of the array and store in the valid_email variable
              */
       	     $exploded_email = explode('@', $email); 
       	     $valid_email = end($exploded_email);

       	    


       	     if (empty($fname) || empty($lname) || empty($email) || empty($pass) || empty($file_name) || empty($location)||empty($age)|| empty($gender) || empty($_FILES['files']['tmp_name']) ) 
       	     {

       	     	     $mess = '<p class="alert alert-danger"> All fields required! <button data-dismiss="alert" class="close"> &times; </button></p>';

       	     }
       	     elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
       	     {

       	     	  $mess = '<p class="alert alert-danger"> invalid email format! <button data-dismiss="alert" class="close"> &times; </button></p>';

       	     }
       	     elseif ($size > 1) 
       	     {
       	     	$mess = '<p class="alert alert-warning">file too large!!<button data-dismiss="alert" class="close"> &times; </button></p>';
       	     }
             elseif ($age < 18 || $age > 70) {
               
               $mess = '<p class="alert alert-warning">Age is not within the range!!<button data-dismiss="alert" class="close"> &times; </button></p>';
             }
       	     elseif (in_array($valid_email,['coderstrust.com','aiub.edu','nsu.edu','brac.edu','iub.edu']) == false)
       	     {
       	     	///using the in_array function we find if the valid_email contains any of the required element of the array

       	     	   $mess = '<p class="alert alert-warning"> use an email of your educational institution <button data-dismiss="alert" class="close"> &times; </button></p>';
       	     }
       	     else
       	     {
       	     	      
       	     	      //Upload_file($fname, $lname, $file_name, $file_tmp_name, $fol, $fil_ext, $nam_format);
                      
       	     	      $data = File_upload($_FILES['files'], 'photos/',['jpg','jpeg'], [
                                  'type' => 'image'       
       	     	      ]);

                    //query to insert data into the table........

                    echo $files = $data['file_name'];

                    $sql = "INSERT INTO students (firstname, lastname, email, password, age, location, gender, files, status) VALUES ('$fname','$lname','$email','$pass', '$age', '$location', '$gender', '$files', 'active')";
                    
                    $connection -> query($sql);


       	     	      //echo $data['file_name'];

       	     	      $mess = '<p class="alert alert-success"> registration Complete! <button data-dismiss="alert" class="close"> &times; </button></p>';


       	     }

       }


    ?>

   <div class="container">
   	   
   	   <div class="log w-50 mx-auto mt-5">

   	   	<?php 
            
            if (isset($mess)) {
            	echo $mess;
            }

   	   	?>
   	   	
           <a  class="btn btn-success btn-sm" href="addstudent.php">View All Students</a>
   	   	  <div class="card shadow">
   	      	
   	      	<div class="card-header">
   	      		<h2>Registration Form</h2>
   	      	</div>
   	      	<div class="card-body">
   	      		
                 <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST"  enctype="multipart/form-data">
                 	 
                      <div class="form-group">
                      	<label for=""> First Name</label>
                      	<input class="form-control" type="text" name="fname">
                      	
                      </div>

                      <div class="form-group">
                      	<label for=""> Last Name</label>
                      	<input class="form-control" type="text" name="lname">
                      	
                      </div>

                      <div class="form-group">
                      	<label for=""> Email</label>
                      	<input class="form-control" type="text" name="email">
                      	
                      </div>

                      <div class="form-group">
                      	<label for="">Password</label>
                      	<input class="form-control" type="password" name="pass">
                      	
                      </div>

                      <div class="form-group">
                        <label for="">Age</label>
                        <input class="form-control" type="text" name="age">
                        
                      </div>

                      <div class="form-group">
                        <label for="">Location</label>
                        <select class="form-control" name="location">
                          <option value="">-select</option>
                          <option value="Gulshan">Gulshan</option>
                          <option value="Banani">Banani</option>
                          <option value="Bashundhara">Bashundhara</option>
                          <option value="Baridhara">Baridhara</option>
                          <option value="Badda">Badda</option>
                          <option value="Mirpur">Mirpur</option>
                          <option value="Farmgate">Farmgate</option>
                        </select>
                        
                      </div>

                      <div class="form-group">
                        <label for="">Gender</label>
                        <br>
                        <input name="gender" class="" type="radio" value="Male" id="male"><label for="male">Male</label>
                        <input name="gender" class="" type="radio" value="Female" id="female"><label for="female">Female</label>
                      </div>

                      <div class="form-group">
                      	
                      	<input type="file" name="files">
                      	
                      </div>



                      <div class="form-group">
                      	
                      	<input class="btn btn-info" type="submit" name="register">
                      	
                      </div>

                 </form>

   	      	</div>

                
   	      	
   	      </div>

   	   </div>
   	     
   </div>


   <!-- <div class="data">
   	      		<h2>Employee data</h2>
                  <table>
                  	<tr>
                  		<th>ID</th>
                  		<th>Frist name</th>
                  		<th>last name</th>
                  		<th>email</th>
                  	</tr>
                          <?php

                     // $sql_query = "SELECT * FROM employee";
                     // $all_employee_data = $connection -> query($sql_query);
                     
                     // while ($employee_record = $all_employee_data -> fetch_assoc()) {
                     	   
             

                   ?>
                  	<tr>
                  		<td><?php  //// echo $employee_record['empid'];?></td>
                  		<td><?php  // echo $employee_record['firstname'];?></td>
                  		<td><?php  // echo $employee_record['lastname'];?></td>
                  		<td><?php  // echo $employee_record['email'];?></td>
                  	</tr>
               
                     <?php  // }    ?>


                  </table>

   	      	</div> -->



<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>   