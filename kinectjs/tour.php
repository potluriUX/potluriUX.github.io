<?php

$element[1]='Tank image is uploaded, using HTML5,JS, beside Browse Button';
$element[2] = 'Tank Depot yellow Image is uploaded';
$element[3] = '<ul><li>Select Rectangle Color and select YES to get a nice rectangle, with gradient, around your text(around your text)</li>'
        . ' <li>Select desired Font Size, Font Color(green), Outline(white) and press Add Button</li></ul>';
$element[4]='The Title of Brochure, Event, Product is added';
$element[5]='<ul><li>If another text need to be added then select NO in rectangle area and add text</li>'
        . '<li>Select desired Font Size, Font Color(green), Outline(white) and press Add Button</li></ul>';
$element[6]='The text is added without reactangle';
$element[7]='If you want to get really innovative and play with flyers, you can rotate the text like tear-off tab flyers';
$element[8]='Phone Number is added vertically because the text Rotation is 90';
$element[9] = '<ul><li>Make poster-sized collages, flyers, logos, invitations online for free</li>
<li>Use your or friends Facebook photos. Company photos. Event photos. Product photos</li>
<li>Use free poster backgrounds or upload your own</li>
<li>Get big, high quality posters up to 3 feet tall</li>
<li>Free downloads, prints  into PDF or PNG or JPG. </li>
<li>Share flyers online in Twitter or Facebook and see the increase of traffic</li>
<li>Give our Editor a try. Its easy. You will be impressed with yourself</li>';

$element[50] = 'Company Brochure:- Uploaded company logo through Editor upload. '
        . 'Header has Yellow Rectangle and Green Text at 20 font size with White outline';
$element[51] = 'Company Brochure:- Uploaded Kindle image through Editor upload. Header has Red Rectangle '
        . 'and green text at 20 font size with White outline';
$element[52] = 'Christmas invitation made through Thunderify Editor template background. '
        . 'Different font colors and sizes used';
$element[53] = 'Birthday Party invitation made through Thunderify Editor template background. '
        . 'Different font colors and sizes used';
$element[54] = 'Wedding  invitation made through Thunderify Editor template background. '
        . 'Different font colors and sizes used';
$element[55] = '<ul><li>Find a
design template</li>

<li>Customize color
images & text</li>

<li>Order your
high quality prints
or

Download your
print-ready files</li></ul>';

//$element = array('element1', 'element2');
echo (isset($_GET['id'])?$element[$_GET['id']] :''). "<br>";
if(file_exists("tour/".$_GET['id'].".png"))
echo "<img src='tour/".$_GET['id'].".png' width=500 height=500>";