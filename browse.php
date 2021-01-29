<?php
 session_start();
?>
<!doctype html>
<html>
 <head>
  <title>A-Z</title>
   <link rel="stylesheet" type="text/css" href="style1.css"/>
   <script src="img.js"></script>
 </head>
 <body>
  <header>
   <figure id="fig">
    <img id="logo" src="logo.jpg" alt="logo"/><p id="logoname">A-Z Discussion</p>
   </figure>
   <nav id='navig'>
    <a  class="link" href="homepg.php">HOME</a>
    <a  id="active" class="link" href="#">BROWSE</a>
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
  <button class='scrollbtn' onclick="c();"><b>&lt;</b></button>
  <form id="categ" action='carrerinfo.php' method='post'>
   <figure id="career" class="picborder" ><button type="submit"  name='subcateg' value='career'><img class="pic" src="careerpic1.jpg" alt="careerpic"></button><figcaption>CAREER</figcaption></figure>
   <figure class="picborder" ><button type="submit"   name='subcateg' value='entertainment'><img class="pic" src="entertainic1.png" alt="careerpic"></button><figcaption>ENTERTAINMENT</figcaption></figure>
   <figure class="picborder" ><button type="submit" name='subcateg' value='food'><img  class="pic" src="foodpic.jpg" alt="careerpic" ></button> <figcaption>FOOD</figcaption></figure>
  </form>
  <button class='scrollbtn' onclick="myFunction();"><b>&gt;</b></button>
 </body>
</html>