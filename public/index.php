<?php include "templates/header.php"; ?>
    <div class="mainarea">
        <link rel="stylesheet" href="css/style.css">
        <h2>Status: You are logged in  <?php echo $_SESSION['Username'];?> </h2>

        <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
            <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
        </form>
    </div>

    <div class="row marketing">
        <div>
            <h4>Home page</h4>
            <p> Some content goes here. Some content goes here. Some content goes here. Some content goes here.
                Some content goes here. Some content goes here. Some content goes here. Some content goes here.
                Some content goes here. Some content goes here. Some content goes here. Some content goes here.
                Some content goes here. Some content goes here. Some content goes here. Some content goes here.
                Some content goes here. Some content goes here. Some content goes here. Some content goes here.
                Some content goes here. </p>
        </div>
    </div>

<?php include "templates/footer.php"; ?>