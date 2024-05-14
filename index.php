<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>My first HTML5 page</title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<body>
<div id="container">
<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
<main>

<div id="search-card">
  <h2>Find Your Property...</h2>
  <form action="properties.php" method="get" id="properties-search">
    <input type="search" name="search" required>
    <button type="submit">
      <i class="fa fa-search"></i>
    </button>
  </form>
</div>

<div class="content">
<h1>Recently Added</h1>
           <div class="card-group">
                <div class="card">
                    <div class="card-top">
                      <div class="category">Residencial</div>
                        <img src="images/house.png" alt="map">
                    </div>
                    
                    <div class="card-info">
                        <h2>Address: Kiltrogue, Claregalway, Turloughmore, Co. Galway</h2>
                        <h3>Price: € 40,000</h3>
                        <p>For sale a circa 0.5 acre site, situated at Kiltrogue, Claregalway (subject to planning permission). Just 15 mins. from Galway city, 10 mins from Athenry town and only 5 mins. away from Claregalway.</p>
                    </div>
                    <div class="card-action">
                        <button>More Details</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-top">
                    <div class="category">Commercial</div>
                        <img src="images/commercial.jpg" alt="map">
                    </div>
                    
                    <div class="card-info">
                        <h2>Address:'But N Ben', Tullamore, Ballybunion, Co. Kerry, V31E934</h2>
                        <h3>Price: € 179,000</h3>
                        <p> The building is located on Arkle Road, with aspects onto Blackthorn Avenue.Restaurants, cafes, convenience stores are all within minutes' walk from the subject building. </p>
                    </div>
                    <div class="card-action">
                        <button>More Details</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-top">
                    <div class="category">Sites</div>
                        <img src="images/Site.jpg" alt="map">
                    </div>
                    
                    <div class="card-info">
                        <h2>Address:Cedarhurst Building, Arkle Road, Sandyford, Dublin 18.</h2>
                        <strong><h3>Price: € 1.600,000</h3></strong>
                        <p>*Ballybunion Beach, Golf Club and Village a short distance away *Recently redecorated internally and externally including a new natural slate roof  *3 Bedrooms (2 ensuite) </p>
                    </div>
                    <div class="card-action">
                        <button>More Details</button>
                    </div>
                </div>
                
           </div> 
</div>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>