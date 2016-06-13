<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>iPhone CSI</title>
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css" type="text/css" media="all" title="no title" charset="utf-8">

            <div class="header">
                <div class="banner">
                    <div class="banner_left" style="float: left;">
                        <a href="#" onclick="window.location.href=''; return false;"><?= $heading ?></a>
                    </div>

                </div>

                <div class="toolbar" style="position: relative;">
                    <div id="reports_toolbar">

                        <a class='export_button' href='#' style="position: absolute; top: 6px; right: 30px; height: 20px; width: 20px;">

                        </a>
                        <a href='help.php' style="position: absolute; top: 6px; right: 5px; height: 20px; width: 20px;">
                            <img src="images/help.png" style="height: 20px; width: 20px;"/>
                        </a>
                    </div>
                </div>
                <style>

                    #contentform { width:1000px;  margin: 0 auto; font-family: arial, verdana, sans-serif; }

                    #v_spacer{float: left;height:10px; width:900px;}

                    #h_spacer{float: left;height:10px; width:10px;}

                    #col_div{float: left; padding:3px; width:450px;border-style:solid;}

                    #main{width:915px;border-style:solid;padding:3px;font-family: arial, verdana, sans-serif;}
                </style>

                <br><br>
                        <body><div class="filter_content"><div  id="contentform">                                                                                                                                                                                         Parent :
                                    <select name="country" class="country" size="10" multiple>
                                        <option selected="selected">--Select Country--</option>
                                        <?
                                        if ($query->num_rows() > 0

                                            )foreach ($query->result() as $row)
                                                echo '<option value=' . $row->id . '>' . $row->name . '</option>';
                                        ?>
                                    </select>
                                    City :
                                    <select name="city" class="city" multiple>
                                        <option selected="selected">--Select City--</option>
                                    </select>
                                    County :
                                    <select name="county" class="county" multiple>
                                        <option selected="selected">--Select City--</option>
                                    </select>
                                    </body>
                                    </html>
                                    <script  src="<?= base_url(); ?>assets/js/jquery.js"></script>
                                    <script>
                                        $(document).ready(function(){

                                            //iterate through each textboxes and add keyup
                                            //handler to trigger sum event
                                            $(".1txt").each(function() {

                                                $(this).keyup(function(){
                                                    calculateSum(1);
                                                });
                                            });
                                            $(".3txt").each(function() {

                                                $(this).keyup(function(){
                                                    calculateSum(3);
                                                });
                                            });

                                            var value = '';
                                            $(".country").change(function(){
                                                value = '';
                                                $('.country > option:selected').each(function() {
                                                    value = value + ',' + $(this).val();
                                                                                                                                                                                                                                 
                                                });
                                                $.ajax({
                                                    url: '<?php echo site_url('ajaxselect/findchildren'); ?>',
                                                    dataType: 'json',
                                                    type: 'POST',
                                                    data: "id="+value,
                                                    success: function(data){
                                                        if(data.response =='true'){
                                                            $(".city").html(data.message); //change alert to updated DOM somewhere
                                                            $(".county").html('');
                                                        }
                                                    },
                                                    error: function(){
                                                        alert('Something major failed');
                                                    }
                                                });
                                            });
                                                                                                                                                                                                                
                                            $(".city").change(function(){
                                                value = '';
                                                $('.city > option:selected').each(function() {
                                                    value = value + ',' + $(this).val();
                                                                                                                                                                                                                                 
                                                });
                                                $.ajax({
                                                    url: '<?php echo site_url('ajaxselect/findchildren2'); ?>',
                                                    dataType: 'json',
                                                    type: 'POST',
                                                    data: "id="+value,
                                                    success: function(data){
                                                        if(data.response =='true'){
                                                            $(".county").html(data.message); //change alert to updated DOM somewhere
                                                        }
                                                    },
                                                    error: function(){
                                                        alert('Something major failed');
                                                    }
                                                });
                                            });

                                        });

                                        function calculateSum(id) {

                                            var sum = 0;
                                            //iterate through each textboxes and add the values
                                            $("."+id+"txt").each(function() {

                                                //add only if the value is number
                                                if(!isNaN(this.value) && this.value.length!=0) {
                                                    sum += parseFloat(this.value);

                                                }

                                            });
                                            //.toFixed() method will roundoff the final sum to 2 decimal places
                                            $("#" + id + "yr_sum").html(sum.toFixed(2));
                                            $("input#" + id + "yr_hidden_sum").val(sum.toFixed(2));
                                        }
                                    </script>