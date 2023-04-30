<?php
require "../common.php";
if (isset($_POST['submit']))
{
    try
    {
        require_once '../src/DBconnect.php';
        $product =[
            "PRODUCTID" => clean($_POST['PRODUCTID']),
            "TITLE" => clean($_POST['TITLE']),
            "PRICE" => clean($_POST['PRICE']),
            "AUTHOR" => clean($_POST['AUTHOR']),
            "ISBN" => clean($_POST['ISBN']),
            "DISCOUNT" => clean($_POST['DISCOUNT'])
        ];
        $sql = "UPDATE products
                 SET PRODUCTID = :PRODUCTID,
                 TITLE = :TITLE,
                 PRICE = :PRICE,
                 AUTHOR = :AUTHOR,
                 DISCOUNT = :DISCOUNT
                 WHERE PRODUCTID = :PRODUCTID";
        $statement = $connection->prepare($sql);
        $statement->execute($product);
    }
    catch(PDOException $error)
    {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_GET['id']))
{
    try {
        require_once '../src/DBconnect.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE PRODUCTID = :PRODUCTID";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':PRODUCTID', $id);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $error)
    {
        echo $sql . "<br>" . $error->getMessage();
    }
}
else
{
    echo "Something went wrong!";
    exit;
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo clean($_POST['TITLE']); ?> successfully updated.
<?php endif; ?>
<link rel="stylesheet" href="css/create.css"/>
<h2>Edit a Product</h2>

<form method="post">
    <?php foreach ($product as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;
        ?>" value="<?php echo clean($value); ?>" <?php echo ($key === 'PRODUCTID' ?
            'readonly' : null); ?>>
    <?php endforeach; ?>
    <br><br><input type="submit" name="submit" value="Submit">
</form>

<?php require "templates/footer.php"; ?>
