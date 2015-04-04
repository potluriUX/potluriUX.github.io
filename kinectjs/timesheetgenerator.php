<?php include("header.php");
include("holidays.php");
error_reporting(E_ALL & ~E_NOTICE);
?>
<!-- Bootstrap -->  
    
<style>
    #containerr {
    
  height: 260px;
    padding: 20px;
    text-align: center;
    width: 500px;
  
}

#left {
    float:left;
    width:100px;
    height: 40px;
    background: #ff0000;
}

#center {
    display: inline-block;
    margin:0 auto;
    width:100px;
    height: 40px;
    background: #00ff00;
}

#right {
    float:right;
    width:100px;
    height: 40px;
    background: #0000ff;


.home_res_title {
    margin: 0 0 10px;
    text-align: center;
}
*::-moz-selection {
    background: none repeat scroll 0 0 #900;
    color: #ccc;
}
.home_res_icon_box {
    color: #2e3e4d;
    font-size: 100px;
    margin-bottom: 20px;
    text-align: center;
    transition: all 400ms ease-in-out 0s;
}

.box_inner {
    height: 200px;
}
.box_inner {
    float: left;
    padding: 30px 5px;
}
.home_res_title h3 {
    color: #2e3e4d;
    font-size: 18px;
    font-weight: 600;
    line-height: 20px;
}


p {
    font-size: 16px;
    font-weight: 400;
    line-height: 24px;
}
p {
    margin: 0 0 10px;
}
.box_inner {
    height: 200px;
}
.box_inner {
    float: left;
    padding: 30px 5px;
}
*::-moz-selection {
    background: none repeat scroll 0 0 #900;
    color: #ccc;
}
.home_res_wrapper a {
    color: #7f7f7f;
    text-align: center;
}
a {
    color: #900;
    cursor: pointer;
    font-weight: 400;
}
a {
    color: #08c;
}

body {
    color: #333;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 20px;
}


.row:after, .row:before {
    content: "";
    display: table;
    line-height: 0;
}
.row:after, .row:before {
    content: "";
    display: table;
    line-height: 0;
}
.row:after {
    clear: both;
}
.row:after, .row:before {
    content: "";
    display: table;
    line-height: 0;
}
.row:after {
    clear: both;
}
.row:after, .row:before {
    content: "";
    display: table;
    line-height: 0;
}
.row {
    margin-left: -30px;
}
.row {
    margin-left: -20px;
}
.home_res_wrapper a {
    border-bottom: 5px solid #fff;
    box-sizing: border-box;
    color: #7f7f7f;
    display: block;
    float: left;
    margin-bottom: 50px;
    text-align: center;
    transition: all 400ms ease-in-out 0s;
}
.span4 {
    width: 370px;
}
[class*="span"] {
    float: left;
    margin-left: 30px;
    min-height: 1px;
}
.span4 {
    width: 300px;
}
[class*="span"] {
    float: left;
    margin-left: 20px;
    min-height: 1px;
}
a {
    color: #900;
    cursor: pointer;
    font-weight: 400;
    text-decoration: none !important;
    transition: all 400ms ease-in-out 0s;
}
a {
    color: #08c;
    text-decoration: none;
}
.home_res_wrapper a:hover {
    background-color: rgba(250, 250, 250, 0.6);
    border-bottom: 5px solid #2e3e4d;
    box-shadow: 0 1px 10px rgba(204, 204, 204, 0.1) inset;
    color: #2e3e4d;
}
.home_res_wrapper a:hover h3 {
    color: #900;
}
</style>
    </style>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<div id="content">

    <section id="pricing-intro">
        <div class="inner">
            <html>
                <head>
                    <title>Online PHP Script Execution</title>
                </head>
                <body>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- thunderify -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3730266544385182"
     data-ad-slot="4599097999"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    <h1> Timesheet Generator</h1>
                    <?php
                    $holidays = new US_Federal_Holidays(date('Y'));
//echo "<table border=\"1\">";
                    foreach ($holidays->get_list() as $holiday) {

                        $holidays_array[] = date("Y/m/d", $holiday["timestamp"]);
                    }
