var n={a:0}
function myFunction() {
 if(n.a<2){
  n.a+=1;
 }
 if(n.a==1){
  document.getElementById("categ").innerHTML = "<figure class='picborder' ><input class='pic' type='image' src='entertainic1.png' alt='careerpic'><figcaption>ENTERTAINMENT</figcaption></figure><figure class='picborder' ><input class='pic' type='image' src='foodpic.jpg' alt='careerpic'><figcaption>FOOD</figcaption></figure><figure class='picborder' ><input class='pic' type='image' src='newspic.jpg' alt='careerpic'><figcaption>NEWS</figcaption></figure>";
 }
 if(n.a==2){
  document.getElementById("categ").innerHTML = "<figure class='picborder' ><input class='pic' type='image' src='foodpic.jpg' alt='careerpic'><figcaption>FOOD</figcaption></figure><figure class='picborder' ><input class='pic' type='image' src='newspic.jpg' alt='careerpic'><figcaption>NEWS</figcaption></figure><figure class='picborder' ><input class='pic' type='image' src='healthpic.jpg' alt='careerpic'><figcaption>HEALTH</figcaption></figure>";
 }
}
function c() {
 if(n.a>0){
  n.a-=1;
 }
 if(n.a==0){
 document.getElementById("categ").innerHTML ="<figure class='picborder' ><input class='pic' type='image' src='careerpic1.jpg' alt='careerpic'><figcaption>CAREER</figcaption></figure><figure class='picborder' ><input class='pic' type='image' src='entertainic1.png' alt='careerpic'><figcaption>ENTERTAINMENT</figcaption></figure><figure class='picborder' ><input class='pic' type='image' src='foodpic.jpg' alt='careerpic'><figcaption>FOOD</figcaption></figure>";
 }
 if(n.a==1){
 document.getElementById("categ").innerHTML = "<figure class='picborder' ><input class='pic' type='image' src='entertainic1.png' alt='careerpic'><figcaption>ENTERTAINMENT</figcaption></figure><figure class='picborder' ><input class='pic' type='image' src='foodpic.jpg' alt='careerpic'><figcaption>FOOD</figcaption></figure><figure class='picborder' ><input class='pic' type='image' src='newspic.jpg' alt='careerpic'><figcaption>NEWS</figcaption></figure>";
 }
}