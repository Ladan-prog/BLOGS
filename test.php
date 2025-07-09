<?php  
include "db.php";
$articles=$dbpdo->query("select * from articles")->fetchAll(PDO::FETCH_OBJ);
foreach($articles as $article)
{
	$id=$article->id;
	$title=$article->title;
	$words=explode(" ",$title);
	foreach($words as $index=>$word)
	{
		if(strlen($word)<4) unset($words[$index]);
	}
	$tags=array_values($words);
	$tagstring=implode(",",$tags);
		echo $tagstring,"<br>";
	$q="update articles set tags='$tagstring' where id='$id'";
	$s=$dbpdo->prepare($q);
	$s->execute();


}


?>