<?php include "sections/header.php"; ?>
<div class="container " >
<div class="row mt-3">
    <?php
if($_GET)
$catid=$_GET['code'];
$category=$dbpdo->query("select * from categories where id='$catid'")->fetch(PDO::FETCH_OBJ);
$catname=$category->catname;
    echo "<h3 class='my-3'>Showing Articles in Category $catname</h3>";
        
           
                 $articles=$dbpdo->query("SELECT a.*,b.catname,c.authname FROM `articles` as a,categories as b,authors as c where a.catid=b.id and a.authorid=c.id  and a.catid='$catid' ")->fetchAll(PDO::FETCH_OBJ);  
foreach($articles as $index=>$article)
{

	$c=$index+1;


$newdate=date("d,F Y",strtotime($article->date));  
$chotatitle=substr($article->title,0,30);  
$shortdescription=substr($article->content,0,50);  
 
echo "                       

									<div class='col-md-4 mb-3'>
									<a href='showarticle.php?id=$article->id'>	
                            <img src='$article->photo' class='w-100'>
                            </a>

                                        <a href='showarticle.php?id=$article->id'>$chotatitle ...</a>
                                        <div class='lf-post-fback'>
                                            <span><i class='fa fa-clock-o'></i>$newdate</span>
                                            <span><i class='fa fa-heart'></i>145</span>
                                            <span><i class='fa fa-comment'></i>34</span>
                                        </div>
                                        <p class='df-text'>$shortdescription </p>
                           
                                    </div>
                                    
                                    
                                        
                                


                                ";

                                if($c%3==0) echo "</div><div class='row'>";

                            }

    

?>

</div>	

<?php include "sections/footer.php"; ?>