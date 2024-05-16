<?php include_once('head.php') ?>
<?php include_once('auth.php') ?>
<?php 
    $property = null;
    if(isset($_GET['propertyid'])) {
        $query = "SELECT * FROM property p inner join category c on c.categoryid = p.categoryid where p.propertyid = {$_GET['propertyid']}";
    
        if($stmt = mysqli_query($conn, $query)) {
            $property = mysqli_fetch_assoc($stmt);
            if(!$property) echo "Property not found.";
        } else {
            echo "An error occurred, try again!";
            echo '<pre>';
            print_r(mysqli_error($conn));
            echo '</pre>';
        }
    }

    $categories = [];
    if($stmt = mysqli_query($conn, "SELECT * FROM category")) {
        while($category = mysqli_fetch_array($stmt)) {
            $categories[] = $category;
        }
    } else {
        echo "An error occurred, try again!";
        echo '<pre>';
        print_r(mysqli_error($conn));
        echo '</pre>';
    }
    mysqli_close($conn);
?> 

<div class="content">
    <div class="pageTitleBox">
        <h1>Administrator - <?php echo isset($_GET['propertyid']) ? "Edit" : "Add"  ?>  Property</h1>
        <a href="admin_properties.php" class="base-button">Back to Manage Properties</a>
    </div>
    <form method="post" class="base-form box-sm">
        <div>
            <label for="categoryid">Category</label>
            <select name="categoryid">
                <?php 
                    foreach($categories as $category) {
                        echo "<option value='{$category['categoryid']}'>{$category['categoryname']}</option>";
                    }
                ?>
            </select> 
        </div>
        <div>
            <label for="address1">Address</label>
            <input type="text" name="address1">
        </div>
        <div>
            <label for="town">Town</label>
            <input type="text" name="town">
        </div>
        <div>
            <label for="county">County</label>
            <input type="text" name="county">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price">
        </div>
        <div>
            <label for="bedrooms">Bedrooms</label>
            <input type="number" name="bedrooms">
        </div>
        <div>
            <label for="shortdescription">Short Description</label>
            <input type="text" name="shortdescription">
        </div>
        <div>
            <label for="longdescription">Long Description</label>
            <textarea name="longdescription" rows="8" cols="30"></textarea>
        </div>
    </form>
</div>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>