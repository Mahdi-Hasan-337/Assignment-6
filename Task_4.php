<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<h1 class="text-center">TASK-4</h1>
<table class="table center table-striped" style="width: 50%;">
    <thead>
        <tr>
            <th>CUSTOMER NAME</th>
            <th>TOTAL PURCHASE AMOUNT</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        include_once('./includes/db_connect.php');
        $sql = "SELECT Customers.name AS CustomerName,SUM(orders.total_amount) AS TotalPurchaseAmount
                FROM Customers
                JOIN Orders ON Customers.customer_id = orders.customer_id
                GROUP BY customers.customer_id, customers.name
                ORDER BY TotalPurchaseAmount DESC
                LIMIT 5";
        $result = $conn->query($sql); 
    ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"> <?php echo $row['CustomerName']; ?></td>
            <td> <?php echo $row['TotalPurchaseAmount']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once './includes/footer.php'; ?>