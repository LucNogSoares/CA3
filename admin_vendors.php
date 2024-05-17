<?php include_once('head.php') ?>
<?php include_once('auth.php'); ?>

<div class="content">
    <div class="pageTitleBox">
        <h1>Administrator - Manage Vendors</h1>
        <a href="admin_vendor.php" class="base-button">Add Vendor</a>
    </div>
<?php 
$result=mysqli_query(DB::$conn, "SELECT * FROM vendor");
echo "<table>";
echo "<tr>
<th>First Name</th>
<th>Surname</th>
<th>Email</th>
<th>Phone</th>
<th>Action</th>
</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>
<td>{$row['vendor_firstname']}</td>
<td>{$row['vendor_surname']}</td>
<td>{$row['vendor_email']}</td>
<td>{$row['vendor_phone']}</td>
<td style='text-align: center;'>
<a
href='admin_vendor.php?vendor_email={$row['vendor_email']}'
class='fa fa-pencil action-icon'
></a>
<a
href='?delete_vendor={$row['vendor_email']}'
class='fa fa-trash action-icon'
></a>
</td>
</tr>";
}
echo "</table>";
DB::close();
?>

<div id="deleteVendorModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content box-sm">
        <p>Are you sure you want to delete this vendor: <strong><?php echo $_GET['delete_vendor'] ?></strong>? </p>
        <br>
        <div class="flex gap-1 justify-content-between w-full">
            <a href="admin_vendors.php" class="w-half base-button modal-close text-center">CANCEL</a>
            <a <?php echo "href='delete_vendor.php?vendor_email={$_GET['delete_vendor']}'"  ?> class="w-half base-button btn-danger text-center">YES, DELETE</a>
        </div>
    </div>
</div>

</div>
</main>
<?php include("includes/footer.html");?>
</body>
</html>
<?php 
    if(isset($_GET['delete_vendor'])){
        echo "<script>openModal('deleteVendorModal')</script>";
    }

?>
