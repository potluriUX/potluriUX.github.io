<?php
include("header.php");
include("holidays.php")
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<div id="content">
<!--<div id="sub-title">
   <div id="sub-left">
      sub-left
   </div>
   <div id="sub-right">
      sub-right
   </div>
   <div class="clear-both"></div>
</div>-->
    <section id="pricing-intro">
        <div class="inner">

            <head>
                <title>US_Federal_Holidays</title>
            </head>
            <body>
                
                <?php
                $presentyr = date('Y');
                $holidays = new US_Federal_Holidays($presentyr);
                echo "<div id='sub-title'>";
                echo "<div id='sub-left'>";
                echo "<h1> Holidays In ".$presentyr ."</h1>";
                echo "<table border=\"1\">";
                echo "<table class='table table-striped'>";
                foreach ($holidays->get_list() as $holiday) {
                    echo "<tr>";
                    echo "<td>" . $holiday["name"] . "</td>";
                    echo "<td>" . date("Y/m/d", $holiday["timestamp"]) .  "  -  "  .date('l', $holiday["timestamp"])."</td>";
                    echo "</tr>";
                }
                echo "<tr><td colspan='2' bgcolor='#ccc'>";
                echo "Today (" . date("Y/m/d") . ") is " . ($holidays->is_holiday(time()) ? "" : "not ") . "a holiday.";
                echo "</td></tr>";
                echo "</table>";
                echo "</div>";
                $nextyr = date('Y')+1;
                
                
                $holidays = new US_Federal_Holidays(date('Y')+1);
                echo "<div id='sub-right'>";
                echo "<h1> Holidays In ".$nextyr ."</h1>";
                echo "<table border=\"1\">";
                echo "<table class='table table-striped'>";
                foreach ($holidays->get_list() as $holiday) {
                    echo "<tr>";
                    echo "<td>" . $holiday["name"] . "</td>";
                    echo "<td>" . date("Y/m/d", $holiday["timestamp"]) .  "  -  "  .date('l', $holiday["timestamp"])."</td>";
                    echo "</tr>";
                }
                echo "<tr><td colspan='2' bgcolor='#ccc'>";
                echo "Today (" . date("Y/m/d") . ") is " . ($holidays->is_holiday(time()) ? "" : "not ") . "a holiday.";
                echo "</td></tr>";
                echo "</table>";
                echo "</div>";
                echo "</div>";
                ?>
            </body>
        </div>
    </section> </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(".navholidays").css({"background":"none repeat scroll 0 0 rgba(255, 255, 255, 0.15)"});
    </script>
    <style>
        #sub-left {
   float: left;
}
#sub-right {
   float: right;
}
.clear-both {
   clear: both;
}
</style>