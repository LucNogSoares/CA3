<?php include_once('head.php') ?>
<?php include_once('auth.php'); ?>

<div class="content">
    <h1>Administrator - Manage Testimonials</h1>

    <hr>
<h3>Pending Testimonials</h3>
<?php 
$result=mysqli_query(DB::$conn, "SELECT * FROM comment WHERE `status` = 'pending'");

echo "<table>";
echo "<tr>
<th>#</th>
<th>Title</th>
<th>Content</th>
<th>Author</th>
<th>Email</th>
<th>Date</th>
<th>Action</th>
</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>
<td>{$row['id']}</td>
<td>{$row['title']}</td>
<td>{$row['content']}</td>
<td>{$row['author_name']}</td>
<td>{$row['author_email']}</td>
<td>{$row['created_at']}</td>
<td style='text-align: center;'>
<a
href='moderate_testimonial.php?id={$row['id']}&status=planned'
class='fa fa-thumbs-up action-icon-success'
></a>
<a
href='moderate_testimonial.php?id={$row['id']}&status=refused'
class='fa fa-thumbs-down action-icon-danger'
></a>
</td>
</tr>";
}
echo "</table>";
?>

<hr>

<h3>Moderated Testimonials</h3>
<?php 
$result=mysqli_query(DB::$conn, "SELECT * FROM comment WHERE `status` != 'pending'");

echo "<table>";
echo "<tr>
<th>#</th>
<th>Title</th>
<th>Content</th>
<th>Author</th>
<th>Email</th>
<th>Status</th>
<th>Action</th>
</tr>";
while($row=mysqli_fetch_array($result)) {
$statusClass = $row['status'] == "planned" ? "fa-thumbs-up action-icon-success" : "fa-thumbs-down action-icon-danger";
$statusIcon = "<i class='fa $statusClass'></i>";
echo "<tr>
<td>{$row['id']}</td>
<td>{$row['title']}</td>
<td>{$row['content']}</td>
<td>{$row['author_name']}</td>
<td>{$row['author_email']}</td>
<td class='text-center'>$statusIcon</td>
<td class='text-center'>
<a
href='admin_testimonials.php?delete_id={$row['id']}'
class='fa fa-trash action-icon'
></a>
</td>
</tr>";
}
echo "</table>";
DB::close();
?>

<div id="deleteTestimonialModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content box-sm">
        <p>Are you sure you want to delete this testimonials #<strong><?php echo $_GET['delete_id'] ?></strong>? </p>
        <br>
        <div class="flex gap-1 justify-content-between w-full">
            <a href="admin_testimonials.php" class="w-half base-button modal-close text-center">CANCEL</a>
            <a <?php echo "href='delete_testimonial.php?id={$_GET['delete_id']}'"  ?> class="w-half base-button btn-danger text-center">YES, DELETE</a>
        </div>
    </div>
</div>

</div>
</main>
<?php include("includes/footer.html");?>
</body>
</html>
<?php 
    if(isset($_GET['delete_id'])){
        echo "<script>openModal('deleteTestimonialModal')</script>";
    }

?>
