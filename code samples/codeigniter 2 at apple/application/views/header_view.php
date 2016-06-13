<!DOCTYPE html >
<?php header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css" type="text/css" media="all" title="no title" charset="utf-8">
<title><?php echo $title; ?></title>
<div class="header">
	<div class="banner">
        <div style="float: left;" class="banner_left">
            <a onclick="window.location.href=''; return false;" href="#">Capital Planning Tool</a>
        </div>
        <div class="banner_middle">
            <div style="font-size: 11px;" class="segmented_control">
                <ul>
                		<?php 
                if($title == 'Concept Slide') {
                  	 echo " <li class='report selected'";
                  ?>
                   
                   id="reports_tab" onclick="document.location.href='#'">Concept Slide</a></li>
                   <?php } 
                else { ?>
                   <li class="<?php 
                   if($title == 'Landing Page') 
                  	 echo "report selected";
                   else 
                   	echo "Reports";?>" 
                   
                   id="reports_tab" onclick="document.location.href='<?php echo site_url("index.php/concept/search");?>'"><a href ="<?php echo site_url("index.php/concept/search");?>">Search</a></li>
                   <?php 
                  if($title == 'Initiative Edit' || $title == 'Edit BusinessCase'){?> 
                    <li class="<?php if($title == 'Initiative' || $title == 'Initiative Edit') echo "report selected"; else echo "Reports";?>" id="reports_tab" onclick="document.location.href='<?=site_url("index.php/initiative/edit/$initiativeid");?>'"><a href ="<?=site_url("index.php/initiative/edit/$initiativeid");?>">Initiative</a></li>
                 <?php } else { //if not initiative edit or bcase edit ?>
                    <li class="<?php if($title == 'Initiative' || $title == 'Initiative Edit') echo "report selected"; else echo "Reports";?>" id="reports_tab" onclick="document.location.href='<?=site_url("index.php/initiative");?>'"><a href ="<?=site_url("index.php/initiative");?>">Initiative</a></li>
                   <?php } ?>
                   <?php if($title == 'Initiative Edit' || $title == 'Edit BusinessCase') {?>      <li class="<?php if($title == 'BusinessCase' || $title == 'Edit BusinessCase') echo "report selected"; else echo "Reports";?>" id="reports_tab" onclick="document.location.href='<?=site_url("index.php/businesscase/edit/$initiativeid");?>'" ><a href ="<?=site_url("index.php/businesscase/edit/$initiativeid");?>">Business Case</a></li>
              <?php }?>
              <?php }  if(!empty($is_admin)){?>
            
                   
            <li class="Reports"  id="reports_tab" onclick="document.location.href='<?php echo site_url("index.php/user/insert");?>'">Admin</li>
            <?php } ?>
             </ul>
            </div>
        </div>
        <div style="float: right; font-size: 12px; margin-top: -10px;" class="banner_right">
           <?php echo $name?> (<a onclick="logout(); return false;" href='<?php  echo site_url("index.php/appleconnect/logout"); ?>'>Logout</a>)
        </div>
    </div>
    <div style="position: relative;" class="toolbar">
        <div id="reports_toolbar">
           
        </div>
    </div>
</div>