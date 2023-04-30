<?php include "templates/header.php"; ?>

    <ul>
        <li>
            <a href="register.php"><strong>Create</strong></a> - add a user
        </li>
        <li>
            <a href="search.php"><strong>Read</strong></a> - find a book
        </li>
        <li>
            <a href="updateStock.php"><strong>Update</strong></a> - update a product
        </li>
        <li>
            <a href="deleteStock.php"><strong>Delete</strong></a> - delete a product
        </li>
    </ul>

    <div class="mainarea">
        <h1>Status: You are logged in  <?php echo $_SESSION['Username'];?> </h1>

        <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
            <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
        </form>
    </div>


<?php include "templates/footer.php"; ?>