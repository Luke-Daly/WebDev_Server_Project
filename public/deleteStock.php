<?php
/**
 * Delete a user
 */
require "../common.php";
if (isset($_GET["id"]))
{
    try
    {
        require_once '../src/DBconnect.php';
        $id = $_GET["id"];
        $sql = "DELETE FROM products WHERE PRODUCTID = :PRODUCTID";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':PRODUCTID', $id);
        $statement->execute();
        $success = "User ". $id. " successfully deleted";
    }
    catch(PDOException $error)
    {
        echo $sql . "<br>" . $error->getMessage();
    }
}
try
{
    require_once '../src/DBconnect.php';
    $sql = "SELECT * FROM products";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
}
catch(PDOException $error)
{
    echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
    <link rel="stylesheet" href="css/delete.css"/>

    <h2>Delete Products</h2>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Price</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
            <tr>
                <td><?php echo clean($row["PRODUCTID"]); ?></td>
                <td><?php echo clean($row["TITLE"]); ?></td>
                <td><?php echo clean($row["PRICE"]); ?></td>
                <td><?php echo clean($row["AUTHOR"]); ?></td>
                <td><?php echo clean($row["ISBN"]); ?></td>
                <td><a href="deleteStock.php?id=<?php echo clean($row["PRODUCTID"]); ?> "> Delete </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php require "templates/footer.php"; ?>