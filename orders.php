<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<h1 class="text-center">ORDERS</h1>
<table class="table center table-striped" style="width: 50%;">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Order Date</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        include_once('./includes/db_connect.php');
        $sql = "SELECT * FROM orders;";
        $result = $conn->query($sql); 
    ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"> <?php echo $row['order_id']; ?></td>
            <td> <?php echo $row['customer_id']; ?></td>
            <td> <?php echo $row['order_date']; ?></td>
            <td> <?php echo $row['total_amount']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once './includes/footer.php'; ?>