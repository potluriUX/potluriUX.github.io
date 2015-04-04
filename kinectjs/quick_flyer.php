<?php
include("header.php");?>

 <link rel="stylesheet" href="Create%20your%20flyer_files/style.css">

  
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

<br><a class='gallery_c btn btn-primary' href='tour.php?id=1' >Take Design Tour. </a>
<a class='btn btn-primary' href='new_design.php' >Use Basic Editor </a>
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
<!--<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3730266544385182"
     data-ad-slot="4599097999"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>-->


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
            str = str + "<div class='col-sm-6 col-md-3'><a class='vimeo' id='"+i+"'rel='"+this.category[id]+"' href='#'><div class='thumbnail'><img src ='themes/"+this.category[id]+"/"+i+".jpg'  ></a></div></div>";//+value2+//href='createflyer.php?id="+i+"&category="+this.category[id]+"'
            
        };
        //< id = '"+value2+"' rel = '"+value2+"'>
        //str = str + "</tr>";
        
        $('#row').html(str);
}
var category_clicked = '';
           var id_clicked = '';
         
// $(".vimeo").click(function(){
//      $ ('#clear').click();//clear all layers
//      console.log("themes/" + $(this).attr('rel') + '/' + $(this).attr('id'));
//      category_clicked = $(this).attr('rel');
//      id_clicked = $(this).attr('id');
//       imageObj.src = "themes/" + category_clicked + '/' + id_clicked +'.jpg';//Dance/1.jpg";
//       return false;
//   });
   
$( document ).ready(function() {

var flyer = new Flyer();

 $(".navholidays").css({"background":"none repeat scroll 0 0 rgba(255, 255, 255, 0.15)"});
    //flyer.flyer_table(0);//u call this wverytime user clicks on cate
    //after table is generated. then u have to rebind colorbox in next line
    //$(".vimeo").colorbox({iframe:true, innerWidth:1000, innerHeight:700,rel:'vimeo', close:"<span class='glyphicon glyphicon-remove'></span>"});
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
     clickimage();
    //after table is generated. then u have to rebind colorbox in next line
   // $(".vimeo").colorbox({iframe:true, innerWidth:1000, innerHeight:700, close:"<span class='glyphicon glyphicon-remove'></span>"});
    return false;
    });
  
var clickid = <?php echo (isset($_GET['clickid'])?$_GET['clickid']:'8');?>;
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











 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.4.0/fabric.min.js"></script>
<script src='spectrum-master/spectrum.js'></script>
<link rel='stylesheet' href='spectrum-master/spectrum.css' />

<script>
     function clickimage(){
   $('.vimeo').click(function(){
//alert("vimeo clicked");
      //   var positionScale = canvas.item(0).getScaleX();
//         var positionLeft = 0;//canvas.item(0).getLeft();
//         var positionTop = 0;//canvas.item(0).getTop();
//         var positionAngle = canvas.item(0).getAngle();
//         
//        // canvas.remove(logo);
//         fabric.Image.fromURL('./themes/Abstract/'+$(this).attr('id')+'.jpg', function(img) {
//             logo = img.set({ left: positionLeft, top: positionTop, angle: positionAngle,
//             width: 450,
//             height:630,
//             lockScalingX: true,
//   lockScalingY: true,
//   lockMovementY:true,
//   lockMovementX:true,
//   hasRotatingPoint: false,
//   transparentCorners: false,
//             
//              }).setCoords();
//              
//             canvas.add(logo);
//            // canvas.item(0).scale(positionScale);
//            // canvas.renderAll();
//         });
        //canvas.setBackgroundImage('./themes/Abstract/'+$(this).attr('id')+'.jpg', canvas.renderAll.bind(canvas));
        canvas.setBackgroundImage('./themes/'+$(this).attr('rel')+'/'+$(this).attr('id')+'.jpg', canvas.renderAll.bind(canvas), {
  // Needed to position backgroundImage at 0/0
  originX: 'left',
  originY: 'top',
   width: 450,
             height:630,
});
return false;
    });
    }// create a wrapper around native canvas element (with id="c")
