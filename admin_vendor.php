<?php include_once('head.php') ?>
<?php include_once('auth.php') ?>
<?php 
    $vendor = null;
    if(isset($_GET['vendor_email'])) {
        $query = "SELECT * FROM vendor where vendor_email = '{$_GET['vendor_email']}'";
        
        if($stmt = mysqli_query(DB::$conn, $query)) {
            $vendor = mysqli_fetch_assoc($stmt);
            if(!$vendor) echo "Vendor not found.";
        } else {
            echo "An error occurred, try again!";
            echo '<pre>';
            print_r(mysqli_error(DB::$conn));
            echo '</pre>';
        }
    }

    $actionTitle = isset($_GET['vendor_email']) ? "Edit" : "Add";
    $actionTitle .= " Vendor";

    if(isset($_POST['submit'])){
        if(isset($_GET['vendor_email'])) {
            if((new DB())->table('vendor')
                ->where("vendor_email = '{$_GET['vendor_email']}'")
                ->update($_POST)
            ){
                jsAlert('Vendor updated successfully!');
                header("location: admin_vendors.php");
            } else {
                echo '<pre>';
                print_r(mysqli_error(DB::$conn));
                echo '</pre>';
            }
        } else {
            if((new DB())->table('vendor')->insert($_POST)) {
                jsAlert('Vendor added successfully!');
                header("location: admin_vendors.php");
            } else {
                echo '<pre>';
                print_r(mysqli_error(DB::$conn));
                echo '</pre>';
            }
        }
    }
?> 

<div class="content">
    <div class="pageTitleBox">
        <h1>Administrator - <?php echo $actionTitle ?> </h1>
        <a href="admin_vendors.php" class="base-button">Back to Manage Vendors</a>
    </div>
    <form method="post" class="base-form compact-form">
        <div class="group-form">
            <label for="vendor_firstname">First Name</label>
            <input type="text" required placeholder="First Name goes here..." name="vendor_firstname" <?php echo $vendor ? "value='{$vendor['vendor_firstname']}'" : "" ?>>
        </div>
        <div class="group-form">
            <label for="vendor_surname">Surname</label>
            <input type="text" required placeholder="Surname goes here..." name="vendor_surname" <?php echo $vendor ? "value='{$vendor['vendor_surname']}'" : "" ?>>
        </div>
        <div class="group-form">
            <label for="vendor_email">Email</label>
            <input type="email" required placeholder="Email goes here..." name="vendor_email" <?php echo $vendor ? "value='{$vendor['vendor_email']}'" : "" ?>>
        </div>
        <div class="group-form">
            <label for="vendor_phone">Phone</label>
            <input type="tel" required placeholder="Phone goes here..." name="vendor_phone" <?php echo $vendor ? "value='{$vendor['vendor_phone']}'" : "" ?>>
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