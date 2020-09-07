<?php
  //MySQLi procedural
  include 'config.php';
  $count = 0;
  for($i=1;$i<=5;$i++){
    if($_POST['q'.$i] == 1){
      $count++;
    }
  }
  $score = $count/5 * 100;
  echo $score;
  mysqli_select_db($conn, 'q2project');
  $sql = "UPDATE Credentials SET grade=$score WHERE username = '$_COOKIE[username]'";
  mysqli_query($conn,$sql);
?>
