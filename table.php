<?php
$username = "jrmathem";
$password = "nope";
$randomword = "selfaboveservice";

if (isset($_COOKIE['MyLoginPage'])) {
   if ($_COOKIE['MyLoginPage'] == md5($password.$randomword)) {

?>
<?php
$dbhost = 'localhost';
$dbuser = 'jrmathem';
$dbpass = 'nope';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'jrmathem_service';
mysql_select_db($dbname);

$query = "SELECT * FROM interact";
$result = mysql_query($query) 
or die(mysql_error()); 
print " 

<h3>Interact Event Sign-Up Results</h3>

<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#C0C0C0\"><tr> 
<td width=100>Name</td> 
<td width=100>Grade</td>
<td width=100>Contact</td> 
<td width=100>A</td> 
<td width=100>B</td> 
<td width=100>C</td>
<td width=100>D</td> 
<td width=100>E</td>

</tr>"; 

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
print "<tr>"; 
print "<td>" . $row['name'] . "</td>"; 
print "<td>" . $row['grade'] . "</td>";
print "<td>" . $row['contact'] . "</td>"; 
print "<td>" . $row['A'] . "</td>"; 
print "<td>" . $row['B'] . "</td>";
print "<td>" . $row['C'] . "</td>"; 
print "<td>" . $row['D'] . "</td>";
print "<td>" . $row['E'] . "</td>";

print "</tr>"; 
} 
print "</table>"; 
?>
<?php
      exit;
   } else {
      echo "<p>Bad cookie. Clear please clear them out and try to login again.</p>";
      exit;
   }
}

if (isset($_GET['p']) && $_GET['p'] == "login") {
   if ($_POST['name'] != $username) {
      echo "<p>Sorry, that username does not match. Use your browser back button to go back and try again.</p>";
      exit;
   } else if ($_POST['pass'] != $password) {
      echo "<p>Sorry, that password does not match. Use your browser back button to go back and try again.</p>";
      exit;
   } else if ($_POST['name'] == $username && $_POST['pass'] == $password) {
      setcookie('MyLoginPage', md5($_POST['pass'].$randomword), time()+10);
      header("Location: $_SERVER[PHP_SELF]");
   } else {
      echo "<p>Sorry, you could not be logged in at this time. Refresh the page and try again.</p>";
   }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post"><fieldset>
<label><input type="text" name="name" id="name" /> Name</label><br />
<label><input type="password" name="pass" id="pass" /> Password</label><br />
<input type="submit" id="submit" value="Login" />
</fieldset></form>
