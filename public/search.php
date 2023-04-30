<?php
/**
 * Function to query information based on
 * a parameter: in this case, author.
 *
 */
if (isset($_POST['submit']))
{
    try
    {
        require "../common.php";
        require_once '../src/DBconnect.php';
        $sql = "SELECT * 
        FROM products 
        WHERE author = :author";
        $author = $_POST['author'];
        $statement = $connection->prepare($sql);
        $statement->bindParam(':author', $author, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    }
    catch(PDOException $error)
    {
        echo $sql . "<br>" . $error->getMessage();
    }
}

require "templates/header.php";

if (isset($_POST['submit']))
{
    if ($result && $statement->rowCount() > 0)
    {
        ?>
        <h2>Results</h2>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>Author</th>
                <th>ISBN Number</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row)
            { ?>
                <tr>
                    <td><?php echo clean($row["PRODUCTID"]); ?></td>
                    <td><?php echo clean($row["TITLE"]); ?></td>
                    <td>€<?php echo clean($row["PRICE"]); ?></td>
                    <td><?php echo clean($row["AUTHOR"]); ?></td>
                    <td><?php echo clean($row["ISBN"]); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php }
    else
    { ?>
        > No results found for <?php echo clean($_POST['author']); ?>.
    <?php }
} ?>
<link rel="stylesheet" href="css/read.css"/>
<h2>Find books based on Author</h2>

<form method="post">
    <label for="author">Author</label>
    <input type="text" id="author" name="author">
    <br><br><input type="submit" name="submit" value="View Results">
</form>

<?php require "templates/footer.php"; ?>
