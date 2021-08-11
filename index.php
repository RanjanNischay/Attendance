
<?php
  $title = "Index"; 
  require_once 'includes/header.php' ;
  require_once 'db/conn.php'; 

  $results = $crud->getSpecialites();
?>
  <h1 class="text-center">Registration for IT Conference</h1>
  <form method="post" action="success.php">
    <div class="mb-3">
    <label for="FirstName" class="form-label">First Name</label>
    <input required type="text" class="form-control" id="FirstName" name="FirstName" placeholder="Enter your first name">
    </div>
    <div class="mb-3">
    <label for="LastName" class="form-label">Last Name</label>
    <input required type="text" class="form-control" id="LastName" name="LastName" placeholder="Enter your Last name">
    </div>
    <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input type="text" class="form-control" id="dob" name="dob" placeholder="Enter your Date of Birth">
    </div>
    <div class="form-group">
    <label for="speciality" >Area of Expertise</label>
    <select class="form-control" id="speciality" name="speciality">
      <?php while($r = $results -> fetch(PDO :: FETCH_ASSOC)) { ?>
       <option value="<?php echo $r['speciality_id'] ?>"> <?php echo $r['name']; ?></option>
        
      <?php } ?>
   </select>
   </div> 
   <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phonenumber" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phonenumber" name ="phonenumber" aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text">We'll never share your contact number with anyone else.</div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
</form>
<?php require_once 'includes/footer.php' ; ?>
    