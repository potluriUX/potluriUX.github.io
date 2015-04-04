<?php
include("header.php");?>
 <link rel="stylesheet" href="Create%20your%20flyer_files/style.css">
<title>Make flyers, logos, invitations online for free html5 js for mobile or desktop. Prefilled templates just edit them</title>
  
<!--<html>
<div style="width:17%;min-height:500px;float:left;">
<div class="titre_categories">Categories</div>
<table class="tab_categories">
<tbody>
<tr>

<td class="categorie">
<a href="#">Concerts</a>
</td>
</tr>
<tr>

<td class="categorie">
<a href="#" id="0">Parties</a>
</td>
</tr>
<tr>

<td class="categorie">
<a href="#">Dance</a>
</td>
</tr>
<tr>

<td class="categorie">
<a href="#" >Sport</a>
</td>
</tr>
<tr>
<tr>
<tr>
</tbody>
</table>
</div>-->

<!--<div class="panel panel-default">
    
  <div class="panel-heading">
      <h3 class="panel-title">Categories</h3></th></tr>
  </div>
  <div class="panel-body">
    <ul class="nav nav-pills">
  <li class="active"><a href="#">Home</a></li>
  <li><a href="#">Profile</a></li>
  <li><a href="#">Messages</a></li>
</ul>
  </div>
</div>-->

     
     

<body>
    
<div id='content container bs-docs-container' style='margin:0 auto;  width: 1000px' >
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<a class='gallery_c btn btn-primary' href='tour.php?id=1' >Take Design Tour. </a>
<a class='btn btn-primary' href='new_design2.php' >Use Advanced Editor(Faster) </a>

    <a class='gallery_c' style='display:none;' href='tour.php?id=2'></a>
    <a class='gallery_c' style='display:none;' href='tour.php?id=3'></a>
    <a class='gallery_c' style='display:none;' href='tour.php?id=4'></a>
    <a class='gallery_c' style='display:none;' href='tour.php?id=5'></a>
    <a class='gallery_c' style='display:none;' href='tour.php?id=6'></a>
    <a class='gallery_c' style='display:none;' href='tour.php?id=7'></a>
    <a class='gallery_c' style='display:none;' href='tour.php?id=8'></a>
    <a class='gallery_c' style='display:none;' href='tour.php?id=9'></a>
    <div id='tour_images'></div><br>
<!--    <div id="page" class="container" >-->
<!--        <div id='sidebar'  style="float:left;padding-left:50px;">-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=115928078419123&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-share-button" data-href="http://www.thunderify.com"></div>
<div class="panel panel-default" id="category">
    
</div>

<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3730266544385182"
     data-ad-slot="4599097999"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<div class="panel panel-default">
    
  <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-picture"></span> Select Background</h3>
  </div>
  <div class="panel-body">
      
    <div id ="row"></div>
   
</div>
</div>
 <!-- thunderify -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3730266544385182"
     data-ad-slot="4599097999"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
 </div>
 </body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
var imagesineachcategoryarray=[];
    this.category =['Birthday','Events','Sales','Signs','Party','Wedding','Logo','BandW','Invitation','Christmas','Plain',
        'Abstract','Vectors'];
     this.imagesineachcategoryarray[0] = 6;
     this.imagesineachcategoryarray[1] = 11;
     this.imagesineachcategoryarray[2] = 11;
     this.imagesineachcategoryarray[3] = 8;
      this.imagesineachcategoryarray[4] = 19;
      this.imagesineachcategoryarray[5] = 7;
      this.imagesineachcategoryarray[6] = 7;
      this.imagesineachcategoryarray[7] = 17;
