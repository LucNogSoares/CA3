<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>My first HTML5 page</title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<body>
<div id="container">
<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
<div id="content">

<?php 
$server="localhost";
$dbuser="root";
$password="";
$link=mysql_connect($server,$dbuser,$password);
mysqli_select_db($link, "giftcompany");
$sql="SELECT * from comment";
$result=mysqli_query($link, $sql);
echo "<table>";
echo "<tr>
 <th> Title</th>
<th>Content</th>
<th>Author</th>
<th>Created</th>
</tr>";
while($row=mysqli_fetch_array($result)) {
$title=$row["title"];
$content=$row["content"];
$author=$row["author_name"];
$created=$row["created_at"];
echo "<tr>
 <td>$title</td>
<td>$content</td>
<td>$author</td>
<td>$created</td>
</tr>";
}
echo "</table>";
mysqli_close($link);

?>
</div>
</body>
</html>



<?php include("includes/footer.html");?>
</div>
</body>
</html>
