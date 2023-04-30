<?php
/**
 * List all users with a link to edit
 */
try
{
    require "../common.php";
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
    <link rel="stylesheet" href="css/update.css"/>
    <h2>Update Products</h2>
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
                <td><a href="update-single.php?id=<?php echo clean($row["PRODUCTID"]);
                    ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php require "templates/footer.php"; ?>