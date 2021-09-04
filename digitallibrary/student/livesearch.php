<?php
include("connection.php");
error_reporting(0);

$search=$_POST['searchdata'];
$q=mysqli_query($db,"SELECT * from books where name like '%$search%' ORDER BY `books`.`name` ASC ;");

if(mysqli_num_rows($q)>0)
{
    while($row=mysqli_fetch_assoc($q))
    {
      echo "<tr>";
      echo "<td>"; echo $row['bid']; echo "</td>";
      echo "<td>"; echo $row['name']; echo "</td>";
      echo "<td>"; echo $row['authors']; echo "</td>";
      echo "<td>"; echo $row['edition']; echo "</td>";
      echo "<td>"; echo $row['status']; echo "</td>";
      echo "<td>"; echo $row['quantity']; echo "</td>";
      echo "<td>"; echo $row['department']; echo "</td>";
      echo "</tr>";
    }
}
else
{
    echo "<tr>";
    echo "<td colspan='7'>";  echo "Sorry! No book found. Try searching again."; echo "</td>";
    echo "</tr>";
}


?>




