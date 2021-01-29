<?php
 session_start();
?>
<!doctype html>
<html>
 <head>
  <title>A-Z</title>
   <link rel="stylesheet" type="text/css" href="style1.css"/>
   <script src="click.js"></script>
 </head>
 <body>
  <header>
   <figure id="fig">
    <img id="logo" src="logo.jpg" alt="logo"/><p id="logoname">A-Z Discussion</p>
   </figure>
   <nav id='navig'>
    <a  class="link" href="homepg.php">HOME</a>
    <a  class="link" href="browse.php">BROWSE</a>
    <a  class="link" href="post.php">POST</a>
   <a id='loginbtn' class="link" href="login.php">LOG IN</a>
    <a  id="active" class="link" href="#">SIGN UP</a>
   </nav>
  <?php
if(isset($_SESSION['loginname'])){
 ?>
 <script>
  var i = document.getElementById("loginbtn");
  i.parentNode.removeChild(i);
  var i = document.getElementById("active");
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
  <form id='login' action="login.php" method="post">
   <label>USERNAME</label></br>
   <input class="textbox" type="text" name="lname"/>
   <label>EMAIL</label></br>
   <input class="textbox" type="text" name="email"/>
   <label>CONTACT</label></br>
   <input class="textbox" type="text" name="contact"/>
   <label>ENTER PASSWORD</label></br>
   <input class="textbox" type="password" name="psw"/>
   <label>CONFIRM PASSWORD</label></br>
   <input class="textbox" type="password" name="confirmpsw"/>
   <input id='subbutton'type="submit" name="sub" value="SIGN UP"/>
  </form>
  <img id="bodypic" src="signuppic.jpg" alt="logo"/>
 </body>
</html>