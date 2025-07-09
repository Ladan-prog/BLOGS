<?php include "sections/header.php";
$id=$_GET['id'];
$article=$dbpdo->query("SELECT a.*,b.catname,c.authname FROM `articles` as a,categories as b,authors as c where a.catid=b.id and a.authorid=c.id  and a.id='$id'")->fetch(PDO::FETCH_OBJ);  

?>
    <div class="blog-post-slider">
        <div class="container">
            <div class="row">
                <div class="blg-slider-text">
                    <a href="#" class="blg-post-cat">home > <?php echo $article->catname?></a>
                    <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <a href="#" class="blog-post-title">
                 <?php echo $article->title?>           
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php echo $article->photo?>" alt="blog post image">
    </div>
    <!-- blog-post slider area end -->
    <!-- twich-content area start -->
    <div class="twich-content-area">
        <div class="container">
            <div class="row">
                <!-- blog post details area start -->
                <div class="blog-post-details clearfix">
                    <div class="col-md-8 col-md-offset-2 col-sm-12">
                        <p class="blog-text">
                            <?php echo $article->content?>
                        </p>
                   


                    <div class="bp-tag-area">
                            <h4>Tags</h4>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="bp-tags">
                                        
<?php
$tags=explode(",",$article->tags);
foreach($tags as $tag)
echo "<a href='searchresults.php?search=$tag'>$tag</a>";

    
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="bp-share-btn">
                                        <a href="#" class="share share-twitter"><i class="fa fa-twitter"></i>Tweet</a>
                                        <a href="#" class="share share-fb"><i class="fa fa-facebook"></i>Like <span class="total-like">731</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
 </div>
                </div>
            </div>
        </div>
    </div>
    

  
   
   <?php include "sections/footer.php";?>

