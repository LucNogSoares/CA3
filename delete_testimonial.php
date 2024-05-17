<?php include_once('head.php') ?>
<?php include_once('auth.php') ?>
<?php 
    if(isset($_GET['id'])) {
        if(
            (new DB())->table('comment')
            ->where("id = {$_GET['id']}")
            ->delete()
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
        echo "<p>id is not defined.</p>";
    }
?> 

</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>