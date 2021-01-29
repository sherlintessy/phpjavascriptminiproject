<?php
 session_start();
if(isset($_POST["sub"]))
{
  $servername="localhost";
  $user="root";
  $pass="";
  $db="miniwt";
  $conn=mysqli_connect($servername,$user,$pass,$db);
  if($conn->connect_error)
   die("connection failed:".$conn->connect_error);
  if($_SERVER["HTTP_REFERER"]=='http://localhost/miniwt/signup.php')
  {
   $lname=$_POST['lname'];
   $email=$_POST['email'];
   $contact=$_POST['contact'];
   $psw=$_POST['psw'];
   $confirmpsw=$_POST['confirmpsw'];
   if($psw==$confirmpsw)
   {
     $sql="INSERT INTO signup VALUES ('".$lname."','". $email."','".$contact."','".$psw."')"; 
     $conn->query($sql);
   }
   else
   {
    echo "<script type='text/javascript'>alert('enter same password to confirm')</script>";
   }
  }
  if($_SERVER["HTTP_REFERER"]=='http://localhost/miniwt/login.php')
  {
   $lname=$_POST["lname"];
   $psw=$_POST["psw"];
   $sql="SELECT password FROM signup WHERE username='".$lname."'";
   $result=$conn->query($sql);
   $row=$result->fetch_assoc();
   if($row['password']==$psw){
    $_SESSION["loginname"] =$lname;
   if(isset($_SESSION["flag"])){
   if($_SESSION["flag"]==1){
    unset($_SESSION["flag"]);
    header("Location: http://localhost/miniwt/post.php");
    die();
   }
  }
  if(isset($_SESSION["flagrate"])){
   if($_SESSION["flagrate"]==1){
    header("Location: http://localhost/miniwt/fileread.php");
    session_write_close();
   }
  }
   }
   else{
    //unset($_SESSION["flagrate"]);
    echo "<script type='text/javascript'>alert('Incorrect username or password')</script>";
  }
  }
  $conn->close(); 
  
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>A-Z</title>
   <link rel="stylesheet" type="text/css" href="style1.css"/>
 </head>
 <body id="loginbody">
  <header>
   <figure id="fig">
    <img id="logo" src="logo.jpg" alt="logo"/><p id="logoname">A-Z Discussion</p>
   </figure>
   <nav id='navig'>
    <a  class="link" href="homepg.php">HOME</a>
    <a  class="link" href="browse.php">BROWSE</a>
    <a  class="link" href="post.php">POST</a>
    <a id="active" class="link" href="#">LOG IN</a>
    <a id='signupbtn' class="link" href="signup.php">SIGN UP</a>
   </nav>
   <?php
if(isset($_SESSION['loginname'])){
 ?>
 <script>
  var i = document.getElementById("active");
  i.parentNode.removeChild(i);
  var i = document.getElementById("signupbtn");
  i.parentNode.removeChild(i);
  var z=document.createElement('div');
  z.setAttribute("class", "dropdown"); 
   var x = document.createElement('button');
   x.setAttribute("class", "dropbtn"); 
    var t = document.createTextNode('<?php echo $_SESSION['loginname']; ?>');
    x.appendChild(t);
   z.appendChild(x);
   var y = document.createElement('form');
   y.setAttribute("class", "dropdown-content");
   y.setAttribute("action", "logout.php");
   y.setAttribute("method", "post");
    var y1 = document.createElement('input');
    var y2 = document.createElement('input');
    var y3 = document.createElement('input'); 
    y1.setAttribute("type", "submit");
    y2.setAttribute("type", "submit");
    y3.setAttribute("type", "submit");
    y1.setAttribute("name", "submit");
    y2.setAttribute("name", "submit");
    y3.setAttribute("name", "submit");
    y1.setAttribute("value", 'LOG OUT');
    y2.setAttribute("value", 'POSTED');
    y3.setAttribute("value", 'RATED');
    y.appendChild(y1);
    y.appendChild(y2);
    y.appendChild(y3);
   z.appendChild(y);
  document.getElementById('navig').appendChild(z);
 </script>
<?php
}
?>
  </header>
 
<body>
<?php
if(isset($_SESSION['loginname'])){
 echo"<h1 id='afterlogin'>Hi ".$_SESSION["loginname"]."</h1>";
}
  else{
?>
   <form id='login' action='login.php' method='post'>
    <label>LOGIN NAME</label></br>
    <input class='textbox' type='text' name='lname'/>
    <label>PASSWORD</label></br>
    <input class='textbox' type='password' name='psw'/>
    <input id='subbutton' type='submit' name='sub' value='LOGIN'/>
   </form>
<?php
}
?>
<img id="bodypic" src="loginpic.png" alt="logo"/>
</body>
</html>

