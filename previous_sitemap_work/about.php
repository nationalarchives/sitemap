<!DOCTYPE html>
<html>
<head>
<title>Sitemap experiments</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
			 
<style>
body{
	font-size: 1em;
	font-family: 'Open Sans', arial, sans-serif;
	margin:0;
	padding: 0;
}
a{
	color:#000;
	text-decoration: none;
	display: block;
	width:auto !important;
	padding-top:5px;
	padding-bottom:5px;

}
a:hover{
	text-decoration: underline;
}
div.sitemap {width: 100%; max-width: 90%; margin: 0 auto ; text-align: left;position: relative;padding-top:80px; display: flex; flex-direction: row;}


/*div.sitemap div:hover{
background-color: #ECF0F1;
}*/
div.sitemap div{

}
.fa-level-up-alt{
	transform: rotate(90deg);
	float:left;
	margin-right: 5px;
	position: relative;
	top:10px;
	color:#333;
}
.item{
	width:auto;
	min-width: 200px;
	border-right:1px solid #eee;
	display:block;
	padding:20px;
	text-align: center;
}
.item a{
/*	box-shadow: 5px 10px #F5F5F5;*/
}
.item1{
padding-left:10px;
}
.item1 a{
	background-color: #F9690E;
	padding:5px;
	border-radius: .2em;
}
.item2{
padding-top:20px;
}
.item2 a{
	background-color: #ECF0F1;
	padding:5px;
	border-radius: .2em;
}
.item3{
padding-top:100px;
}

.item3 a{
	background-color: #D2D7D3;
	padding:5px;
	border-radius: .2em;
}
.item4, .item9,.item8{
	padding-top:160px;
}

.item4 a, .item9 a, .item8 a{
	background-color: #BDC3C7;
	padding:5px;
	border-radius: .2em;
}
.item5{
padding-top:190px;
}
.item5 a{
	background-color: #95A5A6;
	padding:5px;
	border-radius: .2em;
}
.item6{
padding-top:230px;
}
.item6 a{
	background-color: #6C7A89;
	padding:5px;
	border-radius: .2em;
}
.item7{
padding-top:270px;
}
.item7 a{
	background-color: #757D75;
	padding:5px;
	border-radius: .2em;
}
.count{
display:inline-block;
color:#F9690E;
margin-left:10px;


}
.nav{
	width:100%;
	background-color: #000;
	position: fixed;
	z-index: 1000;
	margin:0;
	padding:0;
	text-align: center;
}

	.nav ul{
	list-style-type: none;
}
.nav ul li{
	display: inline-block;
	margin-right:10px;
	border-left:1px solid #fff;
	padding-left:10px;
}
.nav ul li:first-of-type{
	border-left:none;
}

.nav a{
	color:#fff;
}
.nav #on, .nav a:hover{
	color:#F9690E !important;
}

@media only screen and (max-width: 768px) {
   div.sitemap {padding-top:220px;}

}


</style>


</head>

<body>
<div class="nav">
	<ul>
		<li><a href="treeview.php">Treeview</a></li>
<li><a href="about.php" id="on">About us</a></li>
<li><a href="education.php">Education</a></li>
<li><a href="help-with-your-research.php">Help with your research</a></li>
<li><a href="archives-sector.php">Archives sector</a></li>
<li><a href="information-management.php">Information management</a></li>
<li><a href="#top">Back to top</a></li>
	</ul>
</div>
<div class="sitemap" id="top">
<?php
$url=file_get_contents('data/sitemap.xml');
$xml=new SimpleXMLElement($url);

if (isset($_GET['section'])) {
$path = $_GET['section'];

}else{

echo ("Please select a link from the navigation to view the sitemap for that section.");


	die;
}


$items = array();
foreach($xml->url as $item) {
    $items[] = $item;
};

$nitems = array();

foreach ($items as $val) {

	 $clean = str_replace('http://www.nationalarchives.gov.uk/', '', $val->loc);

  if (strpos($clean, 'embed') === false && strpos($clean, 'wp-content') === false){


$nitems[] = $clean;

}
}

natcasesort($nitems);

$count = 0;


foreach ($nitems as $item) {

$count = substr_count($item, '/');

if (strpos($item, $path) !== false) {


$title = explode("/",$item);
$title = $title[count($title)-2];
$title = str_replace('-', ' ', $title);
$title = ucwords($title);


if ($count == 0)
{
	echo ("<a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'><i class='fas fa-home'></i> The National Archives homepage</a>");
}
elseif ($count == 1){

	$id = str_replace('/', '', trim($item, '/'));
	echo ("<div class='item item".$count."' id='".$id."'><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'  title='".$title." at level ".$count."'><div style='display:block;'>".$title."</div></a></div>");

}elseif ($count == 2){






		echo ("<div class='item item".$count."'> <i class='fas fa-level-up-alt'></i><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank' title='".$title." at level ".$count."'><div>".$title."<div class='count'>".$count."</div></div></a></div>");

}elseif ($count == 9 or $count == 8){




		echo ("<div class='item item".$count."'> <i class='fas fa-level-up-alt'></i><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'  title='".$title." at level ".$count."'><div>".$title."<div class='count'>4</div></div></a></div>");
}

else{

		echo ("<div class='item item".$count."'><i class='fas fa-level-up-alt'></i><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank' title='".$title." at level ".$count."'><div>".$title."<div class='count'>".$count."</div></div></a></div>");
}
}
};
?>
</div>
<script>
$(document).ready(function(){
  $("a").click(function(e){
    e.preventDefault();
 
    var id     = $(this).attr("href");
    var offset = $(id).offset();
 
    $("html, body").animate({
      scrollTop: offset.top -80
    }, 500);
  });
});


</script>

</body>
</html>