<?php
 session_start();
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
    <a  class="link" href="homepg.php">HOME</a>
    <a  id="active" class="link" href="browse.php">BROWSE</a>
    <a  class="link" href="post.php">POST</a>
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
  <img id="bodypic" src="browsecolor.jpg" alt="logo"/>
 <?php
 if(isset($_POST["submit"]))
 {
  $_SESSION['filename']=$_POST["submit"];
 }
  $servername="localhost";
  $user="root";
  $pass="";
  $db="miniwt";
  $conn=mysqli_connect($servername,$user,$pass,$db);
  if($conn->connect_error)
   die("connection failed:".$conn->connect_error);
  $sql="select path from file where name='".$_SESSION['filename']."'";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
  $c=file_get_contents($row['path']);
  $sql="select picture,author,avgrating from file where name='".$_SESSION['filename']."'";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
  $img=$row['picture'];
?>
  <div id='article'> <h2><?php echo $_SESSION['filename'];?></h2><p><i><?php echo $row['author'];?></i></p><p>Rating:<?php echo $row['avgrating'];?></p><img id='articleimg' src='<?php echo $img;?>'/><p><?php echo $c;?></p></div>
  <form id='rating' action='rating.php' method='post'>
  <input id='rate' type='submit' name='submit' value='Rate this article'/>
<?php
if(isset($_SESSION["flagrate"]) || isset($_SESSION["loginname"])){
?>
<script>
   var i = document.getElementById("rate");
   i.parentNode.removeChild(i);
   var a=document.createElement('input');
   a.setAttribute("type", "radio");
   a.setAttribute("name", "rate");
   a.setAttribute("value", "1");
   document.getElementById('rating').appendChild(a);
   var a1=document.createElement('label');
   var t1 = document.createTextNode('1');
   a1.appendChild(t1);
   document.getElementById('rating').appendChild(a1);

   var b=document.createElement('input');
   b.setAttribute("type", "radio");
   b.setAttribute("name", "rate");
   b.setAttribute("value", "2");
   document.getElementById('rating').appendChild(b);
   var b1=document.createElement('label');
   var t2 = document.createTextNode('2');
   b1.appendChild(t2);
   document.getElementById('rating').appendChild(b1);
  
   var c=document.createElement('input');
   c.setAttribute("type", "radio");
   c.setAttribute("name", "rate");
   c.setAttribute("value", "3");
   document.getElementById('rating').appendChild(c);
   var c1=document.createElement('label');
   var t3 = document.createTextNode('3');
   c1.appendChild(t3);
   document.getElementById('rating').appendChild(c1);

   var d=document.createElement('input');
   d.setAttribute("type", "radio");
   d.setAttribute("name", "rate");
   d.setAttribute("value", "4");
   document.getElementById('rating').appendChild(d);
   var d1=document.createElement('label');
   var t4 = document.createTextNode('4');
   d1.appendChild(t4);
   document.getElementById('rating').appendChild(d1);

   var e=document.createElement('input');
   e.setAttribute("type", "radio");
   e.setAttribute("name", "rate");
   e.setAttribute("value", "5");
   document.getElementById('rating').appendChild(e);
   var e1=document.createElement('label');
   var t5 = document.createTextNode('5');
   e1.appendChild(t5);
   document.getElementById('rating').appendChild(e1);

   var f=document.createElement('input');
   f.setAttribute("type", "submit");
   f.setAttribute("name", "subrate");
   document.getElementById('rating').appendChild(f);
</script>
<?php
}

?> 
  </form>
 </body>
</html>
