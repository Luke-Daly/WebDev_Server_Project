<?php
session_start();
if($_SESSION['Active'] == false)
{ /* Redirects user to Login.php if not logged in. Remember, we set $_SESSION['Active'] == true in login.php*/
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Software Engineering and Testing</title>
</head>
<body>
    <h1>Software Engineering and Testing</h1>

    <nav>
        <ul>
            <li>
                <a href="register.php"><strong>Register</strong></a> - Add a user
            </li>
            <li>
                <a href="search.php"><strong>Search</strong></a> - Search for a book
            </li>
            <li>
                <a href="updateStock.php"><strong>Update</strong></a> - Update products
            </li>
            <li>
                <a href="deleteStock.php"><strong>Delete</strong></a> - Delete products
            </li>
            <li>
                <a href="cart.php"><strong>Cart</strong></a> - Shopping Cart
            </li>
        </ul>
    </nav>