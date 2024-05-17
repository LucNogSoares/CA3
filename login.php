<?php include_once('head.php') ?>
<div>
  <h1>Administrator Login</h1>
<div class="box box-sm">
    <form method="post" id="login-form" class="base-form">
        <label>Email:</label>
        <input required type="email" name="admin_email">
        <label>Password:</label>
        <input required type="password" name="password">
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>
<?php 

  if(isset($_SESSION['admin_email'])) {
    header("location: admin.php");
  }

  if(isset($_POST['submit'])) {
    if(isset($_POST['admin_email']) && isset($_POST['password'])) {
      $query = "
      SELECT * FROM administrator 
      WHERE admin_email = '{$_POST['admin_email']}'
      AND password = '{$_POST['password']}'
      ";
      if($stmt = mysqli_query(DB::$conn, $query)) {
        if($property = mysqli_fetch_assoc($stmt)) {
          $_SESSION['admin_email'] = $_POST['admin_email'];
          header("location: admin.php");
        } else {
          jsAlert("incorrect email or password.");
        }
      } else {
        jsAlert("An error occurred, try again!");
        echo '<pre>';
        print_r(mysqli_error(DB::$conn));
        echo '</pre>';
      }
      DB::close();
    } else jsAlert("Fields are mandatory.");
  }
?>