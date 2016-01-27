<?php
include('connection.php');
extract($_REQUEST);
$mail=$mail;
$query=mysql_query("select * from player where playerEmail='$mail'");
if(mysql_num_rows($query))
{
  echo "<p style='color:red'>Email exists</p>";
}
else
{
  echo "<p style='color:green'>Correct Email</p>";
}

 ?>
