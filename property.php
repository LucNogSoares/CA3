<?php include_once('head.php') ?>
<?php 

if(!isset($_GET['propertyid'])) {
    echo "propertyid is not defined.";
    exit;
}

?>

<div class="content">
    <div class="pageTitleBox">
        <h1>More details</h1>
        <a href="properties.php" class="base-button">Back to Properties</a>
    </div>
    <?php 
    $query = "SELECT * FROM property p inner join category c on c.categoryid = p.categoryid where p.propertyid = {$_GET['propertyid']}";

    if($stmt = mysqli_query(DB::$conn, $query)) {
        if($property = mysqli_fetch_assoc($stmt)) {
            $address = htmlspecialchars($property['address1']);
            $googleMapsUrl = "https://www.google.com/maps?q=" . urlencode($address) . "&output=embed";
            echo "
                <div class='property-details'>
                    <img src='{$property['image']}' alt='{$property['address1']}'>
                    <div class='property-info'>
                        <h3>Address: {$property['address1']}</h3>
                        <h3>Price: € {$property['price']}</h3>
                        <p>{$property['longdescription']}</p>
                        <div class='category'>{$property['categoryname']}</div>
                        <iframe id='map' src='$googleMapsUrl' frameborder='0' allowfullscreen></iframe>
                    </div>
                </div>
            ";
        } else {
            echo "Property not found.";    
        }
    } else {
        echo "An error occurred, try again!";
        echo '<pre>';
        print_r(mysqli_error(DB::$conn));
        echo '</pre>';
    }
    DB::close();
    ?> 
</div>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>