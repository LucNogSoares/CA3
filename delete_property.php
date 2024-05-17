<?php include_once('head.php') ?>
<?php include_once('auth.php') ?>
<?php 
    if(isset($_GET['propertyid'])) {
        if(
            (new DB())->table('property')
            ->where("propertyid = {$_GET['propertyid']}")
            ->delete()
        ) {
            header("location: admin_properties.php");
        } else {
            echo 'An error occurred, try again!';
            echo '<pre>';
            print_r(mysqli_error(DB::$conn));
            echo '</pre>';
            exit;
        }
    } else {
        echo "propertyid is not defined.";
    }
?> 

</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>