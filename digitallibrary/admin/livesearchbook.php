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
      echo "<td style='text-align:center;'>"; 
      echo  "<a href='delete.php?id=$row[bid] ' style='cursor: pointer;text-decoration: none; background-color: #7e7e91;color: white;border-radius: 3px;padding: 8px;'>DELETE</a>";
     
      echo "</td>";
      echo "</tr>";
    }
}
else
{
    echo "<tr>";
    echo "<td colspan='8'>";  echo "Sorry! No book found. Try searching again."; echo "</td>";
    echo "</tr>";
}


?>



