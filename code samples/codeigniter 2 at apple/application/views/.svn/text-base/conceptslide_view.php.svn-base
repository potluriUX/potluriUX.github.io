<?php

$quant_summary = '';
$nonquant_summary = '';
$paybackyrs = '';
$total_benefits = '';
$reason_no_quant_benefits = '';
if($initiatives->num_rows()>0)
          foreach($initiatives->result() as $row){

          $exec_summary =  $row->exec_summary;
          $proj_description =  $row->proj_description ;
          $scope = $row->scope;
          $initiative_number = $row->initiative_number;

          $rollover = $row->rollover;
		  $ultimate_gold_impact = $row->ultimate_gold_impact;
          $executive_sponsor = $row->executive_sponsor;
          $author = $row->author;
          $BPR_contact = $row->BPR_contact;
          $initiative = $row->initiative_name;
          $BHU = $row->BHU;
          $type = $row->type;
          $date_inserted = $row->date_inserted ;
          $date_edited = $row->date_edited;

          }

    if($businesscase->num_rows()>0)
          foreach($businesscase->result() as $row){

          	$quant_summary = $row->quant_summary ;
          	$nonquant_summary = $row->nonquant_summary;
          	$paybackyrs = $row->useful_life_yrs;
          	$total_benefits = $row->total_benefits;

          }
    ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/cpt.css" type="text/css" charset="utf-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>


<div id="v_spacer"  class = 'page-break'></div>
<div class="p_courseContainer ">
	<div class="p_courseHolder">
		<div class="p_courseContentRow1Container  ">
			<div class="p_title"><?php echo $initiative;?></div>
			<div class="p_titleDescription"><span style="font-weight:bold;">Initiative Number:</span>   <?php echo $initiative_number;?><span style="font-weight:bold;"> BHU : </span> <?php echo $BHU;?></div>

		</div>
	<div class="p_courseContentRow2Container" >

			<div class="p_courseContentRow2Col1">
				<div class="p_courseContentRow2Col1Sections">
					<div class="p_courseContentRow1Container_print  ">
			<div class="p_title_print"><?php echo $initiative;?></div>
			<div class="p_titleDescription_print"><span style="font-weight:bold;">Initiative Number:</span>   <?php echo $initiative_number;?><span style="font-weight:bold;"> BHU : </span><?php echo $BHU;?></div>

		</div>
					<div class="p_courseContentRow2Col1SectionsTitle">Executive Summary</div>
					<div class="p_courseContentRow2Col1SectionsBody">
						  <?php echo nl2br($exec_summary);?>
					</div>
				</div>

				<div class="p_courseContentRow2Col1Sections">
					<div class="p_courseContentRow2Col1SectionsTitle">Project Description and Scope</div>
					<div class="p_courseContentRow2Col1SectionsBody">
						 <?php echo nl2br($proj_description);?>
					</div>
				</div>

		<div class="p_courseContentRow2Col1Sections">
					<div class="p_courseContentRow2Col1SectionsCol" style="margin-right:12px;">
						<div class="p_courseContentRow2Col1SectionsHalfTitle">Quantifiable Benefits Summary</div>
						<div class="p_courseContentRow2Col1SectionsHalfBody">
							  <?php echo nl2br($quant_summary);?>
						</div>
					</div>

					<div class="p_courseContentRow2Col1SectionsCol">
						<div class="p_courseContentRow2Col1SectionsHalfTitle">Non-Quantifiable Benefits Summary</div>
						<div class="p_courseContentRow2Col1SectionsHalfBody">
							  <?php echo nl2br($nonquant_summary);?>
						</div>
					</div>
				</div>

				<div class="p_courseContentRow2Col1Sections">
					<div class="p_courseContentRow2Col1SectionsTimeline">
				<div>	<div class='timelinefiscalleft'>FY11</div><div class='timelinefiscalcenter'>FY12</div><div class='timelinefiscalleft'>FY13</div></div>
					<?php //echo $startyear . $start_date_month . $endyear . $end_date_month . $offset1 . $offset2;
					
echo "<table  cellspacing ='0' cellpadding='3' ><tr>";

foreach($timelineheader as $column)
{


	echo "<td height=30  width=31px style='font-size: 11px;font-color:grey;font-family: Myriad Set, Myriad Pro, Lucida Grande, Geneva, Arial, Verdana, sans-serif;'>" . $column ."</td>";


}
$i=0;
echo "</tr><tr>";
foreach($timelineheader as $column)

