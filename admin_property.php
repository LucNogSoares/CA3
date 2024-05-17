<?php include_once('head.php') ?>
<?php include_once('auth.php') ?>
<?php 
    $property = null;
    if(isset($_GET['propertyid'])) {
        $query = "SELECT * FROM property p inner join category c on c.categoryid = p.categoryid where p.propertyid = {$_GET['propertyid']}";
    
        if($stmt = mysqli_query(DB::$conn, $query)) {
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
    if($stmt = mysqli_query(DB::$conn, "SELECT * FROM category")) {
        while($category = mysqli_fetch_array($stmt)) {
            $categories[] = $category;
        }
    } else {
        echo "An error occurred, try again!";
        echo '<pre>';
        print_r(mysqli_error($conn));
        echo '</pre>';
    }

    $vendors = [];
    if($stmt = mysqli_query(DB::$conn, "SELECT * FROM vendor")) {
        while($vendor = mysqli_fetch_array($stmt)) {
            $vendors[] = $vendor;
        }
    } else {
        echo "An error occurred, try again!";
        echo '<pre>';
        print_r(mysqli_error($conn));
        echo '</pre>';
    }

    $actionTitle = isset($_GET['propertyid']) ? "Edit" : "Add";
    $actionTitle .= " Property";

    if(isset($_POST['submit'])){
        if(isset($_GET['propertyid'])) {
            if((new DB())->table('property')
                ->where("propertyid = {$_GET['propertyid']}")
                ->update($_POST)
            ){
                jsAlert('Property updated successfully!');
                header("location: admin_properties.php");
            } else {
                jsAlert('An error occurred, try again!');
            }
        } else {
            if((new DB())->table('property')->insert($_POST)) {
                jsAlert('Property added successfully!');
                header("location: admin_properties.php");
            } else {
                jsAlert('An error occurred, try again!');
            }
        }
    }
?> 

<div class="content">
    <div class="pageTitleBox">
        <h1>Administrator - <?php echo $actionTitle ?> </h1>
        <a href="admin_properties.php" class="base-button">Back to Manage Properties</a>
    </div>
    <form method="post" class="base-form compact-form">
        <div class="group-form">
            <label for="categoryid">Category</label>
            <select name="categoryid" required>
                <?php 
                    foreach($categories as $category) {
                        $selected = $property && $property['categoryid'] == $category['categoryid'] ? "selected"  : "";
                        echo "<option $selected value='{$category['categoryid']}'>{$category['categoryname']}</option>";
                    }
                ?>
            </select> 
        </div>
        <div class="group-form">
            <label for="vendor_email">Vendor</label>
            <select name="vendor_email" required>
                <?php 
                    foreach($vendors as $vendor) {
                        $selected = $property && $property['vendor_email'] == $vendor['vendor_email'] ? "selected"  : "";
                        echo "<option $selected value='{$vendor['vendor_email']}'>{$vendor['vendor_firstname']} {$vendor['vendor_surname']} - {$vendor['vendor_email']}</option>";
                    }
                ?>
            </select> 
        </div>
        <div class="group-form">
            <label for="image">Image</label>
            <input type="text" required placeholder="path/to/image/file" name="image" <?php echo $property ? "value='{$property['image']}'" : "" ?> >
        </div>
        <div class="group-form">
            <label for="address1">Address</label>
            <input type="text" required placeholder="Address goes here..." name="address1" <?php echo $property ? "value='{$property['address1']}'" : "" ?>>
        </div>
        <div class="group-form">
            <label for="town">Town</label>
            <input type="text" required placeholder="Town goes here..." name="town"  <?php echo $property ? "value='{$property['town']}'" : "" ?>>
        </div>
        <div class="group-form">
            <label for="county">County</label>
            <input type="text" required placeholder="County goes here..." name="county" <?php echo $property ? "value='{$property['county']}'" : "" ?>>
        </div>
        <div class="group-form">
            <label for="price">Price</label>
            <input type="number" required placeholder="Price goes here..." name="price" <?php echo $property ? "value='{$property['price']}'" : "" ?>>
        </div>
        <div class="group-form">
            <label for="bedrooms">Bedrooms</label>
            <input type="number" required placeholder="Bedrooms goes here..." name="bedrooms" <?php echo $property ? "value='{$property['bedrooms']}'" : "" ?>>
        </div>
        <div class="group-form">
            <label for="shortdescription">Short Description</label>
            <input type="text" required placeholder="Short description goes here..." name="shortdescription" <?php echo $property ? "value='{$property['shortdescription']}'" : "" ?>>
        </div>
        <div class="group-form">
            <label for="longdescription">Long Description</label>
            <textarea required placeholder="Long description goes here..."  name="longdescription" rows="8" cols="30"><?php echo $property ? $property['longdescription'] : "" ?></textarea>
        </div>
        <div class="submission-box">
            <button type="submit" name="submit" class="base-button">
                <?php echo $actionTitle ?>
            </button>
        </div>
    </form>
</div>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>