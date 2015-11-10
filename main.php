<!DOCTYPE html>
<html>
<head>
    <title>Weather Predictor</title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8 " />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.old.css" />
    <script src="js/jquery-2.1.1.min.js"></script>

    <!--For dummy data 
    <script src='response.si'></script>
    -->
    <style>
        html,
        body {
            background-image: url(images/The-Road-Ahead.png);
            background-position: center;
            background-size: cover;
            height: 100%;
        }
        
        .container {
            width: 100%;
            height: 88%;
            background-size: cover;
            background-position: center;
            padding-top: 30px;
        }
        .center {
            text-align: center;
        }
        
        .white {
            color: white;
        }
        
        /*.pad {
            padding-top: 20px;
        }*/
        
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
        
        #menu ul {
            margin: 0px;
            padding: 0px;
            list-style-type: none;
            padding-top: 25px;
            padding-left: 10px;
        }
        
        #menu li {
            list-style: none;
            float: left;
            margin-right: 0.5em;
        }
        
        #menu a {
            display: block;
            width: 8em;
            color: white;
            background-color: inherit;
            text-decoration: none;
            text-align: center;
        }
        
        #menu a:hover {
            background-color: #6666AA;
        }
        /*for alert shown below*/
        .alert {
            margin-top: 20px;
            width: 75%;
            margin-left: 120px;
            display: none;
        }
    </style>

    <style type="text/css">
        
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            border-color: #999;
            display: block;
        }
        
        .tg td {
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 10px 5px;
            border-style: solid;
            border-width: 0px;
            overflow: hidden;
            word-break: normal;
            border-color: #999;
            color: #444;
            background-color: #F7FDFA;
            border-top-width: 1px;
            border-bottom-width: 1px;
        }
        
        .tg th {
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            padding: 10px 5px;
            border-style: solid;
            border-width: 0px;
            overflow: hidden;
            word-break: normal;
            border-color: #999;
            color: #fff;
            background-color: #26ADE4;
            border-top-width: 1px;
            border-bottom-width: 1px;
        }
        
        .tg .tg-vn4c {
            background-color: #D2E4FC
        }
        
        .tg .tg-9vto {
            font-family: Verdana, Geneva, sans-serif !important;
        }
    </style>

    <!--Google APIs-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places">
    </script>

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
               // console.log(jsonStr);
                    data = "Current Weather is " + jsonStr.currently.summary 
                    + " Temprature is " + jsonStr.currently.temperature + " &#8451 " 
                    + "Humidity is " + jsonStr.currently.humidity 
                    + " and Wind Speed is " + jsonStr.currently.windSpeed + "m/s"
                    + "<br> Weekly summary of weather: "  + jsonStr.daily.summary
                    + "<br> For more details click " 
                    + "<a target = '_blank' href = 'details.html?lati=" + lati + "&longi=" + longi + "'>here</a>";

                    if (!jsonStr) {
                        $("#success").hide();
                        $("#fail").fadeIn();
                    }else {
                         $("#fail").hide();
                         $("#success").html(data);
                         $("#success").fadeIn();
                    }
            }); //get json closed
        	} //fetch weather closed

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>

<body>

    <!-- <h1 class="white center pad">Welcome to Weather Predictor</h1> -->
    <div id="menu" class="lead">
        <ul>
            <li><a href="home.php">Home</a></li>
            <?php
                @session_start();
		if (@$_SESSION["id"]=="") {
                    echo "<li><a href='registration.php'>Login/Register</a></li>";
                }else{
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }?>
            
            <li><a href="contactus.php" target="_blank">Contact Us</a></li>
        </ul>  
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md6 col-md-offset-3 center">
                <h1 class="center white">Weather Forecast</h1>
                <p class="lead center white pad">Enter your City To Find Weather</p>
                <div class="form-group lead">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Eg. London, Delhi, Paris">
                </div>
                <button class="btn btn-success btn-lg" id="getCords" onClick="codeAddress();">Find The Weather</button>

                <div id="success" class="alert alert-success">Success!</div>
                <div id="fail" class="alert alert-danger">Could not find weather. Please try again!
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        Copyright © WeatherPredictor.com
    </div>

</body>

</html>
