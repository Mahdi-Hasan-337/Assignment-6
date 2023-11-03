<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<h1 class="text-center">CUSTOMERS</h1>
<table class="table center table-striped" style="width: 50%;">
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
<?php include_once './includes/footer.php'; ?>