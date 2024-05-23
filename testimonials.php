<?php include_once('head.php') ?>

<?php
$sql = "select * from comment WHERE status='planned'";
$result = mysqli_query(DB::$conn, $sql);
echo "<table>";
echo "<tr>
 <th> Title</th>
<th>Content</th>
<th>Author</th>
<th>Created</th>
</tr>";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>
<td>{$row['title']}</td>
<td>{$row['content']}</td>
<td>{$row['author_name']}</td>
<td>{$row['created_at']}</td>
</tr>";
}
echo "</table>";
DB::close();

?>
<div id="addtestimonial" class="box box-sm my-4">
  <h3>Add a Testimonial</h3>
  <p>Please leave your feedback on your experience of our site. We appreciate your feedback and
    take all your comments into consideration! </p>
  <!--form for user to enter feedback -->
  <form method="post" action="process.php" class="base-form">
    <label>Title: </label>
    <input type="text" name="title" required="required">
    <label>Content: </label>
    <textarea name="content" rows="8" cols="30"></textarea>
    <label>Name:</label>
    <input type="text" name="author_name">
    <label>Email: </label>
    <input type="email" name="author_email">
    <button class="base-button w-full" type="submit" id="mysubmit" name="submit">Submit</button>
  </form>
</div>
</main>
<?php include("includes/footer.html"); ?>
</body>

</html>