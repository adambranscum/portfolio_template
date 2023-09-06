<?php 
// Include the database configuration file
include 'db.php';

// If the form is submitted 
if(isset($_POST['submit'])){ 
    // Get the submitted form data 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone'];
    $message = $_POST['message']; 
    $date = date('Y-m-d');
     
    // Validate form fields 
    if(empty($name)){ 
        header("Location: (url)?contact=missingname");
    } 
   else if(empty($email)) { 
        header("Location: (url)?contact=missingemail");
    } 
   else if(empty($branch)){ 
        header("Location: (url)?contact=missingbranch");
    } 
   else if(empty($message)){ 
        header("Location: (url)?contact=missingmessage");
    } 
     
    else {

        $sql = "INSERT INTO contact (name, email, phone, message, date) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: (url)?contact=sqlerror2");
            exit();
        }
        else{           
            mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $message, $date);
            mysqli_stmt_execute($stmt);
            if ($connection->query($sql) === TRUE) {
            header("Location: (url)?contact=success");
            exit ();
            } else {
              header("Location: (url)?contact=success");
            exit ();
            }
            
        }

    }
}