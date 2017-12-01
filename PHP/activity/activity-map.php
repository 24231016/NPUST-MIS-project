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
                <div class="title">Locations</div>
            </header>
            <input type="text" id="textInput" data-bind="value: filterText, valueUpdate: 'keyup'"
                   class="form-control input-text" placeholder="Filter by...">

            <section>
                <div class="list-group" id="list_places" data-bind="foreach: places">
                    <a href="#" class="list-group-item" data-bind="click: $parent.setActive($index()), visible: $parent.showItem(name),
                           attr: {id: name},
                           style: {backgroundColor: ($parent.activeItem() == $index())?'#d9534f':'#ffffff',
                           color: ($parent.activeItem() == $index())?'#ffffff':'#000000'}">
                        <span data-bind="text: name"></span>
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
<script src="js/viewmodel.js"></script>
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