<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<h1 class="text-center">TASK-3</h1>
<table class="table center table-striped" style="width: 50%;">
    <thead>
        <tr>
            <th>CATEGORY NAME</th>
            <th>TOTAL REVENUE</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        include_once('./includes/db_connect.php');
        $sql = "SELECT categories.name, SUM(order_items.quantity * order_items.unit_price) AS total_revenue
                FROM Categories
                JOIN Products ON categories.category_id = products.category_id
                JOIN Order_Items order_items ON products.product_id = order_items.product_id
                GROUP BY categories.name
                ORDER BY total_revenue DESC";
        $result = $conn->query($sql); 
    ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"> <?php echo $row['name']; ?></td>
            <td> <?php echo $row['total_revenue']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once './includes/footer.php'; ?>