<?php include_once('head.php') ?>

<div id="search-card">
  <h2>Find Your Property...</h2>
  <form action="properties.php" method="get" id="properties-search">
    <input type="search" name="search" required>
    <button type="submit">
      <i class="fa fa-search"></i>
    </button>
  </form>
</div>

<div class="content">
<h1>Recently Added</h1>
    <div class="card-group">
    <?php 
    if($stmt = mysqli_query(DB::$conn, "SELECT * FROM property p inner join category c on c.categoryid = p.categoryid order by propertyid desc limit 3")) {
        while($property=mysqli_fetch_array($stmt)) {
            echo "
            <div class='card'>
            <div class='card-top'>
                <div class='category'>{$property['categoryname']}</div>
                <img src='{$property['image']}' alt='{$property['address1']}'>
            </div>
            <div class='card-info'>
                <h2>Address: {$property['address1']}</h2>
                <h3>Price: € {$property['price']}</h3>
                <p>{$property['shortdescription']}</p>
            </div>
            <div class='card-action'>
                <a href='property.php?propertyid={$property['propertyid']}'><button class='base-button'>More Details</button></a>
            </div>
        </div>
            ";
        }
    } else {
        echo "An error occurred, try again!";
    }
    DB::close();
    ?>
    </div> 
</div>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>