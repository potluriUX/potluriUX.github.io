
<html>
   
    <body><div class="filter_content"><div  id="contentform">
        <?= form_open('concept/insert'); ?>
        <div id="main">

            Title
            <br>
            <input type="text" name="title" size="50">
            <?php echo form_error('title'); ?><br />

            <br>
            Requester<br>
            <input type="text" name="requester_id" SIZE="50" value="1">


        </div>
        <br>
        <div id="col_div">
            Executive Summary
            <br>

            <textarea name="exec_summary" rows="4" cols="40">

            </textarea>
        </div>
        <div id="h_spacer"></div>
        <div id="col_div">
            Primary Justification

                    <table  cellpadding="5" cellspacing="0" style="border: 1px solid #999999">

  <?php
  $i=0;
  if($queryjustifications->num_rows()>0)
          foreach($queryjustifications->result() as $row)

           {
                if($i%2==0)
                {
                  echo "<tr>";

                 }
                  echo  '<td>' . $row->statement . '</td><td><input type="radio" name="justification" value="'.$row->statement.'"></td> ';
                if($i%2==1)
                 {
                  echo "</tr>";

                 }
           $i++; }?>
                    </table>
        </div>
        <br>

        <div id="v_spacer"></div><br><br><br>
        <div id="col_div">
            Company Initiative(select from the list below or add new initiative
            <br>
            <select name="initiative">
                <option value="geo_expansion">Geo Expansion</option>
                <option value="iphone">Iphone</option>
                <option value="call_centers">Call Centers</option>
                <option value="supply_chain">Supply Chain</option>
                <option value="sales_infrastructure">Sales Infrastructure</option>
                <option value="supply_chain">Supply Chain</option>
            </select>

            <br>
            Problem/Opportunity Statement<br>
            <input type="text" NAME="opportunity" SIZE="40">

            <br>
            Proposal Description<br>
            <textarea name="proposal"rows="20" cols="40">

            </textarea>
            <br>

            High Level Scope<br>
            <textarea name="scope" rows="11" cols="40">

            </textarea>
        </div>
        <div id="h_spacer"></div>
        <div style="float: left; width:400px;">
            <div id="col_div">
                Overview of Business Benefits<br>
                Quantifiable<br>  <textarea name="quantifiable"rows="10" cols="40">

                </textarea>
                <br>
                Non Quantifiable<br>
                <textarea name ="nonquantifiable" rows="10" cols="40">

                </textarea><br>

            </div></div>           <div style="float: left; width:400px;"><div style="width:'20px';height:10px;">
            </div>
           
            <div style="float: left; width:460px;"> <div id="h_spacer"></div>
            <span style ="float:left;width:210px; ">

                <table border="1" border-style="solid" cellpadding="5" cellspacing="0">
                    <tr><td>



                        </td><td>

                            1yr

                        </td><td>

                            3yr

                        </td></tr>
                    <tr><td>

                            Revenue($M)

                        </td><td height="40">
                            <input class="1txt" type="text" size="3" name="mtxt"/>


                        </td><td height="40">

                            <input class="3txt" type="text" size="3" name="3txt"/>

                        </td></tr>

                    <tr><td>
                            Gross Margin($M)


                        </td><td height="40">
                            <input class="1txt" type="text" size="3" name="mtxt"/>


                        </td><td height="40">

                            <input class="3txt" type="text" size="3" name="3txt"/>

                        </td></tr>


                    <tr><td>
                            Cost Reduction($M)


                        </td><td height="40">
                            <input class="1txt" type="text" size="3" name="mtxt"/>


                        </td><td height="40">

                            <input class="3txt" type="text" size="3" name="3txt"/>

                        </td></tr>
                    <tr><td>
                            Total Sum


                        </td><td name="oneyr_revenue" id='1yr_sum' height="40">



                        </td><td  id ="3yr_sum" height="40">



                        </td></tr>

                </table>
            </span>


            <span style="float:right;">

                <table border="1" cellpadding="5" cellspacing="0" width:225px>
                    <tr><td>

                            Regions Benefitting

                        </td><td></td></tr>
<?php if($queryregions->num_rows()>0)
        foreach($queryregions->result() as $row)
            echo '<tr><td>' . $row->name . '</td><td height=40><input type="checkbox" name="region[]" value="'.$row->id.'" /></td></tr> ';

?>


                       
                  
                </table>
            </span>
            </div>
        </div>
        <input  type="hidden"name="oneyr_revenue" id="1yr_hidden_sum">
        <input type="hidden" name="threeyr_revenue" id="3yr_hidden_sum">
        <div id="v_spacer"></div><br><br><br>
        <div id="col_div"><input type="submit" value="Submit"/></div>

    </form>
    </div>
    </div>
</body>
</html>
<script src="../../assets/js/jquery.js"></script>
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