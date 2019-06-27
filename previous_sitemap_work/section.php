<!DOCTYPE html>
<html>
<head>
	<?php

// Title: Sitemap level view
// Descripton: A simple xml, css and php application to display a strutured view of a sitemap. Nothing fancy here and mostly for at-a-glance IA appreciation.
// Author: Simon Wilkes
// Date: May 2018

	
if (isset($_GET['section'])) { 	// Check if the querystring 'section' is set
$path = $_GET['section']; //  Set as variable called $path
$pagetitle  = str_replace('/', '', $path); // Trim forward slashes (this will be used for the page title)
$pagetitle  = str_replace('-', ' ', $pagetitle); // Trim hypens
$pagetitle = ucwords($pagetitle); // Uppercase first letters of each word to make it readable
$path = $path."/";  // Add the trailing forward slash for querying the xml
}

?>
<title>Sitemap - <?php echo($pagetitle);?> </title>
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
div.sitemap {width: 100%; max-width: 90%; margin: 0 auto ; text-align: center;position: relative;padding-top:80px; display: flex; flex-direction: row; flex: 1; }

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
	display:block;
	padding:5px;
	text-align: center;
}

.item1{
	padding-left:10px;
}
.item1 a,.level-1{
	background-color: #F9690E;
	padding:5px;
	border-radius: .2em;

}
.item2{
	padding-top:100px;


}
.item2 a,.level-2{
	background-color: #ECF0F1;
	padding:5px;
	border-radius: .2em;

}
.item3{
	padding-top:180px;

}

.item3 a,.level-3{
	background-color: #D2D7D3;
	padding:5px;
	border-radius: .2em;
}
.item4, .item9,.item8{
	padding-top:230px;
}

.item4 a, .item9 a, .item8 a, .level-4, .level-9, .level-8{
	background-color: #BDC3C7;
	padding:5px;
	border-radius: .2em;

}
.item5{
	padding-top:280px;
}
.item5 a, .level-5{
	background-color: #95A5A6;
	padding:5px;
	border-radius: .2em;
}
.item6{
	padding-top:330px;
}
.item6 a, .level-6{
	background-color: #6C7A89;
	padding:5px;
	border-radius: .2em;
}
.item7{
	padding-top:380px;
}
.item7 a, .level-7{
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
	color: #fff;
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
	border-right:1px solid #fff;
	padding-right:10px;
}
.nav ul li:first-of-type{
	border-right:none;
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
.item-link{
	padding:10px;
	width:auto;
	min-width: auto;
	margin:5px;
}

.level-1{
	text-align: center;
	margin-top: 10px;
	margin-bottom: 10px;
}
.level-2{
	text-align: center;
	margin-top: 10px;
	margin-bottom: 10px;
}
.level-3, .level-4, .level-5, .level-6, .level-7{
	display: block;
	text-align: center;
	margin-top: 10px;
	margin-bottom: 10px;
	width:auto;
	min-width:auto;
}

@media only screen and (max-width: 768px) {
	div.sitemap {padding-top:220px;}

}


</style>


</head>

<body>


	<div class="nav">

		<ul>
			<li> Sitemap: </li>
			<li><a href="treeview.php">Treeview</a></li>
			<li><a href="section.php?section=about" <?php if ($path == "about/"){ echo ("id='on'");}?>>About</a></li>
			<li><a href="section.php?section=education" <?php if ($path == "education/"){ echo ("id='on'");}?>>Education</a></li>
			<li><a href="section.php?section=help-with-your-research" <?php if ($path == "help-with-your-research/"){ echo ("id='on'");}?>>Help with your research</a></li>
			<li><a href="section.php?section=archives-sector" <?php if ($path == "archives-sector/"){ echo ("id='on'");}?>>Archives sector</a></li>
			<li><a href="section.php?section=information-management" <?php if ($path == "information-management/"){ echo ("id='on'");}?>>Information management</a></li>
		</ul>
	</div>
	<div class="sitemap" id="top">
		<?php
$url=file_get_contents('data/sitemap.xml'); 	// Load xml
$xml=new SimpleXMLElement($url); // Creat xml object

if (!$path){

	echo ("Please select a link from the navigation to view the sitemap for that section.");


	die;
}


$items = array(); // Create an array for the url parts of the data
foreach($xml->url as $item) { //Loop through urls
    $items[] = $item; // Add urls to array
};

$nitems = array(); //Create another array of locations from the url data

foreach ($items as $val) {

	 $clean = str_replace('http://www.nationalarchives.gov.uk/', '', $val->loc); // Remove domain name from the location


// Remove urls with unneeded contents e.g. embed codes, WordPress images, document folders and so on
	 if (strpos($clean, 'embed') === false && strpos($clean, 'wp-content') === false && strpos($clean, 'documents') === false){


$nitems[] = $clean; // Add clean items to the array

}
}

natcasesort($nitems); // Sort the clean items array alphabetically

$count = 0; //Set a counter for calculating the level depth by forward slashes



foreach ($nitems as $item) {  //Loop through each location

$count = substr_count($item, '/'); // Count the forward slashes to define level numbers


// Check if the locaton starts with the $path variable
if (strpos($item, $path) === 0) { 

//Create the remote page title taking the last part of the url and normalising it

	$title = explode("/",$item);
	$title = $title[count($title)-2];
	$title = str_replace('-', ' ', $title);
	$title = ucwords($title);

// If location is at level 0 then we can assume it's the homepage

// N.B. Styling for each level is set by appending the counter to an item class. In the style block above classes are set for item1 to item9. The counter is also printed to show the level in each item.

	if ($count == 0)
	{
		echo ("<a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'><i class='fas fa-home'></i> The National Archives homepage</a>");
	}
	elseif ($count == 1){

	// Level 1 pages such as About, Education and Help with your research

		$id = str_replace('/', '', trim($item, '/'));
		echo ("<div class='item item".$count."' id='".$id."'><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'  title='".$title." at level ".$count."'><div style='display:block;'>".$title."</div></a></div>");

	}elseif ($count == 2){

    // Level 2 - second level pages

		echo ("<div class='item item".$count."'> <i class='fas fa-level-up-alt'></i><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank' title='".$title." at level ".$count."'><div>".$title."<div class='count'>".$count."</div></div></a></div>");

	}elseif ($count == 9 or $count == 8){

// Items at level 8 or 9 are urls with querystrings containing duplicate paths. Reset these to level 4.

		echo ("<div class='item item".$count."'> <i class='fas fa-level-up-alt'></i><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank'  title='".$title." at level ".$count."'><div>".$title."<div class='count'>4</div></div></a></div>");
	}

	else{

// Everything else 
		echo ("<div class='item item".$count."'><i class='fas fa-level-up-alt'></i><a href='http://www.nationalarchives.gov.uk/".$item."' target='_blank' title='".$title." at level ".$count."'><div>".$title."<div class='count'>".$count."</div></div></a></div>");


	}
}
};
?>
</div>


</body>
</html>