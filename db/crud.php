<?php
      class crud {
       //private database object
       private $db;
       //constructor to initialise private variable to the database connection
       function __construct($conn){
           $this->db = $conn;
       }
       /* Till now, we have created home page, we have created databse in phpmyadmin, we have established connection between our form and database. Now we want to insert the value that we enter into our form, into the databse. so for this insertAttendess function. 
       */
       public function insertAttendees($fname, $lname, $dob, $email, $contact, $speciality){
           try {
               //define sql statement to be exectued
               $sql = "INSERT INTO attendee (FirstName,LastName,DateOfBirth,emailaddress,contactnumber,speciality_id) 
               VALUES (:fname,:lname,:dob,:email,:contact,:speciality)";
               //prepare the sql statement for execution
               $stmt = $this->db->prepare($sql);
               //bind all place holders to actual values
               $stmt->bindparam(':fname', $fname);
               $stmt->bindparam(':lname', $lname);
               $stmt->bindparam(':dob', $dob);
               $stmt->bindparam(':email', $email);
               $stmt->bindparam(':contact', $contact);
               $stmt->bindparam(':speciality', $speciality);

               $stmt->execute();
               return true;
           } catch (PDOException $e) {
               echo $e->getMessage();
               return false;
           }
       }
        
       public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $speciality){
        try { 
        $sql = " UPDATE `attendee` SET `FirstName`= :fname,`LastName`= :lname,`DateOfBirth`= :dob,`emailaddress`= :email,`contactnumber`= :contact,
        `speciality_id`= :speciality WHERE attendee_id = :id " ;
        $stmt = $this->db->prepare($sql);
        //bind all place holders to actual values
        $stmt->bindparam(':id', $id);
        $stmt->bindparam(':fname', $fname);
        $stmt->bindparam(':lname', $lname);
        $stmt->bindparam(':dob', $dob);
        $stmt->bindparam(':email', $email);
        $stmt->bindparam(':contact', $contact);
        $stmt->bindparam(':speciality', $speciality);

        $stmt->execute();
        return true;
      }
      catch (PDOException $e) {
               //echo 'error in crud page';
               echo $e->getMessage();
               return false;
           }
         
       } 



       public function getAttendees(){
        //$sql = "SELECT * FROM 'attendee'";
        try {
        $sql = "SELECT * FROM `attendee` a inner join specialities s on a.speciality_id = s.speciality_id";
        $result = $this->db->query($sql);
        return $result;
        }
        catch (PDOException $e) {
               //echo 'error in crud page';
               echo $e->getMessage();
               return false;
           }

       }

       public function getAttendeeDetails($id){
          try{
          $sql = "SELECT * FROM `attendee` a inner join specialities s on a.speciality_id = s.speciality_id WHERE attendee_id = :id";
          $stmt = $this->db->prepare($sql);
          $stmt->bindparam(':id', $id);
          $stmt->execute();
          $result = $stmt->fetch();
          return $result;
           }
           catch (PDOException $e) {
               //echo 'error in crud page';
               echo $e->getMessage();
               return false;
           }
       }

       public function deleteAttendee($id){
        try{
            $sql = " delete from attendee where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;

        }
        catch(PDOException $e) {
               //echo 'error in crud page';
               echo $e->getMessage();
               return false;
           }
       }

       public function getSpecialites(){
        try{
        $sql = "SELECT * FROM `specialities`";
        $result = $this->db->query($sql);
        return $result;
        }
        catch (PDOException $e) {
               //echo 'error in crud page';
               echo $e->getMessage();
               return false;
           }
       }
   }



?>