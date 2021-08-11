<?php

   require_once 'db/conn.php';
   // get values from post operation

   
   if(isset($_POST['submit'])){
    //extract values from $_POST array
    $id = $_POST['id'];
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phonenumber'];
    $speciality = $_POST['speciality'];
    //Call crud function
    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $speciality);

   // Redirect to index.php
    if($result){
    	header("Location: viewrecords.php");
    }
    else{
    	//echo 'error';
      include 'includes/errormessage.php';
    }



    }

    else{
      include 'includes/errormessage.php';

    }






?>