<?php include("header.php");?>
<style>
select {
  font-size: 32px;
}

#hours{
    font-size:32px;
}
#payroll{
   width:800px; 
   margin:0 auto;
   padding : 70px 10px;
   
}
#holidays{
    font-size:10px;
}
 .landing-button {
    background: url("https://www.getharvest.com/assets/landing_pages/landing-action-72086ee3e591b10681953ae0ea5bcc68.gif") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    display: block;
    height: 59px;
    text-indent: -5000px;
    width: 220px;
     cursor:pointer;
}
.navhours  {
    background: none repeat scroll 0 0 rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(0, 0, 0, 0);
    color: rgb(255, 255, 255);
    display: inline-block;
    font-size: 16px;
    line-height: 1;
    padding: 22px 16px;
    text-decoration: none !important;
    transition: background 0.1s linear 0s, opacity 0.1s linear 0s;
}
</style>
<!--!--<script src="timesheetgene.php"></script> -->
    <div id="content">

        <section id="pricing-intro">
            <div class="inner">

                <html>
                    <head>
                        <title>Online PHP Script Execution</title>
                    </head>
                    <body>
                        
                        <h1>
                            
                            Month Payroll Hours Calculator
                        </h1>

              

                        <?php
                        $obj = new Spoo();

                        class Spoo {

                            public function date_dropdown($year_limit = 0) {
                                

                                $html_output = '    <div id="date_select" >' . "\n";

                                $html_output .= '        <label for="date_day">Month&Year:</label>' . "\n";



                                $html_output .= '           <select name="date_month" id="month_select" >' . "\n";

                                $months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

                                for ($month = 1; $month <= 12; $month++) {
                                       if(date('m') == $month){
                                           $html_output .= '               <option selected ="selected"value="' . $month . '">' . $months[$month] . '</option>' . "\n";
                                       }else
                                    $html_output .= '               <option value="' . $month . '">' . $months[$month] . '</option>' . "\n";
                                }

                                $html_output .= '           </select>' . "\n";



                                /* years */
                                $html_output .= '           <select name="date_year" id="year_select">' . "\n";

                                for ($year = (date("Y")); $year >=(date("Y")-5) ; $year--) {

                                    $html_output .= '               <option>' . $year . '</option>' . "\n";
                                }

                                $html_output .= '           </select>' . "\n";



                                $html_output .= '   </div>' . "\n";



                                return $html_output;
                            }

                            

                        }
                        ?>
                        
                <html>
                    <form action="" id='myform' method="post" >


                        <!--
                        <label for="name">Name:</label>
                        
                        <input type="text" name="name" />-->

<?php
//echo date_dropdown();
//or limit by age requirement

echo $obj->date_dropdown(18);
//echo end_dropdown(18);
?> 
                        <div id='payroll'>Payroll Hours in the month you choose:<span id ='hours'>?</span></div>

                        <button class='button button-large button-green' type="button" id="date">Calculate hours</button> 
                        
                        <div id='holidays'></div>
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- thunderify -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3730266544385182"
     data-ad-slot="4599097999"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                        
                    </form>
                   
                    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script>
                        $(".navhours").css({"background":"none repeat scroll 0 0 rgba(255, 255, 255, 0.15)"});
                    $('#date').click(function(e) {
                        e.preventDefault();
                        $.ajax({
                            type: 'POST',
                            url: 'datetime.php?f=calculateWorkingHoursinMonth',
                            data: $('#myform').serializeArray(),
                            success: function(data) {
                               // alert('form was submitted');
                               var output = $.parseJSON(data);
                               //console.log(output);
                                $('#hours').html(output[0]);
                                $("#holidays").html('*'+(output[1])?output[1]:'N/A' + ' is holiday and those hours were subtracted');
                            }
                        });
                    })
                    </script>

            </div>
        </section>



    </div>
    



    



    