//$holidays_array[] = '2014/08/06';
//print_r($holidays_array);
                  //  echo "Today (" . date("Y/m/d") . ") is " . ($holidays->is_holiday(time()) ? "" : "not ") . "a holiday.";

                    $day = new days();

                    $day->noofdays($holidays_array);
                    
                    ?>
                <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=115928078419123&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-share-button" data-href="http://www.thunderify.com"></div>

                </body>
            </html>

            <?php

            class days {

                public function noofdays($holiday_list) {


                    if (date('l') != 'Monday')
                        $start_week = strtotime('-2  Monday');
                    else
                        $start_week = strtotime('last monday midnight');

                    $end_week = strtotime("+4 days", $start_week);
                    $week_dates[] = $start_week = date("Y/m/d", $start_week);
                    for ($i = 1; $i <= 4; $i++) {
                        $week_dates[] = date('Y/m/d', strtotime($start_week . ' +' . $i . ' day'));
                    }
//                                $start_week = date("Y/m/d", $start_week);
//                                $end_week = date("Y/m/d", $end_week);
//
//                                $start_week_plus_one = date('Y/m/d', strtotime($start_week . ' + 1 day'));
//                                $start_week_plus_two = date('Y/m/d', strtotime($start_week . ' + 2 days'));
//                                $start_week_plus_three = date('Y/m/d', strtotime($start_week . ' + 3 days'));
//                                echo $start_week;
                    echo "<form action='Template.php' method='post'>";

                    echo "<table border = 1 >
		 <tr>
		<th>Last <br>Week </th>	";
                    $i = 1;
                    foreach ($week_dates as $week) {


                        echo "<td > <input type='hidden' name='d" . $i . "' value ='$week'> $week </td>";
                        $i++;
                    }
//		<td ><input type='hidden' name='d1' value ='$start_week'> $start_week </td>
//                <td> <input type='hidden' name='d2' value ='$start_week_plus_one'> $start_week_plus_one  </td>
//                <td> <input type='hidden' name='d3' value ='$start_week_plus_two'> $start_week_plus_two </td>
//                <td><input type='hidden' name='d4' value ='$start_week_plus_three'>  $start_week_plus_three </td>
//                <td> <input type='hidden' name='d5'value ='$end_week'> $end_week </td>
                    echo "</tr>";

                    echo "<tr>";
                    echo "<th> Hours</th>";
                    // if satrtweeek is in holiday array than dont show 9-5
                    //
            $i = 1;
                    $j = 0;
                    foreach ($week_dates as $week) {
                        //if the date in $week matches the date in $holiday_array
                        if (in_array($week, $holiday_list))
                            echo "<td><input type = 'text' size = 9 value='' name='h" . $i . "'></td>";
                        else
                            echo "<td><input type = 'text' size = 9 value='9-5' name='h" . $i . "'></td>";
                        $i++;
                        $j++;
                    }
//            echo "<td><input type = 'text' size = 9 value=9-5 name='h1'></td>";
//          
//            echo "<td><input type = 'text' size = 9 value=9-5 name ='h2'></td>";
//            echo "<td><input type = 'text' size = 9 value=9-5 name ='h3'></td>";
//            echo "<td><input type = 'text' size = 9 value=9-5 name ='h4'></td>";
//            echo "<td><input type = 'text' size = 9 value=9-5 name ='h5'></td>";
                    echo "</table><br>Check one template. Click on thumbnails to see them before choosing";
                    echo "<div id='containerr'>";
                    echo '<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3730266544385182"
     data-ad-slot="4599097999"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';
                    echo "<div id='left'>";
                    echo "<input type='radio' name='template' value='ccstimesheet2.docx' checked>"
                    . "<a class='vimeo' href='./img/template2.png'> <img src='./img/template2.png' width='100' height='125'></a><br>";
                    echo "</div>";
                    echo "<div id='center'>";
                    echo "<input type='radio' name='template' value='ccstimesheet4.docx'>"
                    . "<a class='vimeo' href='./img/template3.png'> <img src='./img/template3.png' width='100' height='125'></a><br>";
                    
                    echo "</div>";
                    echo "<div id='right'>";
                    echo "<input type='radio' name='template' value='ccstimesheet.docx' >"
                    . "<a class='vimeo' href='./img/template1.png'> <img src='./img/template1.png' width='100' height='125'> </a><br>";
                    
                    echo "</div>";
                    echo "</div><table>";
                     //yourname=Firstname Lastname&mgrname=Manager Name&clientname=Client Name LLC&companyname=Vendor LLC          
                    $yourname = ($_GET['yourname'])?$_GET['yourname']:'';
                   
                    $mgrname = ($_GET['mgrname'])?$_GET['mgrname']:'';
                    $clientname= ($_GET['clientname'])?$_GET['clientname']:'';
                    $companyname = ($_GET['companyname'])?$_GET['companyname']:'';
                    




                    echo "<tr><td>Your Name: <input  id = 'yourname'type='text' name='yourname' value='".$yourname . "'></td>";
          
                      
                    
                    
                    echo "<td>Manager Name: <input id='mgrname' type='text' name='managername' value='".$mgrname . "'></td></tr>";
                       echo "<tr><td>Client Name: <input  id='clientname'type='text' name='clientname' value='".$clientname . "'></td>";
                       echo "<td>Company Name: <input id='companyname' type='text' name='companyname' value='".$companyname . "'></td></tr></table>";
                       


                    echo "<br><input class='button button-large button-green' type='submit' id='submit' name='submit' value='Submit'></br></br>";
             
                 echo "<a id='testdiv'  target = '_blank' href='#'>Use this link or Boomark it! so you dont have to type all four fields next time</a>";
//                   echo "<button type='button' class='btn btn-default btn-lg>
//  <span class='glyphicon glyphicon-share'></span> Share
//</button>";
                    }
                     

//        echo date('l');
//        echo $start_week . "</br>";
//                                echo $start_week_plus_one . "</br>";
//                                echo $start_week_plus_two . "</br>";
//                                echo $start_week_plus_three . "</br>";
////echo $start_week_plus_four. "</br>";
//                                echo $end_week . "</br>";
//                            }
            }
            
          
            ?>
            
        </div>
    </section>
    
