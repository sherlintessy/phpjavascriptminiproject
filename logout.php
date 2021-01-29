<?php
 session_start();
if(isset($_POST["submit"]))
{
 $value=$_POST['submit'];
 if($value=='LOG OUT')
 {
  session_unset();
  session_destroy();
  header("Location: http://localhost/miniwt/homepg.php");
  die();
 }
}
if(isset($_POST['RATED']) || isset($_POST['POSTED']))
  {
 echo"<script>alert('hi')</script>";
 session_start();
 $servername="localhost";
  $user="root";
  $pass="";
  $db="miniwt";
  $conn=mysqli_connect($servername,$user,$pass,$db);
  if($conn->connect_error)
   die("connection failed:".$conn->connect_error);
   if(isset($_POST['RATED']))
  {
   $sql="SELECT article,rating FROM `rating` where user='".$_SESSION['loginname']."'";
   $result=$conn->query($sql);
   $cnt=0;
   $arr1=array();
   while($row=$result->fetch_assoc())
   {
    $arr1[$cnt]=$row['article']."Your Rating: ".$row['rating'];
    $cnt++;
   }
  }
    if(isset($_POST['POSTED']))
  {
   $sql="SELECT name,author,avgrating FROM `file` where user='%".$_SESSION['loginname']."'";
   $result=$conn->query($sql);
   $cnt=0;
   $arr1=array();
   while($row=$result->fetch_assoc())
   {
    $arr1[$cnt]=$row['name']." Rating: ".$row['avgrating'];
    $cnt++;
  }
  } 
?>
<!doctype html>
<html>
 <head>
  <title>A-Z</title>
   <link rel="stylesheet" type="text/css" href="style1.css"/>
 </head>
 <body>
  <header>
   <figure id="fig">
    <img id="logo" src="logo.jpg" alt="logo"/><p id="logoname">A-Z Discussion</p>
   </figure>
   <nav id='navig'>
    <a id="active" class="link" href="#">HOME</a>
    <a class="link" href="browse.php">BROWSE</a>
    <a class="link" href="post.php">POST</a>
    <a id='loginbtn' class="link" href="login.php">LOG IN</a>
    <a id='signupbtn' class="link" href="signup.php">SIGN UP</a>
   </nav>
   <?php
if(isset($_SESSION['loginname'])){
 ?>
 <script>
  var i = document.getElementById("loginbtn");
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
  <article>
   <section>
<?php
 if(isset($_POST['RATED']))
  {
?>
    <h2><i>You have rated the following articles</i></h2>
<?php
}
?>
<?php
 if(isset($_POST['POSTED']))
  {
?>
    <h2><i>You have posted the following articles</i></h2>
<?php
}
?>
    <img id="bodypic" src="loginpic.png" alt="logo"/>
   </section>
   <form action='fileread.php' method='post'>
   <?php
    foreach ($arr as $value){
    $sql="SELECT picture FROM `file` where name='".$value."'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc()
    ?>
    <button class='trendicon' type="submit"  name='submit' value='<?php echo $value;?>'><div class='trend'><h2><img class='trendicon1' src="<?php echo $row['picture'];?>"/><i><?php echo $value?></i></h2></div></button>
    <?php
    }
    ?>
   </form>
  </article>
  <footer>
  </footer>
 </body>
</html>
<?php
}
?>