<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<!-- CUSTOMERS -->
<h1 class="text-center my-4">CUSTOMERS</h1>
<table class="table table-striped mx-auto my-4" style="width: 50%;">
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        include_once('./includes/db_connect.php');
        $sql = "SELECT * from customers;";
        $result = $conn->query($sql); 
    ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"> <?php echo $row['customer_id']; ?></td>
            <td> <?php echo $row['name']; ?></td>
            <td> <?php echo $row['email']; ?></td>
            <td> <?php echo $row['location']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>

<hr>

<!-- CATEGORIES -->
<h1 class="text-center my-4">CATEGORIES</h1>
<table class="table table-striped mx-auto" style="width: 50%;">
    <thead>
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
        </tr>
    </thead>
    <tbody>
    
    <?php 
        include_once('./includes/db_connect.php');
        $sql = "SELECT * from categories;";
        $result = $conn->query($sql); 
    ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"> <?php echo $row['category_id']; ?></td>
            <td> <?php echo $row['name']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>

<hr>

<!-- PRODUCTS -->
<h1 class="text-center my-4">PRODUCTS</h1>
<table class="table table-striped mx-auto my-4" style="width: 50%;">
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

<hr>

<!-- Orders -->
<h1 class="text-center my-4">ORDERS</h1>
<table class="table table-striped mx-auto my-4" style="width: 50%;">
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

<hr>

<!-- order items -->
<h1 class="text-center my-4">ORDERS ITEMS</h1>
<table class="table table-striped mx-auto my-4" style="width: 50%;">
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