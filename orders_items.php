<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<h1 class="text-center">ORDER ITEMS</h1>
<table class="table center table-striped" style="width: 50%;">
    <thead>
        <tr>
            <th>Order ItemID</th>
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Unit Price</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        include_once('./includes/db_connect.php');
        $sql = "SELECT o.order_item_id, o.order_id, o.product_id, o.quantity, o.unit_price FROM `order_items` o WHERE 1";
        $result = $conn->query($sql); 
    ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"> <?php echo $row['order_item_id']; ?></td>
            <td> <?php echo $row['order_id']; ?></td>
            <td> <?php echo $row['product_id']; ?></td>
            <td> <?php echo $row['quantity']; ?></td>
            <td> <?php echo $row['unit_price']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once './includes/footer.php'; ?>