{	if($offset1 >= 0 && $offset2 < 20)
		if($i <=$offset2 && $i>=$offset1)
			echo "<td bgcolor = '#2e9ee3' ></td>";
		else
			echo "<td></td>";
	$i++;
}
echo "</tr></table>";
?>
					<!--	<div class="p_courseContentRow2Col1SectionsTimelineRow1">
							<div class="p_courseContentRow2Col1SectionsTimeline4Col">
								Q1
							</div>
							<div class="p_courseContentRow2Col1SectionsTimeline4Col">
								Q2
							</div>
							<div class="p_courseContentRow2Col1SectionsTimeline4Col">
								Q3
							</div>
							<div class="p_courseContentRow2Col1SectionsTimeline4Col" style="border-right:0px;">
								Q4
							</div>
						</div>
						-->
				<!--		<div class="p_courseContentRow2Col1SectionsTimelineRow1">
							<div class="p_courseContentRow2Col1SectionsTimeline4Col">
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									OCT
								</div>
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									NOV
								</div>
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									DEC
								</div>
							</div>
							<div class="p_courseContentRow2Col1SectionsTimeline4Col">
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									JAN
								</div>
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									FEB
								</div>
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									MAR
								</div>
							</div>
							<div class="p_courseContentRow2Col1SectionsTimeline4Col">
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									APR
								</div>
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									MAY
								</div>
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									JUN
								</div>
							</div>
							<div class="p_courseContentRow2Col1SectionsTimeline4Col" style="border-right:0px;">
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									JUL
								</div>
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									AUG
								</div>
								<div class="p_courseContentRow2Col1SectionsTimeline3Col">
									SEP
								</div>
							</div>
						</div>

						<div class="p_courseContentRow2Col1SectionsTimelineRowBar">
							<div class="p_courseContentRow2Col1SectionsTimelineRowBarScale" style="width:500px;"></div>
							<div class="p_courseContentRow2Col1SectionsTimelineRowBarEnd"></div>
						</div>
						-->
					</div>
				</div>
			</div>
			<div class="p_courseContentRow2Col2">
				<div class="p_courseContentSidebarContainer">
					<div class="p_courseContentSidebarRow1header">SUMMARY</div>
					<div class="p_courseContentSidebarRow2Container">

					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Fiscal Year
						</div>
						<div class="p_courseContentSidebarRow2Col2">
										       <?php
                       if($fiscal_year->num_rows()>0)
          foreach($fiscal_year->result() as $row){

          	echo  $row->year . "<br>";

          }
                   ?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Rollover
						</div>
						<div class="p_courseContentSidebarRow2Col2">
						 <?php if($rollover)
                    		echo "Yes";
                    	  else
                    	  	echo "No";

                    		?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Ultimate Gold Impact
						</div>
						<div class="p_courseContentSidebarRow2Col2">
						 <?php 
                    		echo $ultimate_gold_impact ;
                    	 

                    		?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Type
						</div>
						<div class="p_courseContentSidebarRow2Col2">
							<?php echo $type;

							?>
						</div>
					</div>

					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Regions Benefitting
						</div>
						<div class="p_courseContentSidebarRow2Col2">
						 <?php  $regionsname = '';

						 if($regions->num_rows()>0)
          foreach($regions->result() as $row){

          	$regionsname .=  $row->name . ", ";

          }
          echo rtrim($regionsname, ', ');
          ?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Originating Region
						</div>
						<div class="p_courseContentSidebarRow2Col2">
							       <?php
                       if($originatorregions->num_rows()>0)
          foreach($originatorregions->result() as $row){

          	echo  $row->name . "<br>";

          }
                   ?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Executive Sponsor
						</div>
						<div class="p_courseContentSidebarRow2Col2">
							 <?php
                   echo $executive_sponsor;
                   ?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Author
						</div>
						<div class="p_courseContentSidebarRow2Col2">
							 <?php
                   echo $author;
                   ?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							BPR Contacts
						</div>
						<div class="p_courseContentSidebarRow2Col2">
						 <?php
                   echo $BPR_contact;
                   ?>
						</div>
					</div>
				</div>

				<div class="p_courseContentSidebarContainer">
					<div class="p_courseContentSidebarRow1">CLASSIFICATION</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Organization
						</div>
						<div class="p_courseContentSidebarRow2Col2">
							          <?php
                        if($organizations->num_rows()>0)
          foreach($organizations->result() as $row){

          	echo  $row->name . "<br>";

          }
          ?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Track
						</div>
						<div class="p_courseContentSidebarRow2Col2">
						    <?php
                       if($tracks->num_rows()>0)
          foreach($tracks->result() as $row){

          	echo  $row->data . "<br>";

          }
                   ?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Sub-track
						</div>
						<div class="p_courseContentSidebarRow2Col2">
							    <?php
                       if($subtracks->num_rows()>0)
          foreach($subtracks->result() as $row){

          	echo  $row->data . "<br>";

          }
                   ?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
                                            
						<div class="p_courseContentSidebarRow2Col1">
							Capabilities
						</div>
						<div class="p_courseContentSidebarRow2Col2">
							      <?php
                        if($capabilities->num_rows()>0)
          foreach($capabilities->result() as $row){

          	echo  $row->data . "<br>";

          }
                   ?>
						</div>
					</div>
					<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							Sub-capabilities
						</div>
						<div class="p_courseContentSidebarRow2Col2">
							       <?php

            if($subcapabilities->num_rows()>0)
          foreach($subcapabilities->result() as $row){

          	echo  $row->data . "<br>";

          }

                 ?>
						</div>
							</div>
							</div>
							<div class="p_courseContentSidebarContainer">
