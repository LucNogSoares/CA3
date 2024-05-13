<?php
$server="localhost";
$dbuser="root";
$password="";
$link=mysqli_connect($server,$dbuser,$password);
mysqli_select_db($link, "giftcompany");
$title=$_POST["title"];
$content=$_POST["content"];
$author_name=$_POST["author_name"];
$email=$_POST["author_email"];
$sql_insert="INSERT INTO comment (title, content, author_name, author_email)
VALUES ('$title', '$content', '$author_name', '$email')";
if(mysqli_query($link, $sql_insert)) {
echo "<h3>Testimonial Added!</h3>Thank you for your feedback. Our administrators moderate all
comments and it will be attended to shortly<p>";
echo "<a href='getcomments.php'>Return to Testimonials page</a>";}
else {
echo "An error occurred, try again!";
}
mysqli_close($link);
?>