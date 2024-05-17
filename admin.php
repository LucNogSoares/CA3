<?php include_once('head.php'); ?>
<?php include_once('auth.php'); ?>
<?php 
  $pendingComments = 0;
  if($stmt = mysqli_query(DB::$conn, "SELECT count(id) total FROM comment WHERE status = 'pending'")) {
    $pendingComments = mysqli_fetch_assoc($stmt)['total'];
  } else {
      echo "An error occurred, try again!";
  }
  DB::close();
?>
<div class="content">
  <h1>Administrator Home</h1>
  <p>There are <strong><?php echo $pendingComments ?></strong> testimonials awaiting approval.</p>
  <div>
    <div class="my-4">
      <a href="admin_properties.php" class="base-button">Manage Properties</a>
    </div>
    <div class="my-4">
      <a href="admin_vendors.php" class="base-button">Manage Vendors</a>
    </div>
    <div class="my-4">
      <a href="admin_testimonials.php" class="base-button">Manage Testimonials</a>
    </div>
    <div class="my-4">
      <a href="logout.php" class="base-button">Logout</a>
    </div>
  </div>
  
</div>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>