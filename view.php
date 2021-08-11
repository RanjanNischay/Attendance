<?php
  $title = "View Records"; 
  require_once 'includes/header.php' ;
  require_once 'db/conn.php'; 

  // get attendee by id
  
  if(!isset($_GET['id'])){
     include 'includes/errormessage.php';
     
  }
  else{
     $id =  $_GET['id'];
     $result = $crud->getAttendeeDetails($id);
  }
  
?>
<div class="card " style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $result['FirstName'].' '.$result['LastName']; ?>
               </h5>
    <h6 class="card-subtitle mb-2 text-muted">
      <?php 
        echo $result['name'];
      ?>  
    </h6>
    <p class="card-text">
      <?php 
        echo 'Date of Birth: ' .$result['DateOfBirth'];
      ?>
    </p>
    <p class="card-text">
      <?php 
        echo 'Email: '.$result['emailaddress'];
      ?>
    </p>
    <p class="card-text">
      <?php 
        echo 'Contact Number: '.$result['contactnumber'];
      ?>
    </p>

  </div>
</div>
<br>
<a href="viewrecords.php" class="btn btn-info">Back to List</a>
<a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
<a onclick = "return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>






<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php' ; ?>