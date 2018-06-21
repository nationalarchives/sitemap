function parseSitemap(){
    var parser = new DOMParser();
    var doc = parser.parseFromString('data/sitemap.xml', 'text/xml');
    console.log(doc.toString())
}
parseSitemap();

/*
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


        }*/