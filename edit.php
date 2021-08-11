
<?php
  $title = "Edit Record"; 
  require_once 'includes/header.php' ;
  require_once 'db/conn.php'; 

  $results = $crud->getSpecialites();

  if(!isset($_GET['id'])){
    //echo 'error';
    include 'includes/errormessage.php';
    header("Location: viewrecords.php");
  }
  else{
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);
  
?>
  <h1 class="text-center">Edit Record</h1>
  <form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']  ?>" />
    <div class="mb-3">
    <label for="FirstName" class="form-label">First Name</label>
    <input type="text" class="form-control" value="<?php echo $attendee['FirstName'] ?>" id="FirstName" name="FirstName" placeholder="Enter your first name">
    </div>
    <div class="mb-3">
    <label for="LastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" value="<?php echo $attendee['LastName'] ?>" id="LastName" name="LastName" placeholder="Enter your Last name">
    </div>
    <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input type="text" class="form-control" value="<?php echo $attendee['DateOfBirth'] ?>" id="dob" name="dob" placeholder="Enter your Date of Birth">
    </div>
    <div class="form-group">
    <label for="speciality" >Area of Expertise</label>
    <select class="form-control" id="speciality" name="speciality">
      <?php while($r = $results -> fetch(PDO :: FETCH_ASSOC)) { ?>
       <option value="<?php echo $r['speciality_id'] ?>" <?php if($r['speciality_id'] == $attendee['speciality_id']) echo 'selected' ;?>>
        <?php echo $r['name']; ?>
          
        </option>
        
      <?php } ?>
   </select>
   </div> 
   <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phonenumber" class="form-label">Phone Number</label>
    <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phonenumber" name ="phonenumber" aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text">We'll never share your contact number with anyone else.</div>
  </div>
  <button type="submit" name="submit" class="btn btn-success ">Save Changes</button>
</form>


<?php } ?>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php' ; ?>
    