<?php
require 'vendor/autoload.php';
use Goutte\Client;
$client=new Client();
include "db.php";
// $website=$client->request("GET","https://propakistani.pk/");


$links=$website->filter('.tnews-inner')->each(function ($link) {
    	$page=$link->filter(".tmbox")->attr("href");
        return $page;
        });

foreach($links as $link)
{
$page=$client->request("GET",$link);
$title=$page->filter(".entry-title")->text();


// $article=$dbpdo->query("select * from articles  where title like '%$title%'")->fetch(PDO::FETCH_OBJ);
// if(!$article)
{
$image=$page->filter(".single-featured-wrap img")->attr("src");
$text=$page->filter('.the-post-content p')->each(function ($para) {
        $content=$para->filter("p")->text();
        return $content;
        });
    
$string=implode("<p>", $text);
$parts=explode("📢",$string);
$content=$parts[0];
$parts=explode("/",$image);
$last=count($parts)-1;
$newimage=$parts[$last];
$photo="uploads/".$newimage;



copy($image,$photo);
$date=date("Y-m-d");
echo "<h1>$title</h1>";
echo "<h6>Posted on $date</h6>";
echo "<img src='$photo'>";
echo $content;

$category=$dbpdo->query("SELECT * FROM `categories` order by rand() limit 1")->fetch(PDO::FETCH_OBJ);
$catid=$category->id;

$author=$dbpdo->query("SELECT * FROM `authors` order by rand() limit 1")->fetch(PDO::FETCH_OBJ);
$authorid=$author->id;


$words=explode(" ",$title);
        foreach($words as $index=>$word)
        {
                if(strlen($word)<4) unset($words[$index]);
        }
        $tags=array_values($words);
        $tagstring=implode(",",$tags);

$q="insert into articles(`id`,`date`,`catid`,`authorid`,`title`,`content`,`photo`,`tags`) 
values(null,'$date','$catid','$authorid','$title',\"$content\",'$photo','$tagstring')";
$s=$dbpdo->prepare($q);
$s->execute();  
}

 
}



?>