<?php
  $title = "Success";
  require_once 'includes/header.php';
  require_once 'db/conn.php';
  if(isset($_POST['submit'])){
    //extract values from $_POST array
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phonenumber'];
    $speciality = $_POST['speciality'];
    //echo "$speciality";
   // Call function to insert and track if success or not
    $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $speciality);

    if($isSuccess){
      include 'includes/successmessage.php';
    }
    else{
      include 'includes/errormessage.php';
    }
  }
?>
  

  <!-- This print out values that were passed to the action page using method = "get" -->
  <!--
  <div class="card " style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php //echo $_GET['FirstName'].' '.$_GET['LastName']; ?>
               </h5>
    <h6 class="card-subtitle mb-2 text-muted">
    	<?php 
    	  //echo $_GET['speciality'];
    	?>  
    </h6>
    <p class="card-text">
    	<?php 
    	  //echo 'Date of Birth: ' .$_GET['dob'];
    	?>
    </p>
    <p class="card-text">
    	<?php 
    	  //echo 'Email: '.$_GET['email'];
    	?>
    </p>
    <p class="card-text">
    	<?php 
    	  //echo 'Contact Number: '.$_GET['phonenumber'];
    	?>
    </p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
  </div>
-->

<div class="card " style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['FirstName'].' '.$_POST['LastName']; ?>
               </h5>
    <h6 class="card-subtitle mb-2 text-muted">
    	<?php 
    	  echo $_POST['speciality'];
    	?>
      <?php //echo $specialityName['name'];  ?>  
    </h6>
    <p class="card-text">
    	<?php 
    	   echo 'Date of Birth: ' .$_POST['dob'];
    	?>
    </p>
    <p class="card-text">
    	<?php 
    	  echo 'Email: '.$_POST['email'];
    	?>
    </p>
    <p class="card-text">
    	<?php 
    	  echo 'Contact Number: '.$_POST['phonenumber'];
    	?>
    </p>
    
  </div>
  </div>



  <!--<?php
   //echo $_GET['FirstName'];
   //echo $_GET['LastName'];
   //echo $_GET['dob'];
   //echo $_GET['speciality'];
   //echo $_GET['email'];
   //echo $_GET['phonenumber']; 
  ?>
-->
<br>
<br>
<br>
<br>
<br>

<?php 
 require_once 'includes/footer.php';
 ?>    