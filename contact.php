<?php include_once('head.php') ?>

<h1>Contact us</h1>
<div id="contact-page">

<div id="contact-box" class="box">
  <?php 
    if(isset($_POST['submit'])) {
        echo "<h2>Thank you for your message. We will contact you soon.</h2>";
    }
  ?>
  <h3>Leave a Message</h3>
    <form method="post" class="base-form">
        <label>Name:</label>
        <input required type="text" name="name">
        <label>Phone:</label>
        <input required type="tel" name="phone">
        <label>Email: </label>
        <input required type="email" name="email">
        <label>Message: </label>
        <textarea  requiredname="message" rows="8" cols="30" ></textarea>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
<div id="reach-box" class="box">
  <h3>Reach us</h3>
  <p><strong>Email:</strong> contact@loremipsum.com</p>
  <p><strong>Phone:</strong> 51515155451</p>
  <p><strong>Address:</strong> Dublin, Ireland</p>
  <iframe id='map' src='https://www.google.com/maps?q=dublin&output=embed' frameborder='0' allowfullscreen></iframe>
</div>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>