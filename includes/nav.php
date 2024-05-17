<?php 

function getUri() {
  $urlpoints = explode('/', $_SERVER['REQUEST_URI']);
  $page = $urlpoints[array_key_last($urlpoints)];
  $page = explode('?', $page);
  return $page[key($page)];
}

function addPageLink($uri, $name) {
  $page = getUri();
  $class = $page === $uri ? "active" : "";
  echo "<a href='$uri' class='$class'>$name</a>";
}

?>
<nav class="topnav" id="myTopnav">
  <?php addPageLink("index.php", "Home") ?>
  <div <?php echo getUri() === "properties.php" ? "class='dropdown active'" : "class='dropdown'" ?> >
    <button class="dropbtn">
      Properties
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="properties.php">All Properties</a>
      <?php 
    if($stmt = mysqli_query(DB::$conn, "SELECT * FROM category")) {
        while($category=mysqli_fetch_array($stmt)) {
            echo "<a href='properties.php?categoryid={$category['categoryid']}'>{$category['categoryname']}</a>";
        }
    } else {
        echo "An error occurred, try again!";
    }
    ?>
    </div>
  </div>
  <?php addPageLink("testimonials.php", "Testimonials</") ?>
  <?php addPageLink("about.php", "About Us") ?>
  <?php addPageLink("contact.php", "Contact Us") ?>
  <?php if(isset($_SESSION['admin_email'])) { ?>
    <div <?php echo getUri() === "admin.php" ? "class='dropdown active'" : "class='dropdown'" ?> >
    <button class="dropbtn">
      Admin
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="admin.php">Admin Home</a>
      <a href="admin_properties.php">Manage Properties</a>
      <a href="admin_vendors.php">Manage Vendors</a>
      <a href="admin_testimonials.php">Manage Testimonials</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>
  <?php } ?>
  <a
    href="javascript:void(0);"
    style="font-size: 15px"
    class="icon"
    onclick="myFunction()"
    >&#9776;</a
  >
</nav>

<script>
  function myFunction() {
    var x = document.getElementById('myTopnav')
    if (x.className === 'topnav') {
      x.className += ' responsive'
    } else {
      x.className = 'topnav'
    }
  }
</script>
