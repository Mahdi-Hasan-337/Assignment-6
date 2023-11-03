<?php 
include_once './includes/header.php';
include_once './includes/nav.php';
?>

<h1 class="text-center">CATEGORIES</h1>
<table class="table center table-striped" style="width: 50%;">
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
<?php include_once './includes/footer.php'; ?>