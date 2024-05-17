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
href='?delete_property={$row['propertyid']}'
class='fa fa-trash action-icon'
></a>
</td>
</tr>";
}
echo "</table>";
DB::close();
?>

<div id="deletePropertyModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content box-sm">
        <p>Are you sure you want to delete this property #<strong><?php echo $_GET['delete_property'] ?></strong>? </p>
        <br>
        <div class="flex gap-1 justify-content-between w-full">
            <a href="admin_properties.php" class="w-half base-button modal-close text-center">CANCEL</a>
            <a <?php echo "href='delete_property.php?propertyid={$_GET['delete_property']}'"  ?> class="w-half base-button btn-danger text-center">YES, DELETE</a>
        </div>
    </div>
</div>

</div>
</main>
<?php include("includes/footer.html");?>
</body>
</html>
<?php 
    if(isset($_GET['delete_property'])){
        echo "<script>openModal('deletePropertyModal')</script>";
    }

?>
