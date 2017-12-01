<?php 
header("Content-Type: text/html; charset=utf-8");
  include("connMysql.php");
  $sql_query = "SELECT * FROM `activity`";
  $result = mysql_query($sql_query);
  $result1 = mysql_query($sql_query);
  date_default_timezone_set('Asia/Taipei');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Neighborhood Map</title>

    <!-- Custom styles -->
    <link rel="stylesheet"  href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	h5{
    		font-size: 25px;
    		text-align: center;
    	}
    </style>
</head>

<body>
<img src="images/progress.svg" class="p-bar">
<div class="container-main">
    <!-- ************************ Show/hide side panel button ************************* -->
    <nav>
        <a class="menu-button" href="#" data-bind="click: switchIt">
            <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
        </a>
    </nav>

    <!-- ***************************** Side panel ************************************* -->
    <aside>
        <div class="container-list" id="container-list" data-bind="visible: switchPanel">
            <header>
                <div class="title"><?php echo $_GET["choose"]; ?></div>
            </header>
            <input type="text" id="textInput" data-bind="value: filterText, valueUpdate: 'keyup'"
                   class="form-control input-text" placeholder="search...">

            <section>
                <div class="list-group" id="list_places" data-bind="foreach: places">
                    <a href="#" class="list-group-item" data-bind="click: $parent.setActive($index()), visible: $parent.showItem(name),
                           attr: {id: name},
                           style: {backgroundColor: ($parent.activeItem() == $index())?'#d9534f':'#ffffff',
                           color: ($parent.activeItem() == $index())?'#ffffff':'#000000'}">
                        <span data-bind="text: name" width="50px"></span>

                    </a>
                </div>
            </section>
        </div>
    </aside>
    <!-- ******************************* Map holder ********************************* -->
    <div id="map"></div>

    <!-- ************************ Attribution Message label ************************************** -->

</div>
</body>

<!-- ***************Scripts needed to provide functionality ************************ -->
<script src='js/knockout-3.4.2.js'></script>
<script>
	/**
 * Created by igorgrabarski on 2017-04-01.
 * @description Main ViewModel function. Define your locations here.
 */