</div>

<link rel="stylesheet" href="./colorbox-master/colorbox.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="./colorbox-master/jquery.colorbox.js"></script>

<script>
$(document).ready(function(){
    
    $(".vimeo").colorbox({iframe:true, innerWidth:600, innerHeight:600});
  $("#testdiv").hide();
});
yourname = $("#yourname").val();
$("#submit").click(function(){
    $(".navflyer").css({"background":"none repeat scroll 0 0 rgba(255, 255, 255, 0.15)"});
    //$("#testdiv").html("timesheetgenerator.php?yourname="+$("#yourname").val()+"&clientname="+$("#clientname").val()+"&managername="+$("#mgrname").val()+"&companyname="+$("#companyname").val());
$("#testdiv").show();
        $("#testdiv").attr("href", "timesheetgenerator.php?yourname="+$("#yourname").val()+"&clientname="+$("#clientname").val()+"&mgrname="+$("#mgrname").val()+"&companyname="+$("#companyname").val());
$("#testdiv").append("<br>"+"timesheetgenerator.php?yourname="+$("#yourname").val()+"&clientname="+$("#clientname").val()+"&managername="+$("#mgrname").val()+"&companyname="+$("#companyname").val());
    });
                 

                    $mgrname = ($_GET['mgrname'])?$_GET['mgrname']:'';
                    $clientname= ($_GET['clientname'])?$_GET['clientname']:'';
                    $companyname = ($_GET['companyname'])?$_GET['companyname']:'';
                    
    $(".vimeo").colorbox({iframe:true, innerWidth:600, innerHeight:600});
    
   // var yourname = <?php //echo json_encode($yourname);?>;//no need to enclose <? ?> in " for @spu
    <?php 
    if($_GET['yourname'] . $_GET['clientname'] . $_GET['companyname'] . $_GET['mgrname']){?>
        
    $(".navdemo").css({"background":"none repeat scroll 0 0 rgba(255, 255, 255, 0.15)"});
    <?php }else{?>
      
$(".navgen").css({"background":"none repeat scroll 0 0 rgba(255, 255, 255, 0.15)"});

    <?php }?>
    </script>

<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3730266544385182"
     data-ad-slot="4599097999"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


</body></html>