// create a wrapper around native canvas element (with id="c")
$(window).load(function() {
$("#contour").spectrum({
    preferredFormat: "hex",
    showInput: true,
    showPalette: true,
    palette: [["red", "rgba(0, 255, 0, .5)", "rgb(0, 0, 255)"]]
});
$("#contour2").spectrum({
    preferredFormat: "hex",
    showInput: true,
    showPalette: true,
    palette: [["red", "rgba(0, 255, 0, .5)", "rgb(0, 0, 255)"]]
});
 canvas = new fabric.Canvas('c');
var layers = [];
var layercount = 0;
canvas.backgroundColor = 'rgba(200,200,200,1)';


  function addTextGrad() {
 


// create a rectangle object
var t = new fabric.IText($("#txarea").val(), {
  width: 200, 
    height: 100, 
    
  //backgroundColor: $("#contour2").val(),
  fill: $("#contour").val(),
  fontSize: 25,
  padding : 1,
    //fontFamily: 'Comic Sans'
    
});


var r = new fabric.Rect({
   width: 200, 
    height: 100, 
    fill: '#FFFFFF',
     backgroundColor: '#FFFFFF',
  });
r.setGradient('fill', {
    type: 'linear',
    x1: 0,
    y1: -t.height / 2,
    x2: 0,
    y2: t.height / 2,
    colorStops: {
        0: '#FFFFFF',
        1: $("#contour2").val()
    }
});
var group = new fabric.Group([ r, t ], {
  left: 100,
  top: 100,
  lockScalingX: false,
  lockScalingY: false,
  hasRotatingPoint: false,
  
    
   
});

canvas.add(group);

  }

  function addTexts() {
 


// create a rectangle object
var t = new fabric.IText($("#txarea").val(), {
  width: 200, 
    height: 100, 
    
  backgroundColor: $("#contour2").val(),
  fill: $("#contour").val(),
  fontSize: 25,
  padding : 1,
    //fontFamily: 'Comic Sans'
    
});

//t.setGradient('fill', {
//  type: 'linear',
//  x1: -t.width / 2,
//  y1: 0,
//  x2: t.width / 2,
//  y2: 0,
//  colorStops: {
//    0: 'red',
//    0.5: '#005555',
//    1: 'rgba(0,0,255,0.5)'
//  }
//});
//var r = new fabric.Rect({
//  
//    fill: '#FFFFFF',
//     backgroundColor: '#FFFFFF',
//  });

//var group = new fabric.Group([ r, t ], {
//  left: 100,
//  top: 100,
//  lockScalingX: false,
//  lockScalingY: false,
//  hasRotatingPoint: false,
//  
//    
//   
//});
//
//canvas.add(group);
canvas.add(t);
  //   var iText = new fabric.IText($("#txarea").val(), {
//         backgroundColor: '#FFFFFF',
//       left: 10,
//       top: 150,
//       fontFamily: 'Helvetica',
//       fill: '#333',
     
     //  styles: {
//         0: {
//           0: { fill: 'red', fontSize: 20 },
//           1: { fill: 'red', fontSize: 30 },
//           2: { fill: 'red', fontSize: 40 },
//           3: { fill: 'red', fontSize: 50 },
//           4: { fill: 'red', fontSize: 60 },
// 
//           6: { textBackgroundColor: 'yellow' },
//           7: { textBackgroundColor: 'yellow' },
//           8: { textBackgroundColor: 'yellow' },
//           9: { textBackgroundColor: 'yellow' }
//         },
//         1: {
//           0: { textDecoration: 'underline' },
//           1: { textDecoration: 'underline' },
//           2: { fill: 'green', fontStyle: 'italic', textDecoration: 'underline' },
//           3: { fill: 'green', fontStyle: 'italic', textDecoration: 'underline' },
//           4: { fill: 'green', fontStyle: 'italic', textDecoration: 'underline' }
//         },
//         2: {
//           0: { fill: 'blue', fontWeight: 'bold' },
//           1: { fill: 'blue', fontWeight: 'bold' },
//           2: { fill: 'blue', fontWeight: 'bold' },
// 
//           4: { fontFamily: 'Courier', textDecoration: 'line-through' },
//           5: { fontFamily: 'Courier', textDecoration: 'line-through' },
//           6: { fontFamily: 'Courier', textDecoration: 'line-through' },
//           7: { fontFamily: 'Courier', textDecoration: 'line-through' }
//         },
//         3: {
//           0: { fontFamily: 'Impact', fill: '#666', textDecoration: 'line-through' },
//           1: { fontFamily: 'Impact', fill: '#666', textDecoration: 'line-through' },
//           2: { fontFamily: 'Impact', fill: '#666', textDecoration: 'line-through' },
//           3: { fontFamily: 'Impact', fill: '#666', textDecoration: 'line-through' },
//           4: { fontFamily: 'Impact', fill: '#666', textDecoration: 'line-through' }
//         }
//       }
  //   });
// 
//     var iText2 = new fabric.IText($("#txarea").val(), {
//       left: 10,
//       top: 150,
//       fontFamily: 'Helvetica',
//       fill: 'white',
     //  backgroundColor: '#FFFFFF',
      // styles: {
//         0: {
//           0: { fill: 'red' },
//           1: { fill: 'red' },
//           2: { fill: 'red' }
//         },
//         2: {
//           0: { fill: 'blue' },
//           1: { fill: 'blue' },
//           2: { fill: 'blue' },
//       
//         }
//       }
  //   });

    //canvas.add(iText, iText2);
  //  canvas.add(iText);
   
    
  }
  var logo;
   //  fabric.Image.fromURL('./themes/Abstract/1.jpg', function(img) {
//         logo = img.set({ left: 250, top: 250, angle: -10 })
//         canvas.add(logo);
//         canvas.renderAll();
//         });
 
$('#addtext').click(function(){


addTexts();
});
$('#addgradtext').click(function(){


addTextGrad();
});
//$('#1').click();
 getSelected = function() {
 //alert(canvas.getActiveObject());
    return canvas.getActiveObject();
  };
removeSelected = function() {
    var activeObject = canvas.getActiveObject(),
        activeGroup = canvas.getActiveGroup();

    if (activeGroup) {
      var objectsInGroup = activeGroup.getObjects();
      canvas.discardActiveGroup();
      objectsInGroup.forEach(function(object) {
        canvas.remove(object);
      });
    }
    else if (activeObject) {
      canvas.remove(activeObject);
    }
  };

  $("#topng").click(function(){
   console.log("topng called");
    if (!fabric.Canvas.supports('toDataURL')) {
      alert('This browser doesn\'t provide means to serialize canvas to an image');
    }
    else {
     // window.open(canvas.toDataURL('png'));
     // canvas.toDataURL({
					//	  callback: function(dataUrl) {
                                                     document.getElementById('form_save').action = 'createit.php';
							document.getElementById('form_dataurl').value=canvas.toDataURL('png');
							document.getElementById('form_save').submit();
							//window.open(dataUrl);
						//  }
						//});
    }

  
  });
getFontFamilygetStrokeColor = function() {
console.log(getActiveProp('fontFamily').toLowerCase());
    return getActiveProp('fontFamily').toLowerCase();
  };
setFontFamily = function(value) {
    setActiveProp('fontFamily', value.toLowerCase());
  };

getBgColor = function() {

 console.log(getActiveProp2('backgroundColor'));
    return getActiveProp2('backgroundColor');
  };
setBgColor = function(value) {
    setActiveProp('backgroundColor', value);
  };

 getTextBgColor = function() {
 console.log(getActiveProp('textBackgroundColor'));
    return getActiveProp('textBackgroundColor');
  };
  setTextBgColor = function(value) {
    setActiveProp('textBackgroundColor', value);
  };
  function getActiveProp(name) {
  var object = canvas.getActiveObject();
  console.log(object);
  if (!object) return '';

  return object[name] || '';
}
  function getActiveProp2(name) {
 var object = canvas.getActiveObject();

  if (!object) return '';

  return object._objects[0][name] || '';
}



function setActiveProp(name, value) {
  var object = canvas.getActiveObject();
  if (!object) return;

  object.set(name, value).setCoords();
  canvas.renderAll();
}



  });
  

  </script>
 <title>Quick flyer for making flyers quickly using html5 and JS mobile or desktop</title>
