<?php
include("connection.php");
error_reporting(0);

$search=$_POST['searchdata'];

$q=mysqli_query($db,"SELECT * from student where prn like '$search%' ORDER BY `student`.`first` ASC ;");

if(mysqli_num_rows($q)>0)
{
    while($row=mysqli_fetch_assoc($q))
    {
      $im=$row['image'];
      echo "<tr>";
      echo "<td>";
      ?>
      <img  src="http:\\localhost\digitallibrary\student\image\<?php echo $im ?>"  alt="profile" class="user1">
      <?php 
      echo "</td>";
      echo "<td>"; echo $row['first']; echo "</td>";
      echo "<td>"; echo $row['middle']; echo "</td>";
      echo "<td>"; echo $row['last']; echo "</td>";
      echo "<td>"; echo $row['prn']; echo "</td>";
      echo "<td>"; echo $row['mobilenumber']; echo "</td>";
      echo "<td>"; echo $row['email']; echo "</td>";
      echo "<td>"; echo $row['username']; echo "</td>";
      echo "<td>"; echo $row['password']; echo "</td>";
      echo "</tr>";
    }
}
else
{
    echo "<tr>";
    echo "<td colspan='9'>";  echo "Sorry! No student found. Try searching again."; echo "</td>";
    echo "</tr>";
}


?>




