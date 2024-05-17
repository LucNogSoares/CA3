<?php include_once('head.php') ?>
<?php 

if(isset($_GET['categoryid']) && $stmt = mysqli_query(DB::$conn, "SELECT * FROM category where categoryid = {$_GET['categoryid']}")) {
    $category=mysqli_fetch_array($stmt);
    $categoryname = $category ? $category['categoryname'] : "";
}

?>

<div class="content">
<h1><?php echo isset($_GET['categoryid']) ? $categoryname : "All Properties" ?></h1>
    <div class="card-group">
    <?php 
    $query = "SELECT * FROM property p inner join category c on c.categoryid = p.categoryid";
    if(isset($_GET['categoryid']) || isset($_GET['search'])) {
        $query .= " WHERE";
        if(isset($_GET['categoryid'])) $query .= " p.categoryid = {$_GET['categoryid']}";
        if(isset($_GET['categoryid']) && isset($_GET['search'])) $query .= " and";
        if(isset($_GET['search'])) $query .= " (p.address1 like '%{$_GET['search']}%' OR p.shortdescription like '%{$_GET['search']}%' OR p.longdescription like '%{$_GET['search']}%')";
    }

    if($stmt = mysqli_query(DB::$conn, $query)) {
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
                <a href='property.php?propertyid={$property['propertyid']}'><button>More Details</button></a>
            </div>
        </div>
            ";
        }
    } else {
        echo "An error occurred, try again!";
        echo '<pre>';
        print_r(mysqli_error($conn));
        echo '</pre>';
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