this.imagesineachcategoryarray[8] = 11;
this.imagesineachcategoryarray[9] = 6;
this.imagesineachcategoryarray[10] = 11;
this.imagesineachcategoryarray[11] = 9;
this.imagesineachcategoryarray[12] = 9;
    function Flyer(){
    this.partyarray=imagesineachcategoryarray;
    this.category =category;
}
Flyer.prototype.get_category = function(){
    
    var str='';
    //str = str + "<tr>";
    str = str + "<div class='panel-heading'><h3 class='panel-title'><span class='glyphicon glyphicon-th-list'></span> Categories</h3></div>";
str= str+"<div class='panel-body'><ul class='nav nav-pills'>";
    $.each(self.category,function(key,value2){
      //str = str + "<tr>";  
    str = str + "<li ><a href='#' class='get_category' id='"+key+"'>"+value2+"</a></li>";
    //str =str+ "</td>";
     
    });
    str = str + "</ul></div></div>";
    $('#category').html(str);
}
Flyer.prototype.flyer_table=function(id){
    var str ='';
    var self=this;
     //console.log(this.partyarray[0]);
	//var new_columns_shown_array=[];
	
        //u dont wanna call this everytime user clicks on category.
        //generate categoryies table once at page load. create a new function that generates those links. 
for(var i=1;i<=self.partyarray[id];i++){
        //$.each(self.partyarray[id],function(key,value2){
            str = str + "<div class='col-sm-6 col-md-3'><a class='vimeo' href='createflyer.php?id="+i+"&category="+this.category[id]+"'><div class='thumbnail'><img src ='themes/"+this.category[id]+"/"+i+".jpg'  ></a></div></div>";//+value2+
            
        };
        //< id = '"+value2+"' rel = '"+value2+"'>
        //str = str + "</tr>";
        
        $('#row').html(str);
}

$( document ).ready(function() {

var flyer = new Flyer();

 $(".navflyer").css({"background":"none repeat scroll 0 0 rgba(255, 255, 255, 0.15)"});
    //flyer.flyer_table(0);//u call this wverytime user clicks on cate
    //after table is generated. then u have to rebind colorbox in next line
    $(".vimeo").colorbox({iframe:true, innerWidth:1000, innerHeight:700,rel:'vimeo', close:"<span class='glyphicon glyphicon-remove'></span>"});
     $(".gallery_c").colorbox({ iframe:true, innerWidth:500, innerHeight:500, rel:'gallery_c',
         next:"<span class='glyphicon glyphicon-arrow-right'></span>" ,
         previous:"<span class='glyphicon glyphicon-arrow-left'></span>", 
         close:"<span class='glyphicon glyphicon-remove'></span>", 
         current :"{current} of {total}"
     });
   $('.gallery').hide();

    flyer.get_category();
    // this is for category buttons which one to get selected.the selected button will get highlighted...***
   $('.nav li a').click(function(e) {
       
    $('.nav li.active').removeClass('active');
    var $this = $(this);
    if (!$this.hasClass('active')) {
        $this.parent().addClass('active');
    }
   return false;
});
//------category buttons

    $(".get_category").click(function(){
      //alert(this.id);
        
        
    flyer.flyer_table(this.id);//u call this wverytime user clicks on cate
    //after table is generated. then u have to rebind colorbox in next line
    $(".vimeo").colorbox({iframe:true, innerWidth:1000, innerHeight:700, close:"<span class='glyphicon glyphicon-remove'></span>"});
    return false;
    });
var clickid = <?php echo json_encode($_GET['clickid']);?>;
if(clickid){
	$("#"+clickid).click();
}else{
    $("#0").click();
}
});
</script>
<script src="./colorbox-master/jquery.colorbox.js"></script>
<link rel="stylesheet" href="./colorbox-master/example4/colorbox.css" />
<style>
    
    #content{
        position: relative;
   left: 0px;
    }
#table{
    float:left;
}
#table2222 {   
    width: 500px;
    margin-top:-123px;
    margin-left: auto; 
    margin-right: auto;
    

}
#table2222 img{
    vertical-align: top;
    display: inline-block;
    *display: inline;
    padding-left:20px;
    zoom: 1;
}
.col-md-3 {
      height: 175px;
    width: 150px;
}
a:hover, a:visited, a:link, a:active
{
    text-decoration: none !important;
}


a.btn,a.btn:visited, a.btn:link, a.btn:active {
  text-decoration: none !important;
}


/*.thumbnail
{
float: left;
width: 150px;
border: 1px solid #999;
margin: 0 15px 15px 0;
}
.clearboth { clear: both; }*/

</style>