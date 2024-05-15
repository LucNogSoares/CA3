<?php include_once('head.php') ?>

<?php 
$sql="select * from comment WHERE status='planned'";
$result=mysqli_query($conn, $sql);
echo "<table>";
echo "<tr>
 <th> Title</th>
<th>Content</th>
<th>Author</th>
<th>Created</th>
</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>
<td>{$row['title']}</td>
<td>{$row['content']}</td>
<td>{$row['author_name']}</td>
<td>{$row['created_at']}</td>
</tr>";
}
echo "</table>";
mysqli_close($conn);

?>
<div id="addtestimonial">
  <h3>Add a Testimonial</h3>
  <p>Please leave your feedback on your experience of our site. We appreciate your feedback and
    take all your comments into consideration! </p>
    <!--form for user to enter feedback -->
    <form method="post" action="process.php" id="commentform">
      <label>Title: </label>
      <input type="text" name="title" required="required"><br>
<label>Content: </label>
<textarea name="content" rows="8" cols="30" ></textarea><br>
<label>Name:</label>
<input type="text" name="author_name"><br>
<label>Email: </label>
<input type="email" name="author_email"><br>
<input type="submit" id="mysubmit" name="submit" value="Add Comment">
</form>
</div>
</main>
<?php include("includes/footer.html");?>
</body>
</html>