<div class="p_courseContentSidebarRow1">BUSINESS CASE</div>
<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							QLOE
						</div>
						<div class="p_courseContentSidebarRow2Col2">
						</div>
						</div>
						<div class="p_courseContentSidebarRow2Container">
						<div class="p_courseContentSidebarRow2Col1">
							PLOE
						</div>
						<div class="p_courseContentSidebarRow2Col2">
						</div>
						</div>
						<div class="p_courseContentSidebarRow2Container">
							<div class="p_courseContentSidebarRow2Col1">
							Revenue Growth
						</div>
							<div class="p_courseContentSidebarRow2Col2">
								 <?php
                       if($est_rg_sum->num_rows()>0)
          foreach($est_rg_sum->result() as $row){

          	echo  $row->sum_est_rg ;

          }
                   ?>
							</div>
							</div>
							<div class="p_courseContentSidebarRow2Container">
								<div class="p_courseContentSidebarRow2Col1">
							Cost Savings
						</div>
							<div class="p_courseContentSidebarRow2Col2">
					    <?php
                       if($est_cs_sum->num_rows()>0)
          foreach($est_cs_sum->result() as $row){

          	echo  $row->sum_est_cs ;

          }
                   ?>
							</div>
							</div>
							<div class="p_courseContentSidebarRow2Container">
								<div class="p_courseContentSidebarRow2Col1">
							Cost Avoidance
						</div>
							<div class="p_courseContentSidebarRow2Col2">
										<?php         if($est_ca_sum->num_rows()>0)
          foreach($est_ca_sum->result() as $row){

          	echo  $row->sum_est_ca ;

          }
                   ?>
							</div>
							</div>
							<div class="p_courseContentSidebarRow2Container">
												<div class="p_courseContentSidebarRow2Col1">
							Payback
						</div>
							<div class="p_courseContentSidebarRow2Col2">
						<?php echo $paybackyrs;?>
							</div>
							</div>
							<div class="p_courseContentSidebarRow2Container">
								<div class="p_courseContentSidebarRow2Col1">
							Estimated Net Benefits
						</div>
							<div class="p_courseContentSidebarRow2Col2">
							   <?php echo $total_benefits;?>
							</div>
					</div>
	<div class="p_courseContentSidebarRow2Container">
								<div class="p_courseContentSidebarRow2Col1">
								Created on 
								</div>
								<div class="p_courseContentSidebarRow2Col2">
								<?php echo   date("F j, Y, g:i a", strtotime($date_inserted)); ?>
								</div>
								</div>
								
					<div class="p_courseContentSidebarRow2Container">
								<div class="p_courseContentSidebarRow2Col1">
								Updated on 
								</div>
								<div class="p_courseContentSidebarRow2Col2">
								<?php echo   date("F j, Y, g:i a", strtotime($date_edited)); ?>
								</div>
								</div>

				

				</div>
			</div>
		</div>





	</div>
</div>  <!--class="p_courseHolder"-->
</div><!--class="p_courseContainer"-->



