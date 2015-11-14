<link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    /*for alert shown below*/
    .alert {
        margin-top: 20px;
        width: 75%;
        margin-left: 120px;
        display: none;
    }

    #footer {
            background-color: white;
            color: green;
            clear: both;
            text-align: center;
            padding: 5px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
</style>
<script src="js/jquery-2.1.1.min.js"></script>
<!--Google APIs-->
<!-- -->    
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<!-- -->
<!--utilization of G API-->

<script type="text/javascript">
    var lati = '';
    var longi = '';

    function initialize() {
        var address = (document.getElementById('search'));
        var autocomplete = new google.maps.places.Autocomplete(address);
        autocomplete.setTypes(['geocode']);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {

            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });
    }

    function codeAddress() {
        geocoder = new google.maps.Geocoder();
        var address = document.getElementById("search").value;
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                lati = results[0].geometry.location.lat();
                longi = results[0].geometry.location.lng();
                // alert("This");
                fetchWeather();
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }

    function fetchWeather() {
        var apiKey = 'ef83a8bd6e9af7fa4d7da0bbdd20fe9f';
        var url = 'https://api.forecast.io/forecast/';
        // var lati = 30.9100;
        // var longi = 75.8500;

        var jsonStr;

        $.getJSON(url + apiKey + "/" + lati + "," + longi + "?units=si&callback=?", function(jsonStr) {
            console.log(jsonStr);
                data = "Current Weather is " + jsonStr.currently.summary 
                + " Temprature is " + jsonStr.currently.temperature + " &#8451 " 
                + "Humidity is " + jsonStr.currently.humidity 
                + " and Wind Speed is " + jsonStr.currently.windSpeed
                + "<br> Weekly summary of weather: "  + jsonStr.daily.summary
                + "<br> For more details click " 
                + "<a target = '_blank' href = 'details.html?lati=" + lati + "&longi=" + longi + "'>here</a>";

                if (!jsonStr) {
                    alert("falied to fetch weather data!");
                }else {
                    $('#weatherData').html(data);
                    $('#weatherData').fadeIn();
                }
        }); //get json closed
     } //fetch weather closed

          google.maps.event.addDomListener(window, 'load', initialize);
</script>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Weather Predictor</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="contactus.php">Contact Us</a></li>
      </ul>
      <div class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" style="margin-left:250px;" name="search" class="form-control" id="search" placeholder="Eg. London, Delhi, Paris">
        </div>
        <button onclick="codeAddress();" class="btn btn-success">Search</button>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <?php 
            @session_start();
            if (@$_SESSION['id']=="") {
                echo "<li><a href='registration.php'>Login/Register</a></li>";
            }else{
                echo "<li><a href='view.php'>Manage Locations</a></li>";
                echo "<li><a href='logout.php'>Logout</a></li>";
            }
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id='weatherData' class='alert alert-success'></div>
