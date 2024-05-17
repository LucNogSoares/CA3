<?php include_once('head.php') ?>
<?php include_once('auth.php') ?>
<?php 
    if(isset($_GET['id']) || isset($_GET['status'])) {
        if(
            (new DB())->table('comment')
            ->where("id = {$_GET['id']}")
            ->patch(['status' => $_GET['status']])
        ) {
            header("location: admin_testimonials.php");
        } else {
            echo 'An error occurred, try again!';
            echo '<pre>';
            print_r(mysqli_error(DB::$conn));
            echo '</pre>';
            exit;
        }
    } else {
        if(isset($_GET['id'])) echo "<p>id is not defined.</p>";
        if(isset($_GET['status'])) echo "<p>status is not defined.</p>";
    }
?> 

</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>