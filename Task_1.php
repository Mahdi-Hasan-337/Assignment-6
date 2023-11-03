<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<h1 class="text-center">TASK-1</h1>
<table class="table center table-striped" style="width: 50%;">
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Location</th>
            <th>Total Orders</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        include_once('./includes/db_connect.php');
        $sql = "SELECT Customers.customer_id, Customers.name, Customers.email, Customers.location, COUNT(Orders.order_id) AS total_orders
                FROM Customers
                JOIN Orders ON Customers.customer_id = Orders.customer_id
                GROUP BY Customers.customer_id
                ORDER BY total_orders DESC";
        $result = $conn->query($sql); 
    ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"> <?php echo $row['customer_id']; ?></td>
            <td> <?php echo $row['name']; ?></td>
            <td> <?php echo $row['email']; ?></td>
            <td> <?php echo $row['location']; ?></td>
            <td> <?php echo $row['total_orders']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once './includes/footer.php'; ?>