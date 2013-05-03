<html>
<head>
<?php
 include '../models/User.php';

 $user = new user(0,$_POST['fname'],$_POST['email'], $_POST['password'], 'sysdate()'); 
 $user->createAnAccount();

?>
<script>
function getUserInfoById()
{
var userId = document.getElementById("id").value;
if (userId=="")
  {
  document.getElementById("userInfo").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("userInfo").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../ajax/userAjax.php?userId="+userId,true);
xmlhttp.send();
}
</script>
<head>
<body>

Welcome <?php echo $_POST["fname"]; ?>!<br><br>

User Id : <input id="id" type="text" name="id"> <input type="button" value= "Get User" onClick="getUserInfoById()">
<div id="userInfo"><b>Users info will be listed here.</b></div>
</body>
</html> 