<?php include_once('head.php'); ?>
<?php
if (isset($_POST['submit'])) {
  $values = $_POST;
  $values['status'] = 'pending';
  if ((new DB())->table('comment')->insert($values)) {
    echo "<h3>Testimonial Added!</h3>Thank you for your feedback. Our administrators moderate all comments and it will be attended to shortly<p>";
    echo "<a class='base-button' href='testimonials.php'>Return to Testimonials page</a>";
  } else {
    echo "An error occurred, try again!";
    echo '<pre>';
    print_r(mysqli_error(DB::$conn));
    echo '</pre>';
  }
}
?>
</main>
<?php include("includes/footer.html"); ?>
</div>
</body>

</html>