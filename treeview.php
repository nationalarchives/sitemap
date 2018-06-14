<!DOCTYPE html>
<html>
<head>
	<?php
// Title: Sitemap treeview
// Descripton: A simple xml, css and php application to display a strutured view of a sitemap. Nothing fancy here and mostly for at-a-glance IA appreciation.
// Author: Simon Wilkes
// Date: May 2018

	?>
<title>Sitemap - treeview</title>
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
div.sitemap {width: 100%; max-width: 90%; margin: 0 auto ; text-align: left;position: relative;padding-top:120px;}


div.sitemap div:hover{
background-color: #ECF0F1;
}
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
	border-bottom:1px solid #bbb;
	display:block;
}
.item1{
padding-left:10px;
background-color: #F9690E;
}
.item2{
background-color: #ECF0F1;
padding-left:20px;
}
.item3{
background-color: #D2D7D3;
padding-left:40px;
}
.item4, .item9,.item8{
	background-color: #BDC3C7;
	padding-left:60px;
}
.item5{
	background-color: #95A5A6;
padding-left:80px;
}
.item6{
	background-color: #6C7A89;
padding-left:100px;
}
.item7{
		background-color: #D2D7D3;
padding-left:120px;
}
.count{
display:inline-block;
color:#000;
margin-left:10px;


}
.nav{
	width:100%;
	background-color: #000;
	color:#fff;
	position: fixed;
	z-index: 1000;
	margin:0;
	padding:0;
	text-align: center;
}

	.nav ul{
	list-style-type: none;
	margin-bottom: 0;
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
.nav ul li:last-of-type{
	border-right:none;
}
.nav a{
	color:#fff;
}
.nav #on, .nav a:hover{
	color:#F9690E !important;
}
.subnav{
	background-color: #808080;
}
.subnav ul{
	list-style-type: none;
}
.subnav ul li{
	display: inline-block;
	font-size: .8em;
}
@media only screen and (max-width: 768px) {
   div.sitemap {padding-top:270px;}

}


</style>


</head>

<body>
<div class="nav">
<ul>
			<li> Sitemap: </li>
		<li><a href="treeview.php" id="on">Treeview</a></li>
<li><a href="section.php?section=about">About</a></li>
<li><a href="section.php?section=education">Education</a></li>
<li><a href="section.php?section=help-with-your-research">Help with your research</a></li>
<li><a href="section.php?section=archives-sector">Archives sector</a></li>
<li><a href="section.php?section=information-management">Information management</a></li>
<li><a href="#top">Back to top</a></li>
	</ul>
	<div class="subnav">
		<ul>
			<li>Jump to:</li>
<li><a href="#about">About</a></li>
<li><a href="#education">Education</a></li>
<li><a href="#help-with-your-research">Help with your research</a></li>
<li><a href="#archives-sector">Archives sector</a></li>
<li><a href="#information-management">Information management</a></li>
</ul>
	</div>
</div>
<div class="sitemap" id="top">
<?php
$url=file_get_contents('data/sitemap.xml');
$xml=new SimpleXMLElement($url);






// foreach($xml->url as $val)
//  {

// $clean = str_replace('http://www.nationalarchives.gov.uk', '', $val->loc).'<br>';

// if (strpos($clean, '/about/') !== false) {

//     echo $clean;
// }

//  }



$items = array();
foreach($xml->url as $item) {
    $items[] = $item;
};

$nitems = array();

foreach ($items as $val) {

	 $clean = str_replace('http://www.nationalarchives.gov.uk/', '', $val->loc);

  if (strpos($clean, 'embed') === false && strpos($clean, 'wp-content') === false){

// echo ("->".$clean);
// }

// $newurl = $clean;

// $chunks = array_filter(explode('/', $newurl));
// $chunks = implode(' &gt; ', $chunks);

//echo ("<a href='".$val->loc."'>".$chunks."</a><br>");

$nitems[] = $clean;

//echo str_replace('/', ' &gt;&gt; ', trim($newurl, '/'));

}
}

natcasesort($nitems);
//array_multisort(array_map('strlen', $nitems), $nitems);
$count = 0;




foreach ($nitems as $item) {

$count = substr_count($item, '/');



if ($count == 0)
{
	echo ("<a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'><i class='fas fa-home'></i> The National Archives homepage</a>");
}
elseif ($count == 1){

	$id = str_replace('/', '', trim($item, '/'));
	echo ("<div class='item item".$count."' id='".$id."'><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'  title='Level ".$count."'><div style='display:block;'>".ucfirst($item)."</div></a></div>");

}elseif ($count == 2){




		echo ("<div class='item item".$count."'><i class='fas fa-level-up-alt'></i><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'  title='Level ".$count."'><div>".$item."<div class='count'>".$count."</div></div></a></div>");

}elseif ($count == 9 or $count == 8){




		echo ("<div class='item item".$count."'><i class='fas fa-level-up-alt'></i><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'  title='Level 4'><div>".$item."<div class='count'>4</div></div></a></div>");
}

else{

//echo ("<div class='item".$count."'><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'><div style='margin-left:".intval($count * 10)."px;padding-left:5px;'>".$item."(".$count.")</div></a></div><i class='fas fa-long-arrow-alt-down'></i>");


		echo ("<div class='item item".$count."'><i class='fas fa-level-up-alt'></i><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank' title='Level ".$count."'><div>".$item."<div class='count'>".$count."</div></div></a></div>");
}

};
?>
</div>
<script>
$(document).ready(function(){
  $(".subnav a").click(function(e){
    e.preventDefault();
 
    var id     = $(this).attr("href");
    var offset = $(id).offset();
 
    $("html, body").animate({
      scrollTop: offset.top -93
    }, 500);
  });
});


</script>

</body>
</html>