function AppViewModel() {
    var self = this;

    // Active item id
    self.activeItem = ko.observable(0);

    // Text in the filter textbox
    self.filterText = ko.observable('');

    //Side panel state property
    self.switchPanel = ko.observable(true);

    //Side panel switch function
    self.switchIt = function () {
        self.switchPanel(!self.switchPanel());
    };

    // Message shown to the client
    self.attrMessage = ko.observable("This website uses data from " +
        "<a href='https://en.wikipedia.org'>Wikipedia</a> and " +
        "<a href='https://google.com'> Google</a>.");


    self.filterMarkers = function () {
        for(var m in markers){
            if((markers[m].title.toLowerCase()).indexOf((self.filterText().toLowerCase())) !== -1){
                markers[m].setVisible(true);
            }
            else {
                markers[m].setVisible(false);
            }
        }
    };


    /**************************** List of locations *******************************/
    self.places = ko.observableArray([
    <?php  $nowdate=time()+60*60*24;

    	 while($row_result=mysql_fetch_assoc($result))
            {
                $mydate=strtotime($row_result["final-time"])+60*60*24;
             if($nowdate<$mydate&&$row_result["activity_category"]==$_GET["choose"]){
     ?>
     {	name: "<?php echo $row_result["activity_title"]; ?>",
        position: {
            lat: <?php echo $row_result["latitude"]; ?>,
            lng: <?php echo $row_result["longitude"]; ?>
        }},
     <?php }} ?>
    ]);


    /************* Determines the active item on the list *************/
    /**
     * @description Determines the active item on the list
     */
    self.setActive = function(itemIndex) {

        self.activeItem(itemIndex);

        for (var k = 0; k < markers.length; k++) {
            if (k === itemIndex) {
                self.createInfoWindow(markers[k], infoWindow);
            }
        }


    };


    /************* Returns boolean value indicating whether to show the item *************/
    /**
     * @description Returns boolean value indicating whether to show the item
     * @returns {boolean} Returns true if current location title contains the text of filter textbox
     */
    self.showItem = function(nm) {

        return nm.toLowerCase().indexOf(self.filterText().toLowerCase()) !== -1;
    };


    /************* Populates the marker's info window with data *************/
    /**
     * @description Populates the marker's info window with data
     */
    self.createInfoWindow = function(marker, infowindow) {

        for (var m = 0; m < markers.length; m++) {
            markers[m].setAnimation(null);
        }

        self.activeItem(marker.id);
        map.setCenter(marker.getPosition());


        if (infowindow.marker !== marker) {
            infowindow.marker = marker;

            marker.setAnimation(google.maps.Animation.BOUNCE);

            var wikiUrl = "http://en.wikipedia.org/w/api.php?action=opensearch&search=" +
                marker.title.replace(/ /g, '%20') + "&format=json&callback=wikiCallback";


            var result = "";
            /************* Retrieves data from Wikipedia *************/
            $.ajax({
                url: wikiUrl,
                dataType: "jsonp",
                success: function(response) {

                    result = "<h5>" + marker.title + "</h5><hr>";

                    /************* Url for image in marker's info window ********/
                    var imageUrl = "https://maps.googleapis.com/maps/api/streetview?" +
                        "size=100x100&location=" + appModel.places()[marker.id].position.lat + "," +
                        appModel.places()[marker.id].position.lng + "&fov=90&heading=235&pitch=10&" +
                        "key=AIzaSyA21z6K4pzpx20TIC249ZWK0VCxGri0DVA";

                    /************* Url for full article on Wikipedia *************/
                    var linkUrl = "https://maps.googleapis.com/maps/api/streetview?" +
                        "size=600x600&location=" + appModel.places()[marker.id].position.lat + "," +
                        appModel.places()[marker.id].position.lng + "&fov=90&heading=235&pitch=10&" +
                        "key=AIzaSyA21z6K4pzpx20TIC249ZWK0VCxGri0DVA";

                    var mid = <?php echo $_GET["mid"]; ?>;
                     var linkUrl1 = "activity-platform.php?" +
                        "lat=" + appModel.places()[marker.id].position.lat + "&lng=" +
                        appModel.places()[marker.id].position.lng+ "&mid=" + mid;
                           
                    /****** Result code to be inserted into the marker's info window *****/
                   var lat1=appModel.places()[marker.id].position.lat;
                   var lng=appModel.places()[marker.id].position.lng;
                   

                    if(response[2][0] === 'undefined' || response[2][0] === ''){
                        response[2][0] = 'No data available';
                    }

                    if(response[3][0] === 'undefined' || response[3][0] === ''){
                        response[3][0] = 'No data available';
                    }

                    result += "<a href='" + linkUrl + "'><img class='info-window-image' src='" +
                        imageUrl +
                        "' /></a><br/><br/><iframe  src='http://localhost/activity/map-data.php?lat="+lat1+"&lng="+lng+"' width='100%' height='100%'  frameborder='0'></iframe><br/><a href='"+linkUrl1+"'>'論壇'</a><iframe  src='http://localhost/activity/map-confirm.php?lat="+lat1+"&lng="+lng+"&mid="+mid+"' width='100%' height='100%'  frameborder='0'></iframe>";

                    infowindow.setContent(result);
                    infowindow.open(map, marker);

                    /******* Hide the marker after click on X icon in info window **********/
                    infowindow.addListener('closeclick', function() {
                        infowindow.marker=null;
                    });


                }
            })
                .fail(function () {
                    alert("Failed to load data.Please check your connection and reload your page.");
                });

        }
    };



}


</script>
<script src="js/scripts.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA21z6K4pzpx20TIC249ZWK0VCxGri0DVA&callback=initMap"
        onerror="googleError()">
</script>

</html >