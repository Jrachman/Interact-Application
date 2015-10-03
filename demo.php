<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'usergoeshere';
$dbpass = 'passgoeshere';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

if(! get_magic_quotes_gpc() )
{
   $name = addslashes ($_POST['name']);
   $contact = addslashes ($_POST['contact']);
   $A = addslashes ($_POST['A']);
   $B = addslashes ($_POST['B']);
   $C = addslashes ($_POST['C']);
   $D = addslashes ($_POST['D']);
   $E = addslashes ($_POST['E']);
   $grade = addslashes ($_POST['grade']);
}
else
{
   $name = $_POST['name'];
   $contact = $_POST['contact'];
   $A = $_POST['A'];
   $B = $_POST['B'];
   $C = $_POST['C'];
   $D = $_POST['D'];
   $E = $_POST['E'];
   $grade = $_POST['grade'];
}

/*$emp_salary = $_POST['emp_salary'];*/

$sql = "INSERT INTO interact ".
       "(name, contact, A, B, C, D, E, grade) ".
       "VALUES('$name', '$contact', '$A', '$B', '$C', '$D', '$E', '$grade')";
mysql_select_db('jrmathem_service');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Success! We will contact you in a little while.";

mysql_close($conn);
}

?>
