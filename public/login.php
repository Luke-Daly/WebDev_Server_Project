<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign In</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/signin.css"/>
</head>

<body>
<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" >Username</label>
        <input name="Username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br><br><button name="Submit" value="Login" class="button" type="submit">Sign in</button>
    </form>
</div>

<?php
/* Check if login form has been submitted */
/* isset — Determine if a variable is declared and is different than NULL*/
if(isset($_POST['Submit']))
{
    try
    {
        require "../common.php";
        require_once '../src/DBconnect.php';

        $uname = clean($_POST['Username']);
        $pass = clean($_POST['Password']);

        $sql = "SELECT USERNAME, US_PASSWORD FROM us WHERE USERNAME = '$uname' AND US_PASSWORD = '$pass'";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $user = $statement->fetch();
    }
    catch(PDOException $error)
    {
        echo $sql . "<br>" . $error->getMessage();
    }

    /* Check if the form's username and password matches */
    /* these currently check against variable values stored in config.php but later we will see how these can be checked against information in a database*/
    if($user['USERNAME'] === $uname && $user['US_PASSWORD'])
    {
        /* Success: Set session variables and redirect to protected page */

        $_SESSION['Username'] = $_POST['Username']; //store Username to the session
        $_SESSION['Active'] = true;
        header("location:index.php"); /* 'header() is used to redirect the browser */
        exit; //we’ve just used header() to redirect to another page but we must terminate all current code so that it doesn’t run when we redirect
    }
    else
        echo 'Incorrect Username or Password';
}
?>
</body>
</html>