<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<h1 class="text-center">PRODUCTS</h1>
<table class="table center table-striped" style="width: 50%;">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category ID</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        include_once('./includes/db_connect.php');
        $sql = "SELECT p.product_id, p.name, p.description, p.price, p.category_id FROM `products` p WHERE 1";
        $result = $conn->query($sql); 
    ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"> <?php echo $row['product_id']; ?></td>
            <td> <?php echo $row['name']; ?></td>
            <td> <?php echo $row['description']; ?></td>
            <td> <?php echo $row['price']; ?></td>
            <td> <?php echo $row['category_id']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once './includes/footer.php'; ?>