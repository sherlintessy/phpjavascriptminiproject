<?php
session_start();
if(!isset($_SESSION['loginname'])){
 $_SESSION['flagrate']=1;
 header("Location: http://localhost/miniwt/login.php");
 die();
}
else{
 if(isset($_POST["subrate"]))
{
  $servername="localhost";
  $user="root";
  $pass="";
  $db="miniwt";
  $conn=mysqli_connect($servername,$user,$pass,$db);
  if($conn->connect_error)
   die("connection failed:".$conn->connect_error);
  $r=$_POST['rate'];
  $sql="INSERT INTO rating VALUES ('".$_SESSION['loginname']."','". $_SESSION['filename']."',".$r.")"; 
  $conn->query($sql);
  $sql="SELECT rating FROM rating WHERE article='".$_SESSION['filename']."'";
  $res=$conn->query($sql);
  $sum=0;
  $cnt=0;
  while($row=$res->fetch_assoc())
  {
   $sum=$sum+$row['rating'];
   $cnt=$cnt+1;
  }
  $avg=$sum/$cnt;
  $sql="UPDATE `file` SET `avgrating`=".$avg." WHERE name='".$_SESSION['filename']."'";
  $conn->query($sql);
}
 header("Location:".$_SERVER['HTTP_REFERER']);
 die();
}
?>
