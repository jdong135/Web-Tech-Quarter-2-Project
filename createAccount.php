<style media="screen">
  body{background-color: #27333D}
</style>
<?php
//Jay Dong config file Nov. 21, 2019
//MySQLi procedural
include 'config.php';

//Test to see if they registered a new account of if they are logging in
if($_POST['newUsername'] != "" and $_POST['newPassword'] != ""){
  $newUsername = $_POST['newUsername'];
  $newPassword = md5($_POST['newPassword']);
  // Create database
  $sql = "CREATE DATABASE IF NOT EXISTS q2project";
  //Running $sql query on $conn
  if (mysqli_query($conn, $sql)) {
      //echo "Database created successfully" (purely for testing);
  } else {
      echo "Error creating database: " . mysqli_error($conn);
  }
  //Select the 'q2project' database to work with
  mysqli_select_db($conn, 'q2project');
  //Create a table
  $sql = "CREATE TABLE IF NOT EXISTS Credentials (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    quizCount INT(6) DEFAULT 0,
    grade FLOAT(0) DEFAULT 0,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  (mysqli_query($conn,$sql));
  $existCheck = "SELECT username FROM Credentials WHERE username = '$newUsername'";
  $result = mysqli_query($conn, $existCheck);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    echo '<script language="javascript">';
    echo 'alert("This username already exists. You will be redirected to the sign up page after clicking OK. Please register with a new username.")';
    echo '</script>';
    //Go back to login page after 0.5 seconds;
    header("refresh:.5;url=index.php");
  }
  else {
    $sql = "INSERT INTO Credentials (username, password)
    VALUES ('$newUsername','$newPassword')";
    echo '<script language="javascript">';
    echo 'alert("Your account has been created. You will be redirected to the home page, and you can now log in using your credentials. Please press OK.")';
    echo '</script>';
    //Go back to login page after 0.5 seconds;
    header("refresh:.5;url=index.php");
  }

  if (mysqli_query($conn, $sql)) {
      //echo "Table Credentials created successfully (purely for testing)";
  } else {
      echo "Error creating table: " . mysqli_error($conn);
  }
}
//If the user is logging back in
else{
  //Select the 'q2project' database to work with
  mysqli_select_db($conn, 'q2project');
  $oldUsername = $_POST['oldUsername'];
  $oldPassword = md5($_POST['oldPassword']);
  $loginCheck = "SELECT username, password FROM Credentials WHERE username = '$oldUsername'";
  $result = mysqli_query($conn, $loginCheck);
  if(mysqli_num_rows($result) > 0){
    //Username exists, check password
    $row = mysqli_fetch_assoc($result);
    if($row['password'] == $oldPassword){
      $countCheck = "SELECT quizCount FROM Credentials WHERE username = '$oldUsername'";
      $check = mysqli_query($conn,$countCheck);
      $rows = mysqli_fetch_assoc($check);
      if($rows['quizCount'] == 0){
        $sql = "UPDATE Credentials SET quizCount=1 WHERE username = '$oldUsername'";
        mysqli_query($conn,$sql);
        setcookie("username",$_POST['oldUsername']);
        header("Location: quiz.php");
      }
      else{
        $scoreCheck = "SELECT grade FROM Credentials WHERE username = '$oldUsername'";
        $check = mysqli_query($conn,$scoreCheck);
        $rows = mysqli_fetch_assoc($check);
        $score = $rows['grade'].'%';
        echo '<script language="javascript">';
        echo 'alert("You have already taken the quiz once! Your score was: '.$score.'");';
        echo '</script>';
        //Go back to login page after 0.5 seconds;
        header("refresh:.5;url=index.php");
      }
    }
  }
  else{
    //Username does not exist, return to home page
    echo '<script language="javascript">';
    echo 'alert("These credentials do not exist. You will be redirected to the login page after clicking OK.")';
    echo '</script>';
    //Go back to login page after 0.5 seconds;
    header("refresh:.5;url=index.php");
  }
}
?>
