<?php include_once('head.php') ?>
<?php include_once('auth.php'); ?>

<div class="content">
    <div class="pageTitleBox">
        <h1>Administrator - Manage Properties</h1>
        <a href="admin_property.php" class="base-button">Add Property</a>
    </div>
<?php 
$result=mysqli_query(DB::$conn, "SELECT * FROM property p inner join category c on c.categoryid = p.categoryid");
echo "<table>";
echo "<tr>
<th>#</th>
<th>Category</th>
<th>Address</th>
<th>Price</th>
<th>Short description</th>
<th>Action</th>
</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>
<td>{$row['propertyid']}</td>
<td>{$row['categoryname']}</td>
<td>{$row['address1']}</td>
<td>€ {$row['price']}</td>
<td>{$row['shortdescription']}</td>
<td style='text-align: center;'>
<a
href='admin_property.php?propertyid={$row['propertyid']}'
class='fa fa-pencil action-icon'
></a>
<a
href='delete_property.php?propertyid={$row['propertyid']}'
class='fa fa-trash action-icon'
></a>
</td>
</tr>";
}
echo "</table>";
DB::close();
?>
</div>
</main>
<?php include("includes/footer.html");?>
</body>
</html>
