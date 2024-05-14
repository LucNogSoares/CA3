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
<main>

<div id="search-card">
  <h2>Find Your Property...</h2>
  <form action="properties.php" method="get" id="properties-search">
    <input type="search" name="search" required>
    <button type="submit">
      <i class="fa fa-search"></i>
    </button>
  </form>
</div>
<h3>Welcome to the Gift Company</h3>
This is the home page and it needs content....
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>