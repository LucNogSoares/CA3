<?php 

function addPageLink($uri, $name) {
  $urlpoints = explode('/', $_SERVER['REQUEST_URI']);
  $page = $urlpoints[array_key_last($urlpoints)];
  $page = explode('?', $page);
  $page = $page[key($page)];

  $class = $page === $uri ? "active" : "";
  echo "<a href='$uri' class='$class'>$name</a>";
}

?>
<nav class="topnav" id="myTopnav">
  <?php addPageLink("index.php", "Home") ?>
  <div class="dropdown">
    <button class="dropbtn">
      Properties
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="properties.php">All Properties</a>
      <?php 
    if($stmt = mysqli_query($conn, "SELECT * FROM category")) {
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
