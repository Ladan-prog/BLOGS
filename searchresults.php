<?php include "sections/header.php"; ?>
<div class="container " >
<div class="row mt-3">
<?php
if($_REQUEST)
$search=$_REQUEST['search'];



        
           
                 $articles=$dbpdo->query("SELECT a.*,b.catname,c.authname FROM `articles` as a,categories as b,authors as c where a.catid=b.id and a.authorid=c.id  and title like '%$search%' ")->fetchAll(PDO::FETCH_OBJ);  
foreach($articles as $index=>$article)
{

	$c=$index+1;


$newdate=date("d,F Y",strtotime($article->date));  
$chotatitle=substr($article->title,0,30);  
$shortdescription=substr($article->content,0,50);  
 
echo "                       

									<div class='col-md-4 mb-3'>
									<a  href='showarticle.php?id=$article->id'>	
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
</div>

<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<?php include "sections/footer.php"; ?>