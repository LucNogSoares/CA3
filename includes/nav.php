<nav class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
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
  <a href="testimonials.php">Testimonials</a>
  <a href="about.php">About Us</a>
  <a href="contact.html">Contact Us</a>
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
