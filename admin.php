<?php


function filterinput($variable)
{
  //adds slashes for displaying data with single or double quotes
    $variable = str_replace("'", "\'", $variable);
    $variable = str_replace('"', '\"', $variable);//used single quotes around double quote string check
    return $variable;//return filtered string
}

function getUserContent($username)
{
    $con=mysqli_connect("locahost","dbuser","abc123","my_db");//create a mysqli connection link
    $result = $con->query("SELECT user_content FROM users WHERE username = $username");//use link object method query
    $row = mysqli_fetch_array($result);//grab single row results and create a column key-value array
    mysqli_close($con);//close connection
    
    return $row['user_content'];//return contents of array key user_content
}



//$username = $_POST['username'];//grab posted username data - stuck with POST cause it got confusing switching between GET and POST username

//check if session cookie logged_in exists
if(!isset($_SESSION['session']["logged_in"])) {
  header("Location: login.php");//redirects user to login page
}

if (isset($_POST['username']))//added close bracket and checked on POSTed username instead of GET
{
  $username = filterinput($_POST['username']);//pass posted username through filter function
}


//Im wondering if this inc/ folder is at 242.32.23.4 or is it supposed to be local

include("http://242.32.23.4/inc/admin.inc.php");//grab external admin file by IP address

//checks if url page_id exists
if (isset($_GET['page_id'])) {
  include('inc/inc' . $_GET['page_id'] . '.php');//include local page php file
  include('inc/inc-base.php');//include local base php file
}


echo "<h1>Welcome, $username</h1>";//show username on page

echo getUserContent($username);//show function returned user_content on page

?>
