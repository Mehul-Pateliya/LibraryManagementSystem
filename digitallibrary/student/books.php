
<?php
session_id('student');
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Books Page</title>
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
            padding: 6px;
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


        .topnav .search-container button:hover {
            background: #ccc;
        }

        @media screen and (max-width: 600px) {
            .topnav .search-container {
                float: none;
            }


            .topnav input[type=text] {
                width: 100%;

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

                <li class="nav-item active">
                    <a class="nav-link" href="books.php">Books</a>
                </li>

                <li class="nav-item ">
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
    ​



    <h1 style="text-align:center">List of Books</h1>

    <div class="container-fluid">

        <div class="topnav">
            <div class="search-container">
                <form method="POST">
                    <input type="text" placeholder="   search books.." name="search" id="search" size="50" required>
                </form>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead style="background-color:#6d6a6a; color: White;">
                    <tr>
                        <th>ID</th>
                        <th>Book-Name</th>
                        <th>Authors Name</th>
                        <th>Edition</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody id="searchtable">




<?php

$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

while($temp=mysqli_fetch_assoc($res))
{
  echo "<tr>";
  echo "<td>"; echo $temp['bid']; echo "</td>";
  echo "<td>"; echo $temp['name']; echo "</td>";
  echo "<td>"; echo $temp['authors']; echo "</td>";
  echo "<td>"; echo $temp['edition']; echo "</td>";
  echo "<td>"; echo $temp['status']; echo "</td>";
  echo "<td>"; echo $temp['quantity']; echo "</td>";
  echo "<td>"; echo $temp['department']; echo "</td>";
  echo "</tr>";

}

 ?>


                </tbody>
            </table>
        </div>
    </div>



    <script>

        $(document).ready(function () {
            $("#search").on("keyup", function () {
                var search_term = $(this).val();

                $.ajax({
                    url: "livesearch.php",
                    type: "POST",
                    data: { searchdata: search_term },
                    success: function (data) {
                        $("#searchtable").html(data);
                    }

                });

            });
        });

    </script>


</body>

</html>
​
​
​