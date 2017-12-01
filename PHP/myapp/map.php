<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
$sql_query = "SELECT * FROM `myguests`";
  $result= mysql_query($sql_query);

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
        }
        table{
        	text-align: center;
        	width: 100%;
        	height: 100%;
        }
    </style>
</head>
<body>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTR0cFtZIpr59uyUQrS9u1jm5p8VtFsUg&callback=initMap"></script>
<script type="text/javascript">
    var markers = [
    <?php  while($row_result=mysql_fetch_assoc($result)){ ?>
    {
        "title": '<?php echo  $row_result["firstname"]; ?>',
        "lat": '<?php echo $row_result["x"]; ?>',
        "lng": '<?php echo $row_result["y"]; ?>',
        "description": '<?php echo $row_result["active_title"]; ?>'
    },
    <?php } ?>
    ];
    window.onload = function () {
        LoadMap();
    }
    function LoadMap() {
        var mapOptions = {
            center: new google.maps.LatLng(22.646749, 120.609092),
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

        //Create and open InfoWindow.
        var infoWindow = new google.maps.InfoWindow();

        for (var i = 0; i < markers.length; i++) {
            var data = markers[i];
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });

            //Attach click event to the marker.
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                    infoWindow.setContent("<div style = 'width:200px;min-height:40px'>" + data.description + "</div>");
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
    }
</script>
<div id="dvMap" style="width: 100%; height: 100%">
</div>
</body>
</html>