<div id="full">
    <div id="leftfull">
  <canvas id="c" width="450" height="630" style="border: 1px solid rgb(170, 170, 170); width: 400px; height: 400px;" ></canvas>
    </div>
    <div id="rightfull">
    <div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">
<span class="glyphicon glyphicon-pencil"> Text</span>
</h3>
</div>
<br>
    <div class="panel-body">
        <textarea id='txarea' rows=50 cols=50 style='height:80px'></textarea><br><br>
 <button id='addtext' class="testbutton btn btn-primary" >Add Text</button> 
 <button id='addgradtext' class="testbutton btn btn-primary">Add Gradient Text</button> <br><br>
 FontColor: <input style="padding-bottom:10px" id="contour" value="#e99f84" type="text"> 
 BGColor: <input style="padding-bottom:10px" id="contour2" value="#f9e5dc" type="text"> <br><br>
 
 <!--<button class='switch' id=1>Add Image</button>--> 
 <button id='remove' onclick='removeSelected()'class='testbutton btn btn-xs btn-danger '>Remove Selected</button><br><br>
 <button id='topng'class='testbutton button button-medium button-green'>Export to PNG</button>
 <form id="form_save" target="_self" action="createit.php" method="POST">
								<input 
                                                                       id="form_dataurl" name="form_dataurl" type="hidden">
								<input value="124" name="id_back" type="hidden">
							</form>
 </div> 
</div>
    </div>
</div>
  
  <style>
      #full {
    //background: #FF0;
    overflow: auto;
    padding: 10px;
    width:1000px;
}

#leftfull {
   // background: #0F0;
    float: left;
    width: 500px;
    
}

#rightfull {
  //  background: #F00;
  float:right;
   width : 450px;
  padding-left:50px
}
textarea{
    width:300px;
}
      </style>
<!--<button class='switch' id=1>Add Image</button>
 <button id='gettextbgcolor' onclick='getBgColor()'>Get BG Color</button>
  <button id='settextbgcolor' onclick='setBgColor("yellow")'>Set Text BG color</button>-->
<!--  <button id='getselected' onclick='getSelected()'>Get Selected</button> -->