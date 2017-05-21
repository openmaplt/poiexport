<?php
session_start();
include 'include/functions.php';

//Initialize localization
i18n();
textdomain('default');

?><!DOCTYPE html>
<html>
    <head>
        <title><? echo _('OpenStreetMap POI Export');?> - <? echo _('download free point of interest'); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="<? echo _('OpenStreetMap POI Export'); ?>" />
        <meta name="Keywords" content="openstreetmap,poi,waypoint,export,free,tomtom,garmin,google earth,oziexplorer,ov2,csv,gpx,wpt" />
        <meta name="robots" content="index, follow" />
        <meta http-equiv="Content-Language" content="<? echo Locale::getDefault(); ?>" />
        <link rel="shortcut icon" href="favicon.ico" />
        <link type="text/css" href="style.css" rel="stylesheet" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="ui.js"></script>
    </head>
    <body>
        <div class="wizardwrapper">
            <div class="wizardpanel 1">
                <ul class="mainNav threeStep">
                    <li class="current"><a title=""><em><? echo _('Step 1: POI type'); ?></em><span><? echo _('Select the POI type') ?></span></a></li>
                    <li><a title=""><em><? echo _('Step 2: Device'); ?></em><span><? echo _('Select the device or file type you want to download to'); ?></span></a></li>
                    <li class="mainNavNoBg"><a title=""><em><? echo _('Step 3: Download'); ?></em><span><? echo _('Download POI file'); ?></span></a></li>
                </ul>
                <div class="wizardcontent">
                    <img src="images/pushpin.png" alt="" />
                    <div class="explanation"><? echo _('Select the type of POI you would like to download. Currently only one type can be selected.') ?></div>
                    <select name="select" multiple size="10" id="poitype" onDblclick="UpdateButtons(1);LoadNextPage(1,2);" onchange="UpdateButtons(1)">
                        <option value="amenity:fuel"><? echo _('Fuel'); ?></option>
                        <option value="amenity:atm"><? echo _('ATM'); ?></option>
                        <option value="highway:speed_camera"><? echo _('Speed camera'); ?></option>
                        <option value="highway:bus_stop"><? echo _('Bus stop'); ?></option>
                        <option value="amenity:parking"><? echo _('Parking'); ?></option>
                        <option value="amenity:bicycle_parking"><? echo _('Bicycle parking'); ?></option>
                        <option value="amenity:place_of_worship"><? echo _('Place of worship'); ?></option>
                        <option value="amenity:hospital"><? echo _('Hospital'); ?></option>
                        <option value="shop:supermarket"><? echo _('Supermarket'); ?></option>
                        <option value="amenity:theatre"><? echo _('Theatre'); ?></option>
                        <option value="amenity:police"><? echo _('Police'); ?></option>
                        <option value="amenity:fire_station"><? echo _('Fire station'); ?></option>
                        <option value="amenity:post_box"><? echo _('Post box'); ?></option>
                        <option value="amenity:post_office"><? echo _('Post office'); ?></option>
                        <option value="amenity:recycling"><? echo _('Recycling'); ?></option>
                        <option value="amenity:restaurant"><? echo _('Restaurant'); ?></option>
                        <option value="amenity:fast_food"><? echo _('Fast food'); ?></option>
                        <option value="amenity:toilets"><? echo _('Toilets'); ?></option>
                        <option value="amenity:pub"><? echo _('Pub'); ?></option>
                        <option value="amenity:waste_basket"><? echo _('Waste basket'); ?></option>
                        <option value="barrier:cattle_grid"><? echo _('Cattle grid'); ?></option>
                        <option value="tourism:camp_site"><? echo _('Camp site'); ?></option>
                        <option value="tourism:hotel"><? echo _('Hotel'); ?></option>
                        <option value="tourism:museum"><? echo _('Museum'); ?></option>
                        <option value="tourism:zoo"><? echo _('Zoo'); ?></option>
                        <option value="historic:castle"><? echo _('Castle'); ?></option>
                        <option value="man_made:windmill"><? echo _('Windmill'); ?></option>
                        <option value="man_made:lighthouse"><? echo _('Lighthouse'); ?></option>
                        <option value="man_made:watermill"><? echo _('Watermill'); ?></option>
                        <option value="man_made:water_tower"><? echo _('Water tower'); ?></option>
                        <option value="amenity:nightclub"><? echo _('Nightclub'); ?></option>
                        <option value="amenity:stripclub"><? echo _('Stripclub'); ?></option>
                    </select>
                </div>
                <div class="buttons">
                    <button type="submit" id="next1" class="next" disabled="disabled" onclick="LoadNextPage(1,2);"><? echo _('Next'); ?>&nbsp;&gt;&gt;</button>
                </div>
                <div style="clear:both"></div>
            </div>

            <div class="wizardpanel 2">
                <ul class="mainNav threeStep">
                    <li class="lastDone"><a href="#" title="" onclick="LoadNextPage(2,1);"><em><? echo _('Step 1: POI type'); ?></em><span><? echo _('Select the POI type') ?></span></a></li>
                    <li class="current"><a title=""><em><? echo _('Step 2: Device'); ?></em><span><? echo _('Select the device or file type you want to download to'); ?></span></a></li>
                    <li class="mainNavNoBg"><a title=""><em><? echo _('Step 3: Download'); ?></em><span><? echo _('Download POI file'); ?></span></a></li>
                </ul>
                <div class="wizardcontent">
                    <img src="images/device.png" alt="" />
                    <div class="explanation"><? echo _('Select the device or file type you want to download the POI in'); ?></div>
                    <select id="navitype" size="10"  onDblclick="UpdateButtons(2);LoadNextPage(2,3);" onchange="UpdateButtons(2)">
                        <option value="ov2"><? echo _('TomTom overlay (ov2)'); ?></option>
                        <option value="csv"><? echo _('Garmin (csv)'); ?></option>
                        <option value="gpx"><? echo _('GPS Exchange format (gpx)'); ?></option>
                        <option value="kml"><? echo _('Google Earth (kml)'); ?></option>
						<option value="wpt"><? echo _('OziExplorer (wpt)'); ?></option>
						<option value="geojson"><? echo _('GeoJSON (geojson)'); ?></option>
                    </select>
                </div>
                <div class="buttons">
                    <button type="submit" id="back2" class="previous" onclick="LoadNextPage(2,1);">&lt;&lt;&nbsp;<? echo _('Previous'); ?></button>
                    <button type="submit" id="next2" class="next" disabled="disabled" onclick="LoadNextPage(2,3);"><? echo _('Next'); ?>&nbsp;&gt;&gt;</button>
                </div>
                <div style="clear:both"></div>
            </div>


            <div class="wizardpanel 3">
                <ul class="mainNav threeStep">
                    <li class="done"><a href="#" title="" onclick="LoadNextPage(3,1);"><em><? echo _('Step 1: POI type'); ?></em><span><? echo _('Select the POI type') ?></span></a></li>
                    <li class="lastDone"><a href="#" onclick="LoadNextPage(3,2);" title=""><em><? echo _('Step 2: Select device'); ?></em><span><? echo _('Select the device or file type you want to download to'); ?></span></a></li>
                    <li class="mainNavNoBg current"><a title=""><em><? echo _('Step 3: Download'); ?></em><span><? echo _('Download POI file'); ?></span></a></li>
                </ul>
                <div class="wizardcontent">
                    <img src="images/download.png" alt="" />
                    <div class="explanation"><? echo _('The file is ready for download.') ?></div>
                    <div id="action">
                        <p><? echo _('Poi type') ?> : - </p>
                        <p><? echo _('Device type') ?> : -</p>
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" id="back3" class="previous" onclick="LoadNextPage(3,2);">&lt;&lt;&nbsp;<? echo _('Previous'); ?></button>
                    <button type="submit" id="next3" class="next"  onclick="DownloadFile();"><? echo _('Download'); ?></button>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="footer"><? echo _('Poi Export'); ?> - <? echo VERSION; ?>&nbsp;
                <? echo _('data'); ?> <a href="http://www.openstreetmap.org/copyright">© OpenStreetMap contributors</a>&nbsp;
                <a href="http://www.openstreetmap.nl/"><? echo _('OpenStreetMap'); ?></a>&nbsp;<? echo _('community') ?>.&nbsp;-&nbsp;
                <? echo _('Created by'); ?>&nbsp;<a href="http://www.openstreetmap.org/user/rullzer">rullzer</a>&nbsp;<? echo _('and'); ?>&nbsp;<a href="http://www.openstreetmap.org/user/Rubke">rubke</a>
           </div>
        </div>
    </body>
</html>
