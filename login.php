<?php include_once('head.php') ?>
<div>
  <h1>Administrator Login</h1>
<div class="box box-sm">
    <form method="post" id="login-form" class="base-form">
        <label>Email:</label><br>
        <input required type="email" name="admin_email">
        <label>Password:</label><br>
        <input required type="password" name="password"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>
<?php 
  if(isset($_POST['submit'])) {
    if(isset($_POST['admin_email']) && isset($_POST['password'])) {
      $query = "
      SELECT * FROM administrator 
      WHERE admin_email = '{$_POST['admin_email']}'
      AND password = '{$_POST['password']}'
      ";
      if($stmt = mysqli_query($conn, $query)) {
        if($property = mysqli_fetch_assoc($stmt)) {
          header("location: admin.php");
        } else {
          jsAlert("incorrect email or password.");
        }
      } else {
        jsAlert("An error occurred, try again!");
        echo '<pre>';
        print_r(mysqli_error($conn));
        echo '</pre>';
      }
      mysqli_close($conn);
    } else jsAlert("Fields are mandatory.");
  }
?>