<!DOCTYPE html>
<html>
<head>
<script>
/*
* Function validateForm
* Check all mandatory fields
* Check The email if Unique
*/
function validateForm()
{
var fname = document.getElementById("fname").value;
var email = document.getElementById("email").value;
var password = document.getElementById("password").value;
// Mandatory Fields
if (fname=="" || email=="" || password=="")
  {
  document.getElementById("warningInfo").innerHTML="All fields are mandatory";
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
    {// Unique email
	 if(xmlhttp.responseText.trim(" ")=="found")
	   document.getElementById("warningInfo").innerHTML="Email already exists";
	 else
	   document.getElementById("indexId").submit();
    }
  }
xmlhttp.open("GET","./ajax/userAjax.php?email="+email,true);
xmlhttp.send();
}
</script>
</head>
<body>

<form id="indexId" action="./views/welcome.php" method="post">
 <table>
    <th id="warningInfo" style="color:red;" colspan="2"></th>
	<tr><td>Full Name: </td><td><input type="text" id="fname" name="fname"></td></tr>
	<tr><td>Email    : </td><td><input type="text" id="email" name="email"></td></tr>
	<tr><td>Password : </td><td><input type="text" id="password" name="password"></td></tr>
	<tr><td colspan="2"><input type="button" value= "Create an Account" onClick="validateForm()"></td></tr>
 </table>
 
</form>

</body>
</html> 