<?php
/**
 *
 */
if (isset($_POST['submit']))
{
    require "../common.php";
    try
    {
        require_once '../src/DBconnect.php';
        $new_user = array(
            "username" => clean($_POST['username']),
            "us_password" => clean($_POST['us_password']),
            "email" => clean($_POST['email']),
            "phone" => clean($_POST['phone'])
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "us",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    }
    catch(PDOException $error)
    {
        echo $sql . "<br>" . $error->getMessage();
    }
}
require "templates/header.php";
if (isset($_POST['submit']) && $statement){
    echo $new_user['username']. ' successfully added';
}
?>
    <h2>Add a user</h2>
    <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="us_password">Password</label>
        <input type="password" name="us_password" id="us_password">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email">
        <label for="phone">Phone Number</label>
        <input type="text" name="phone" id="phone">
        <br><input type="submit" name="submit" value="Submit">
    </form>
<?php require "templates/footer.php"; ?>