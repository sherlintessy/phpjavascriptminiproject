<?php
session_start();

if(isset($_SESSION['loginname'])){
 unset($_SESSION["flag"]);
 if(isset($_POST['subarticle'])){
  $article=$_POST['article'];
  $title=$_POST['title'];
  $categ=$_POST['categ'];
  $d=date("h:i:s A d M,Y");
  
  $target_dir = $categ."/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
        $uploadOk = 1;
  } else {
        echo "<script>alert('File is not an image.')<script>";
        $uploadOk = 0;
  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG files are allowed.')</script>";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.')</script>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
    }
  }

  $servername="localhost";
  $user="root";
  $pass="";
  $db="miniwt";
  $conn=mysqli_connect($servername,$user,$pass,$db);
  if($conn->connect_error)
   die("connection failed:".$conn->connect_error);
  $sql="SELECT count(name) FROM `file` WHERE category='". $categ."'";; 
  $r=$conn->query($sql);
  $row=$r->fetch_assoc();
  file_put_contents($categ."/file".$row['count(name)'].".txt", $article);
  $sql="INSERT INTO `file`(`name`, `path`, `category`, `picture`, `author`) VALUES ('".$title."','".$categ."/file".$row['count(name)'].".txt','".$categ."','".$categ."/".$_FILES['fileToUpload']['name']."','".$d." ".$_SESSION['loginname']."')";
  $conn->query($sql); 
}
?>
<!doctype html>
<html>
 <head>
  <title>A-Z</title>
   <link rel="stylesheet" type="text/css" href="style1.css"/>
   <script src="#"></script>
 </head>
 <body>
  <header>
   <figure id="fig">
    <img id="logo" src="logo.jpg" alt="logo"/><p id="logoname">A-Z Discussion</p>
   </figure>
   <nav id='navig'>
    <a  class="link" href="homepg.php">HOME</a>
    <a  class="link" href="browse.php">BROWSE</a>
    <a  id="active" class="link" href="#">POST</a>
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
  <form action='post.php' method='post' enctype="multipart/form-data">
   <label>Do you want to post an article?</label></br>
   <label>Choose your category</label></br>
   <input type='radio' name='categ' value='career'/><label>career</label>
   <input type='radio' name='categ' value='entertainment'/><label>entertainment</label>
   <input type='radio' name='categ' value='food'/><label>food</label>
   <input type='radio' name='categ' value='health'/><label>health</label>
   <input type='radio' name='categ' value='news'/><label>news</label>
   <label>Title</label></br>
   <input type='text' name='title' value='' placeholder='Type the title here'/></br>
   <textarea name="article" rows="30" cols="200" placeholder='Type your article here'></textarea></br>
   <label>Upload a related picture in jpg or png format</label></br>
   <input type="file" name="fileToUpload" id="fileToUpload"><br>
   <input type='submit' name='subarticle'/>
  </form>
 </body>
</html>
<?php
}
else{
 $_SESSION['flag']=1;
 header("Location: http://localhost/miniwt/login.php");
 die();
}
?>

