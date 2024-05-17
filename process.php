<?php include_once('head.php'); ?>
<?php

$sql="INSERT INTO comment (title, content, author_name, author_email)
VALUES ('{$_POST['title']}', '{$_POST['content']}', '{$_POST['author_name']}', '{$_POST['author_email']}')";

if(mysqli_query(DB::$conn, $sql)) {
echo "<h3>Testimonial Added!</h3>Thank you for your feedback. Our administrators moderate all
comments and it will be attended to shortly<p>";
echo "<a href='testimonials.php'>Return to Testimonials page</a>";}
else {
echo "An error occurred, try again!";
}
DB::close();
?>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>
