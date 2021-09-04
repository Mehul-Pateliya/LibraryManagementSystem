<?php
session_id('student');
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Books Request Page</title>
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

            .topnav .info {
                padding-left: 10px;

            }

            .topnav input[type=text] {
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

        td {
            border-color: black;
        }
    </style>



</head>

<body>
    ​
<?php

$count=0; 
$res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_SESSION[login_suser]' && password='$_SESSION[login_spassword]';");
$row= mysqli_fetch_assoc($res);
$count=mysqli_num_rows($res);


  $first=$row['first'];
  $middle=$row['middle'];
  $last=$row['last'];
  $prn=$row['prn'];
  $email=$row['email'];
  $mobileno=$row['mobilenumber'];
  $photo=$row['image'];
  $username=$row['username'];

?>


    <nav class="navbar navbar-expand-md navbar-dark bg-dark  " style="padding-top: 0px;padding-bottom:0px;">



        <a href="#" class="navbar-brand"> <img src="image\Book.png" width="30" height="30" class="d-inline-block align-top" alt="">
        LIBRARY</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">



            <ul class="nav navbar-nav">

                <li class="nav-item">
                    <a class="nav-link " href="homepage.php">Home</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="books.php">Books</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="bookrequest.php">Books_Request</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="issue_info.php">Issue_Info</a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback</a>
                </li>

            </ul>


            <ul class="navbar-nav ml-auto nav-flex-icons navbar-right">
                <li class="nav-item avatar">
                    <a class="nav-link p-0" href="profile.php">
                        <img src="image\<?php echo $photo ?>" class="rounded-circle z-depth-0" alt="Profile"
                            title="Profile" height="50" style="padding:5px">
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php"><span class="fa fa-sign-out"
                            aria-hidden="true"></span>Logout</a></li>
            </ul>



        </div>





        </div>
    </nav>



    <div class="container-fluid">

        <div class="topnav">
            <div class="search-container">
                <form method="POST">
                    <input type="text" placeholder="   enter book id.." name="search" size="40" required>
                    <button type="submit" name="submit">REQUEST</button>
                </form>
            </div>
        </div>

        <div class="topnav">
            <div class="search-container">

                <div class="info" id="div"></div>

            </div>
        </div>


        <h1 style="text-align:center">Books Request</h1>

        <div class="table-responsive">
            <table class="table table-bordered " id="table">
                <thead style="background-color:#6d6a6a; color: White;">
                    <tr>
                        <th>Book-ID</th>
                        <th>Approve-status</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Button</th>
                    </tr>
                </thead>
                <tbody>



<?php

if(isset($_POST['submit']))
 {

    $b=mysqli_query($db,"SELECT * from books where  bid='$_POST[search]'; ");
    $temp=mysqli_fetch_assoc($b);

    if(mysqli_num_rows($b)==0)
    {
        ?>
                    <script type="text/javascript">
                        var element = document.getElementById("div");
                        element.innerHTML = "for this BID no Such Book exits";
                        element.style.color = "blue";
                    </script>
                    <?php

    }
    else
    {

      if(!strcmp($temp['status'],"Unavailable"))
      {
        ?>
                    <script type="text/javascript">
                        var element = document.getElementById("div");
                        element.innerHTML = "book unavailable";
                        element.style.color = "red";
                    </script>
                    <?php
      }
      else
      {

    $q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_suser]' and bid='$_POST[search]' and approve in ('pending','approve');");
    $row= mysqli_fetch_assoc($q);

    $coun=mysqli_num_rows($q);


    if(mysqli_num_rows($q)==0)
    {
     
    
    $sql="INSERT INTO issue_book Values('$_SESSION[login_suser]', '$_POST[search]', 'pending', '--', '--','')";
    mysqli_query($db, $sql);
      ?>
                    <script type="text/javascript">

                
                     var element = document.getElementById("div");
                            element.innerHTML = "your request is register";
                            element.style.color = "green";
                  

                    </script>
                    <?php
    }
    else
     {
        if(!strcmp("pending",$row['approve']))
        {

        ?>
                    <script type="text/javascript">
                     var element = document.getElementById("div");
                        element.innerHTML = "request alredy exits";
                        element.style.color = "red";
                    </script>
                    <?php
        }
        else
        {

            ?>
                    <script type="text/javascript">
                        var element = document.getElementById("div");
                        element.innerHTML = "book alredy have";
                        element.style.color = "red";
                    </script>
                    <?php
        }

     }
    
    }


    }

 }


    $q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_suser]'  ORDER BY `issue_book`.`id` DESC   ;");


    if(mysqli_num_rows($q)==0)
    {
        echo "<tr >";
        echo "<td colspan='5'>"; echo "There's no  any request"; echo "</td>";
        echo "</tr>";
    }
    else
    {
        while($row=mysqli_fetch_assoc($q))
			{
               
                
                if(!strcmp("pending",$row['approve']))
                {
                echo "<tr class='table-active'>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['approve']; echo "</td>";
                echo "<td>"; echo $row['issue']; echo "</td>";
                echo "<td>"; echo $row['returnd']; echo "</td>";
                echo "<td style='text-align:center;'>"; 
                echo  "<a href='delete.php?id=$row[bid]' style='cursor: pointer;text-decoration: none; background-color: #7e7e91;color: white;border-radius: 3px;padding: 8px;'>DELETE</a>";
                
                echo "</td>";
                echo "</tr>";
                }
                else if(!strcmp("discade",$row['approve']))
                {
                    
                echo "<tr class='table-danger'>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['approve']; echo "</td>";
                echo "<td>"; echo $row['issue']; echo "</td>";
                echo "<td>"; echo $row['returnd']; echo "</td>";
                echo "<td>";  echo "</td>";
                echo "</tr>";
                   
                }
                else if(!strcmp("approve",$row['approve']))
                {
                    
                echo "<tr class='table-success'>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['approve']; echo "</td>";
                echo "<td>"; echo $row['issue']; echo "</td>";
                echo "<td>"; echo $row['returnd']; echo "</td>";
                echo "<td>";  echo "</td>";
                echo "</tr>";
                   
                }
                else
                {
                    
                  echo "<tr class='table-info'>";
                  echo "<td>"; echo $row['bid']; echo "</td>";
                  echo "<td>"; echo $row['approve']; echo "</td>";
                  echo "<td>"; echo $row['issue']; echo "</td>";
                  echo "<td>"; echo $row['returnd']; echo "</td>";
                  echo "<td>";  echo "</td>";
                  echo "</tr>";
                     
                  }
				
			}
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