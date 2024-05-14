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

<div>  
<h1>Recently Added</h1>
           <div class="card-group">
                <div class="card">
                    <div class="card-top">
                        <img src="/assets/site.jpg" alt="map">
                    </div>
                    <hr>
                    <div class="card-info">
                        <h2>Kiltrogue, Claregalway, Turloughmore, Co. Galway</h2>
                        <h3>€ 40,000</h3>
                        <p>For sale a circa 0.5 acre site, situated at Kiltrogue, Claregalway (subject to planning permission). Just 15 mins. from Galway city, 10 mins from Athenry town and only 5 mins. away from Claregalway.</p>
                    </div>
                    <div class="card-action">
                        <button>More Details</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-top">
                        <img src="/assets/commercial.jpg" alt="map">
                    </div>
                    <hr>
                    <div class="card-info">
                        <h2>'But N Ben', Tullamore, Ballybunion, Co. Kerry, V31E934</h2>
                        <h3>€ 179,000</h3>
                        <p> The building is located on Arkle Road, with aspects onto Blackthorn Avenue.Restaurants, cafes, convenience stores are all within minutes' walk from the subject building. </p>
                    </div>
                    <div class="card-action">
                        <button>More Details</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-top">
                        <img src="/assets/house.png" alt="map">
                    </div>
                    <hr>
                    <div class="card-info">
                        <h2>Cedarhurst Building, Arkle Road, Sandyford, Dublin 18.</h2>
                        <strong><h3>€ 1.600,000</h3></strong>
                        <p>*Ballybunion Beach, Golf Club and Village a short distance away *Recently redecorated internally and externally including a new natural slate roof  *3 Bedrooms (2 ensuite) </p>
                    </div>
                    <div class="card-action">
                        <button>More Details</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-top">
                        <img src="/assets/site.jpg" alt="map">
                    </div>
                    <hr>
                    <div class="card-info">
                        <h2>Land & Sites For Sale in Republic of Ireland €50,000 Max</h2>
                        <h3>€ 50,000</h3>
                        <p>These agricultural lands at Ahanaglogh (4.18 acres approx.) have direct access via a slip road off the N25 at the Griffin's Garage junction on the L3209 road to Stradbally.Prime location lands on the N25 between Kilmacthomas and Lemybrien.
                        </p>
                    </div>
                    <div class="card-action">
                        <button>More Details</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-top">
                        <img src="/assets/house.png" alt="map">
                    </div>
                    <hr>
                    <div class="card-info">
                        <h2>Moneymore, Dunlewy, Co. Donegal, F92H560</h2>
                        <h3>€ 560,000</h3>
                        <p>This well appointed five bedroom property is situated on an delightfully well maintained site extending to approximately 0.7 acres with splendid views across Dunlewey lake and only a short walk from the famed Poisoned Glen.</p>
                    </div>
                    <div class="card-action">
                        <button>More Details</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-top">
                        <img src="/assets/commercial.jpg" alt="map">
                    </div>
                    <hr>
                    <div class="card-info">
                        <h2>Commercial & Residential Property, Ballintubber, Co. Mayo, F12TF22</h2>
                        <h3>€ 295,000</h3>
                        <p> Located along the main Castlebar to Ballinrobe road in the community of Ballintubber, this five bedroom residence comes to the market in very good condition throughout, with a commercial unit.</p>
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