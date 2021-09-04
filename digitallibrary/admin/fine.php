<?php
session_id('admin');
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fine Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






    <script>


        $(document).ready(function () {
            $('body').each(function (index, element) {
                var exp = new RegExp(String.fromCharCode(8203), "g")
                var editor = $(element);
                var newText = editor.html().replace(exp, '');



                console.log("Old text: " + editor.html());
                editor.html(newText);
                console.log("New text: " + editor.html());


            });



            history.pushState(null, document.title, location.href);


        });



    </script>






    <style>
        .topnav {
            overflow: hidden;
            background-color: #e9e9e9;
        }

        .topnav .search-container {
            float: right;
        }

        .topnav input[type=text] {
            margin-top: 8px;
            margin-bottom: 8px;
            padding-top: 6px;
            padding-bottom: 6px;

            font-size: 17px;
            border: none;
        }

        .topnav .info {
            margin-top: 8px;
            margin-bottom: 8px;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-right: 10px;
            font-size: 17px;
            border: none;
        }

        .topnav .search-container button {
            float: right;
            margin-top: 8px;
            margin-bottom: 8px;
            padding: 6px 10px;

            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .topnav .search-container button:hover {
            background: #ccc;
        }

        @media screen and (max-width: 600px) {
            .topnav .search-container {
                float: none;
            }


            .topnav .un {
                width: 100%;
            }

            .topnav .bi {
                width: 70%;

            }

            .topnav .search-container button {
                width: 30%;

            }

            .topnav input[type=text] {
                border: 1px solid #ccc;

            }
        }

        .fa-sign-out {
            margin: 0px 5px;
            padding: 5px;
            font-size: 20px;
            width: 30px;
            height: 30px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
        }

        .fa-sign-out:hover {
            opacity: .7;
        }
    </style>




</head>

<body>
    ​
    <?php

$count=0; 
$res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_SESSION[login_auser]' && password='$_SESSION[login_apassword]';");
$row= mysqli_fetch_assoc($res);
$count=mysqli_num_rows($res);


  $first=$row['first'];
  $middle=$row['middle'];
  $last=$row['last'];
  $eid=$row['eid'];
  $email=$row['email'];
  $mobileno=$row['mobilenumber'];
  $photo=$row['image'];
  $username=$row['username'];

?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark  " style="padding-top: 0px;padding-bottom:0px;">



        <a href="#" class="navbar-brand"><img src="image\Book.png" width="30" height="30"
                class="d-inline-block align-top" alt="">
            LIBRARY</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">



            <ul class="nav navbar-nav">

                <li class="nav-item ">
                    <a class="nav-link " href="homepage.php">Home</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="books.php">Books</a>
                </li>


                <li class="nav-item ">
                    <a class="nav-link" href="bookrequest.php">Requests</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="fine.php">Fine</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="student.php">Student</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback</a>
                </li>

            </ul>


            <ul class="navbar-nav ml-auto nav-flex-icons navbar-right">
                <li class="nav-item avatar">
                    <a class="nav-link p-0" href="profile.php">
                        <img src="image\<?php echo $photo ?>" class="rounded-circle z-depth-0" alt="Profile" height="50" title="Profile"
                            style="padding:5px">
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php"><span class="fa fa-sign-out"
                            aria-hidden="true"></span>Logout</a></li>
            </ul>



        </div>





        </div>
    </nav>




    <div class="container-fluid">




        <h1 style="text-align:center">Student Fine</h1>

        <div class="topnav">
            <div class="search-container">
                <form method="POST">
                    <div>
                        <input type="text" placeholder="   enter username.." class="un" name="search1" size="48"
                            required>

                    </div>
                    <div>
                        <input type="text" placeholder="   enter book id.." class="bi" name="search2" size="42"
                            required>
                        <button type="submit" name="submit">Fine</button>

                    </div>

                </form>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead style="background-color:#6d6a6a; color: White;">
                    <tr>
                        <th>Username</th>
                        <th>BID</th>
                        <th>Book-Name</th>
                        <th>Authors Name</th>
                        <th>Edition</th>
                        <th>IssueDate</th>
                        <th>ReturnDate</th>
                        <th>Days</th>
                        <th>Fine</th>
                        <th>Button</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

  if(isset($_POST['submit']))
   {
      $s3=$_POST['search1'];
      $s4=$_POST['search2'];
      $i=mysqli_query($db,"SELECT * from issue_book where approve='approve' and username='$_POST[search1]' and bid='$_POST[search2]';");
      $fine=0;
      if(mysqli_num_rows($i)==0)
      {
          echo "<tr>";
          echo "<td colspan='10'>";  echo "No Book is Issue."; echo "</td>";
          echo "</tr>";
      }
      else
      {

          while($row=mysqli_fetch_assoc($i))
           {
      
              
               $date = new DateTime();
               $currentdate = $date->format('Y-m-d');
               $issuedate=$row['issue'];
      
              $b=mysqli_query($db,"SELECT * from books where bid='$row[bid]'; ");
              $count=mysqli_fetch_assoc($b);
            
      
      
             
              
               $dateDiff = dateDiffInDays($issuedate,$currentdate); 
               
               if($dateDiff>1)
               {
                  $fine=2*($dateDiff-1);
                  echo "<tr class='table-danger'>";
                  echo "<td>"; echo $row['username']; echo "</td>";
                  echo "<td>"; echo $row['bid']; echo "</td>";
                  echo "<td>"; echo $count['name']; echo "</td>";
                  echo "<td>"; echo $count['authors']; echo "</td>";
                  echo "<td>"; echo $count['edition']; echo "</td>";
      
                  echo "<td>"; echo $row['issue']; echo "</td>";
                  echo "<td>"; echo $row['returnd']; echo "</td>";
                  echo "<td>"; echo $dateDiff; echo "</td>";
              
                  echo "<td>"; echo $fine; echo "</td>";
                  echo "<td style='text-align:center;'>"; 
                  echo  "<a href='return.php?id=$row[bid] &amp;username=$row[username]' style='cursor: pointer;text-decoration: none; background-color: #7e7e91;color: white;border-radius: 3px;padding: 8px;'>RETURN</a>";
                 
                  echo "</td>";
                  echo "</tr>";
               }
               else
               {
               
      
                  echo "<tr class='table-active'>";
                  echo "<td>"; echo $row['username']; echo "</td>";
                  echo "<td>"; echo $row['bid']; echo "</td>";
                  echo "<td>"; echo $count['name']; echo "</td>";
                  echo "<td>"; echo $count['authors']; echo "</td>";
                  echo "<td>"; echo $count['edition']; echo "</td>";
      
                  echo "<td>"; echo $row['issue']; echo "</td>";
                  echo "<td>"; echo $row['returnd']; echo "</td>";
                  echo "<td>"; echo $dateDiff; echo "</td>";
              
                  echo "<td>"; echo $fine; echo "</td>";
                  echo "<td style='text-align:center;'>"; 
                  echo  "<a href='return.php?id=$row[bid] &amp;username=$row[username]' style='cursor: pointer;text-decoration: none; background-color: #7e7e91;color: white;border-radius: 3px;padding: 8px;'>RETURN</a>";
                 
                  echo "</td>";
                  echo "</tr>";
      
               }
            }
      
      }
      
      
      


    }
    else
    {
      echo "<tr>";
      echo "<td colspan='10'>";  echo "Find fine."; echo "</td>";
      echo "</tr>";

    }


    function dateDiffInDays($date1, $date2)  
    { 
        $diff = strtotime($date2) - strtotime($date1); 
       
        return abs(round($diff / 86400)); 
    } 
      


        ?>




                </tbody>
            </table>
        </div>
    </div>





</body>

</html>
​
​
​