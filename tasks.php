<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<!-- Task-1 -->
<h1 class="text-center my-4">TASK-1</h1>
<table class="table table-striped mx-auto my-4" style="width: 50%;">
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

<hr>

<!-- Task-2 -->
<h1 class="text-center my-4">TASK-2</h1>
<table class="table table-striped  mx-auto my-4" style="width: 50%;">
    <thead>
        <tr>
            <th>ORDER ITEM ID</th>
            <th>PRODUCT Name</th>
            <th>QUANTITY</th>
            <th>TOTAL AMOUNT</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        include_once('./includes/db_connect.php');
        $sql = "SELECT order_items.order_item_id, products.name, order_items.quantity, order_items.unit_price * order_items.quantity AS total_amount 
                FROM Order_Items 
                JOIN Products 
                ON order_items.product_id = products.product_id 
                ORDER BY order_items.order_id ASC;";
        $result = $conn->query($sql); 
    ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"> <?php echo $row['order_item_id']; ?></td>
            <td> <?php echo $row['name']; ?></td>
            <td> <?php echo $row['quantity']; ?></td>
            <td> <?php echo $row['total_amount']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>

<hr>

<!-- Task-3 -->
<h1 class="text-center my-4">TASK-3</h1>
<table class="table table-striped  mx-auto my-4" style="width: 50%;">
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

<hr>

<!-- Task-4 -->
<h1 class="text-center my-4">TASK-4</h1>
<table class="table table-striped  mx-auto my-4" style="width: 50%;">
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