<!-- Image preloader //


   <div class="filter_content"><div  id="contentform">
      <div id="v_spacer"></div>


                    <div id="col34_div">
                 <br>   <br><div class='upload_title' >Executive Summary</div><br>
                    <?php echo $exec_summary;?>
                 <br>  <br><div class='upload_title' >Project Description</div><br>
                    <?php echo $proj_description;?>

                <br>   <br><div class='upload_title' >Business Case Summary</div><br>

 <?php
      //regions benefitting
          if($regions->num_rows()>0)
          foreach($regions->result() as $row){

          	echo  $row->name . "<br>";

          }

        ?>

           Business Case<br>
          <div id="col3_div">
          <br> <b> Quantifiable Benefits</b><br>
        <?php echo $quant_summary;?>
        </div>
        <br> <b> Non Quantifiable Benefits</b><br>
        <?php echo $nonquant_summary;?>

        <table>
        <tr><td>Quantifiable Benefits</td><td>Revenue Growth</td><td>Cost Reduction</td><td>Estimated Net Benefits</td></tr>
        <br> <b> Total Benefits</b><br>
        <?php echo $total_benefits;?>
          <br>      <br> <b>Estimated Revenue Growth(Sum $)</b><br>
                   <?php
                       if($est_rg_sum->num_rows()>0)
          foreach($est_rg_sum->result() as $row){

          	echo  $row->sum_est_rg . "<br>";

          }
                   ?>
                       <br>      <br> <b> Estimated Cost Avoidance(Sum $)</b><br>
                   <?php
                       if($est_ca_sum->num_rows()>0)
          foreach($est_ca_sum->result() as $row){

          	echo  $row->sum_est_ca . "<br>";

          }
                   ?>
                                   <br>      <br> <b> Estimated Cost Savings(Sum $)</b><br>
                   <?php
                       if($est_cs_sum->num_rows()>0)
          foreach($est_cs_sum->result() as $row){

          	echo  $row->sum_est_cs . "<br>";

          }
                   ?>
        </div>
       <div id="col3_div">
     <br>   <br> <b> Initiative Number</b>
                    <?php echo $initiative_number;?>
                 <br>   <br> <b> Fiscal Year</b>
                    <?php echo $fiscal_year;?>
                <br>   <br> <b> Rollover</b>
                    <?php if($rollover)
                    		echo "Yes";
                    	  else
                    	  	echo "No";

                    		?>
             <br>    <br> <b> Initiative Requestor</b>
                   <?php
                   echo $initiative_requestor;
                   ?>
             <br>      <br> <b> Originator Region</b>
                   <?php
                       if($originatorregions->num_rows()>0)
          foreach($originatorregions->result() as $row){

          	echo  $row->name . "<br>";

          }
                   ?>
               <br>    <br> <b> Executive Sponsor</b>
                   <?php
                   echo $executive_sponsor;
                   ?>
             <br>      <br> <b>Author</b>
                   <?php
                   echo $author;
                   ?>
            <br>       <br> <b>BPR Contact</b>
                   <?php
                   echo $BPR_contact;
                   ?>


               <br>    <br> <b>Organization</b><br>
                   <?php
                        if($organizations->num_rows()>0)
          foreach($organizations->result() as $row){

          	echo  $row->name . "<br>";

          }
          ?>
               <br>    <br><b>Track</b><br>
                   <?php
                       if($tracks->num_rows()>0)
          foreach($tracks->result() as $row){

          	echo  $row->data . "<br>";

          }
                   ?>
              <br>     <br> <b>Subtrack</b><br>
                   <?php
                       if($subtracks->num_rows()>0)
          foreach($subtracks->result() as $row){

          	echo  $row->data . "<br>";

          }
                   ?>
              <br>     <br><b> Capabilities</b><br>

                   <?php
                        if($capabilities->num_rows()>0)
          foreach($capabilities->result() as $row){

          	echo  $row->data . "<br>";

          }
                   ?>
             <br>    <br> <b>Subcapabilities</b><br>
                 <?php

            if($subcapabilities->num_rows()>0)
          foreach($subcapabilities->result() as $row){

          	echo  $row->data . "<br>";

          }

                 ?>



       </div>


-->





     <script  src="<?= base_url(); ?>assets/js/jquery.js"></script>

<script type='text/javascript'>
$(document).ready(function(){
	$('.p_courseContentRow2Container').each(function(){

		var rc22 = $(".p_courseContentRow2Col2", this);
		var rc21 = $(".p_courseContentRow2Col1", this);
		if(rc21.height() > rc22.height())
		rc22.height(
				rc21.height()
			);
			else
		rc21.height(
				rc22.height()
			);
	});
});
</script>
