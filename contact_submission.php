<?php include_once('head.php'); ?>
<?php

if (isset($_POST['submit'])) {
  echo "<h3>Thank you for your message. We will contact you soon.</h3>";
  echo "<a class='base-button' href='contact.php'>Return to Contact page</a>";
} else {
  echo "An error occurred, try again!";
}
?>
</main>
<?php include("includes/footer.html"); ?>
</div>
</body>

</html>