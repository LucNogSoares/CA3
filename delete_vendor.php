<?php include_once('head.php') ?>
<?php include_once('auth.php') ?>
<?php 
    if(isset($_GET['vendor_email'])) {
        if(
            (new DB())->table('vendor')
            ->where("vendor_email = '{$_GET['vendor_email']}'")
            ->delete()
        ) {
            header("location: admin_vendors.php");
        } else {
            echo 'An error occurred, try again!';
            echo '<pre>';
            print_r(mysqli_error(DB::$conn));
            echo '</pre>';
            exit;
        }
    } else {
        echo "vendor_email is not defined.";
    }
?> 

</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>