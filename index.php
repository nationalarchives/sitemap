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
margin-top:5px;
margin-bottom:5px;
	display: block;
	width:auto !important;

}
a:hover{
	text-decoration: underline;
}
div.sitemap {width: auto; max-width: 800px; margin: 0 auto ; text-align: center;position: relative;padding-top:80px; display: flex; flex-direction: column;}


div.sitemap div:hover{
	opacity: 0.8;
}
div.sitemap div{
	opacity: 1.0;
}
.fa-level-up-alt{
	transform: rotate(90deg);
	float:left;
	margin-left: 5px;
}
span{
	color:#333;

}
.clear{
	clear: both;
}
.item1{
background-color:#F9690E;

display:inline-block;
width:auto;
max-width: auto;
margin-bottom:5px;
color:#fff;
padding:5px;
border-radius: .5em;
}
.item2{
background-color:#808080;
width:auto;
max-width: auto;
margin-top: 10px;
margin-bottom:10px;
display: inline-block;
padding:5px;
border-radius: .5em;
}
.item3{
background-color:#A9A9A9;
display:inline-block;
width:auto;
max-width: auto;
margin-left:auto;
margin-right: auto;
padding:5px;
border-radius: .5em;

}
.item4{
background-color:#C0C0C0;
display:inline-block;
width:auto;
max-width: auto;
margin-left:auto;
margin-right: auto;
padding:5px;
border-radius: .5em;

}
.item5{
background-color:#D3D3D3;
display:inline-block;
width:auto;
max-width: auto;
margin-left:auto;
margin-right: auto;

}
.item6{
background-color:#DCDCDC;
display:inline-block;
width:auto;
max-width: auto;
margin-left:auto;
margin-right: auto;

}
.count{
	width:25px;
	float:right;
right:0;
	color:#fff;
	padding:2px;
	background-color: rgba(0,0,0,.5);
	border-radius: 50%;
	margin-right:5px;


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
}

.nav a{
	color:#fff;
}

@media only screen and (max-width: 768px) {
   div.sitemap {padding-top:220px;}

}
</style>
</head>

<body>
<div class="nav">
	<ul>
<li><a href="#about">About us</a></li>
<li><a href="#education">Education</a></li>
<li><a href="#help-with-your-research">Help with your research</a></li>
<li><a href="#archives-sector">Archives sector</a></li>
<li><a href="#information-management">Information management</a></li>
<li><a href="#top">Back to top</a></li>
	</ul>
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
	echo ("<div class='item".$count."' id='".$id."'><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'><div style='display:block;'>".ucfirst($item)."</div></a></div>");

}elseif ($count == 2){




		echo ("<div class='item".$count."'><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'><div>".$item."<div class='count'>".$count."</div></div></a></div>");
}else{

//echo ("<div class='item".$count."'><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'><div style='margin-left:".intval($count * 10)."px;padding-left:5px;'>".$item."(".$count.")</div></a></div><i class='fas fa-long-arrow-alt-down'></i>");


		echo ("<span>&boxv;</span><br><div class='item".$count."'><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'><div>".$item."<div class='count'>".$count."</div></div></a></div>");
}

echo ("<div class='clear'></div>");
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