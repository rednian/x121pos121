<?php 

if (array_key_exists('name', $_POST)) {
  require_once 'php/config.php'; 
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $comments = isset($_POST['comments']) ? $_POST['comments'] : '';

    $name = $conn->escape_string($name);
    $email = $conn->escape_string($email);
    $subject = $conn->escape_string($subject);
    $comments = $conn->escape_string($comments);

    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $subject = htmlspecialchars($subject);
    $comments = htmlspecialchars($comments);



    $sql = "INSERT INTO contact_us(name, email, subject, remark)VALUES('$name','$email','$subject','$comments')";

    $result = $conn->query($sql);

    if($conn->affected_rows > 0){
      echo 1;
    }
}
?>

