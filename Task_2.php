<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<h1 class="text-center">TASK-2</h1>
<table class="table center table-striped" style="width: 50%;">
    <thead>
        <tr>
            <th>ORDER ID</th>
            <th>PRODUCT Name</th>
            <th>QUANTITY</th>
            <th>TOTAL AMOUNT</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        include_once('./includes/db_connect.php');
        $sql = "SELECT order_items.order_id, products.name, order_items.quantity, order_items.unit_price * order_items.quantity AS  total_amount 
                FROM Order_Items 
                JOIN Products 
                ON order_items.product_id = products.product_id 
                ORDER BY order_items.order_id ASC";
        $result = $conn->query($sql); 
    ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"> <?php echo $row['order_id']; ?></td>
            <td> <?php echo $row['name']; ?></td>
            <td> <?php echo $row['quantity']; ?></td>
            <td> <?php echo $row['total_amount']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once './includes/footer.php'; ?>