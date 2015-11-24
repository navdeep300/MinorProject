<!DOCTYPE html>
<html>
<head>
<title>Manage Locations</title>
</head>
<?php
    require 'navigation.php';
    include "connection.php";
    @session_start();
     if (@$_SESSION['id']=="") {
        header("location:registration.php");
    }
?>

<script type="text/javascript">
    var lati = '';
    var longi = '';
    function initializeFill() {
        var address = (document.getElementById('location'));
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

    function fillLatLong() {
        geocoder = new google.maps.Geocoder();
        var address = document.getElementById("location").value;
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                lati = results[0].geometry.location.lat();
                longi = results[0].geometry.location.lng();
                document.getElementById('latlong').value = lati + "," + longi;
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initializeFill);
</script>

<style type="text/css">
/*table*/
.tg  {border-collapse:collapse;border-spacing:0;border-color:#bbb;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#bbb;color:#594F4F;background-color:#E0FFEB;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#bbb;color:#493F3F;background-color:#9DE0AD;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-ugh9{background-color:#C2FFD6}
.tg .tg-1jpx{background-color:#C2FFD6;font-family:Verdana, Geneva, sans-serif !important;}
</style>
<center>
<h1>Manage Locations</h1>
<br/>
<div class="addLocation" style="width:30%;">
	<form class=".form-group" method="get" action="add.php">
    <label for="location">Location</label>
    <input type="text" autocomplete="off" onchange="fillLatLong();" class="form-control" name="location" id="location" placeholder="Eg. London, Delhi, Paris" />
    <label for="units">Units</label>
    <select name="units" class="form-control">
    	<option>si</option>
    	<option>us</option>
    </select>
    <label for="latlong">Latitude &amp; Longitude</label>
    <input type="text" autocomplete="off" class="form-control" name="latlong" id="latlong" placeholder="Latitude Longitudes" required/>
	<br/>
    <center>
        <button class="btn btn-success btn-lg" id="getCords">Add Location</button> 
	</center>
    </form>
</div>
<br/>
<table class="tg">
<th class='tg-031e'>Name</th>
<th class='tg-031e'>Latitude &amp; Longitude</th>
<th class='tg-031e'>Units</th>
<th class='tg-031e'>Operations</th>

<?php 
echo "<center>";
echo $_SESSION['name'] . "  your locations are as follows <br/><br/>";
echo"<center>";
$uid = $_SESSION['id'];
$sql = "SELECT * FROM prefs WHERE uid = '$uid'";

$result =mysql_query($sql, $connection);
while($row=mysql_fetch_array($result))
{
    $id = $row['id'];
    echo "<tr>";    
    echo"<td class='tg-031e'>".$row['name']."</td>";
    echo"<td class='tg-031e'>".$row['latlong']."</td>";
    echo"<td class='tg-031e'>".$row['units']."</td>";
    //echo"<td class='tg-031e'><a href ='edit.php?id=$id'>Edit</a>"; 
    echo "<td class='tg-031e'><a href ='delete.php?id=$id'><center>Delete</center></a></td>";
    echo "</tr>";
}
?>      
</table>
</center>
</body>
</head>
</html>
