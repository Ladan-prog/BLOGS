<?php include "sections/header.php";?>
    <div class="slider-post-area clearfix">
            <div class="full-wide-slider">
               
<?php 
$article=$dbpdo->query("SELECT a.*,b.catname,c.authname FROM `articles` as a,categories as b,authors as c where a.catid=b.id and a.authorid=c.id  and catid<>6 order by id DESC limit 1")->fetch(PDO::FETCH_OBJ);  

$newdate=date("d,F Y",strtotime($article->date));
echo " <div class='sl-post-item-area mainarea'>
<a href='showarticle.php?id=$article->id'>
                    <img src='$article->photo' alt='slider image'>
                    </a>
                    <div class='slider-text'>
                        <a class='sl-post-cat' href='#'>$article->catname</a>
                        <a href='showarticle.php?id=$article->id' class='sl-post-title'>
$article->title
                        </a>
                        <div class='meta-autor'>
                           
                            <div class='meta-tag-area'>
                                <span class='author-name'>$article->authname</span>
                                <span><i class='fa fa-clock-o'></i>$newdate</span>
                                <span><i class='fa fa-heart'></i>124</span>
                                <span><i class='fa fa-comment'></i>16</span>
                            </div>
                        </div>
                    </div>
                </div>";


?>
            </div>
            <div class="colm-three-slider">
                

              <?php
$articles=$dbpdo->query("SELECT a.*,b.catname,c.authname FROM `articles` as a,categories as b,authors as c where a.catid=b.id and a.authorid=c.id  and catid<>6  order by id DESC limit 1,3")->fetchAll(PDO::FETCH_OBJ);
foreach($articles as $article)
{
    $newdate=date("d,F Y",strtotime($article->date));
echo "  <div class='sl-post-item-area area1'>
<a href='showarticle.php?id=$article->id'>
                    <img src='$article->photo' alt='slider image'>
                    </a>
                    <div class='slider-text sm-slider-text'>
                        <a class='sl-post-cat' href='#'>$article->catname</a><br>
                        <a href='showarticle.php?id=$article->id' class='sl-post-title'>
                        $article->title
                        </a>
                        <div class='clearfix'></div>
                        <div class='meta-autor'>
                            <div class='meta-tag-area'>
                                <span><i class='fa fa-clock-o'></i>$newdate</span>
                                <span><i class='fa fa-heart'></i>124</span>
                                <span><i class='fa fa-comment'></i>16</span>
                            </div>
                        </div>
                    </div>
                </div>
             ";
         }


              ?>




</div>

    </div>
    <!-- slider post area end -->
    <!-- twich-content area start -->
    <div class="twich-content-area">
        <div class="container">
            <div class="row">
                <!-- left content area start -->
                <div class="col-md-8 col-sm-8">
                    <!-- letest-news-area start -->
                    <div class="letest-news-area">
                        <div class="section-top-bar">
                            <h4>Latest News</h4>
                            <ul>
                                

                     <?php 
$categories=$dbpdo->query("Select * from categories where id<=5")->fetchAll(PDO::FETCH_OBJ);
foreach($categories as $category) 
    if($category->id==1)
             echo  " <li role='presentation' class='active'><a   href='#tab$category->id' aria-controls='travel' role='tab' data-toggle='tab'>$category->catname</a></li>";
         else
             echo  " <li role='presentation' ><a   href='#tab$category->id' aria-controls='travel' role='tab' data-toggle='tab'>$category->catname</a></li>";

              ?>            
                                
                             
                               
                            </ul>
                        </div>
                        <div class="row tab-content">
                            <!-- ln single item start -->
<?php  
for($i=1;$i<=5;$i++)
{
    $customid="tab".$i;


if($i==1)
                     echo"<div class='letest-news tab-pane fade in active' role='tabpanel' id='$customid'>
                                <div class='col-md-6 col-sm-6'>";
                                else
                                    echo"<div class='letest-news tab-pane ' role='tabpanel' id='$customid'>
                                <div class='col-md-6 col-sm-6'>";






 
$article=$dbpdo->query("SELECT a.*,b.catname,c.authname FROM `articles` as a,categories as b,authors as c where a.catid=b.id and a.authorid=c.id   and catid=$i order by date DESC limit 1")->fetch(PDO::FETCH_OBJ);  

$newdate=date("d,F Y",strtotime($article->date));
$para=substr($article->content,0,300);


                               echo "     
                                    <div class='lt-single-post'>
                                     <div class='single-lt-thumb'>
                                     <a href='showarticle.php?id=$article->id'>
                                            <img src='$article->photo' alt='post thumbnail'>
                                            </a>
                                            <div class='lt-thumb-desc'>
                                                <a class='ln-post-cat' href='#'>$article->catname</a>
                                                <div class='meta-autor'>
                                                    <div class='meta-tag-area'>
                                                        <span><i class='fa fa-clock-o'></i>$newdate</span>
                                                        <span><i class='fa fa-heart'></i>124</span>
                                                        <span><i class='fa fa-comment'></i>16</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <a class='lt-snlg-title' href='showarticle.php?id=$article->id'>$article->title.</a>
                                        <p class='df-text'>$para</p>
                                    </div>";
                                   



echo "</div>
      <div class='col-md-6 col-sm-6'>";

                    
                      $articles=$dbpdo->query("SELECT a.*,b.catname,c.authname FROM `articles` as a,categories as b,authors as c where a.catid=b.id and a.authorid=c.id  and catid=$i order by date DESC limit 1,6")->fetchAll(PDO::FETCH_OBJ);  
foreach($articles as $article)
{


$newdate=date("d,F Y",strtotime($article->date));  
$chotatitle=substr($article->title,0,30);            
                                    
                                   echo " <div class='list-post-item'>
                                   <a href='showarticle.php?id=$article->id'>
                                        <img src='$article->photo' alt='post thumb'>
                                        </a>
                                       

                                        <div class='lt-post-desc'>
                                            <a href='showarticle.php?id=$article->id'>$chotatitle</a>
                                            <p><i class='fa fa-clock-o'></i>$newdate</p>
                                        </div>
                                    </div>";
                                }
                          
                                   
                                    
                                    
                                    
                              echo "</div>
                            </div>";



                        }
                    ?>
                            <!-- ln single item end -->
                            <!-- ln single item start -->
                            <div class="letest-news tab-pane fade" role="tabpanel" id="travel">
                                <div class="col-md-6 col-sm-6">
                                    <div class="lt-single-post">
                                        <div class="single-lt-thumb">
                                            <img src="img/post-img/single-list-post1.jpg" alt="post thumbnail">
                                            <div class="lt-thumb-desc">
                                                <a class="ln-post-cat" href="#">travel</a>
                                                <div class="meta-autor">
                                                    <div class="meta-tag-area">
                                                        <span><i class="fa fa-clock-o"></i>06, August 2017</span>
                                                        <span><i class="fa fa-heart"></i>124</span>
                                                        <span><i class="fa fa-comment"></i>16</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="lt-snlg-title" href="#">21 Treats That Will Make Your Kid's Summer The Coolest Ever.</a>
                                        <p class="df-text">Precariously positioned on the banks of both the IJ Bay and the Amstel River headwaters, Amsterdam made an early mark on the world with its dominant seafaring fleet and colonial aspirations in the 17th</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="list-post-item">
                                        <img src="img/post-img/list-post-img5.jpg" alt="post thumb">
                                        <div class="lt-post-desc">
                                            <a href="#">7 Ridiculously Good Five-Ingredient Desserts</a>
                                            <p><i class="fa fa-clock-o"></i>07, August 2017</p>
                                        </div>
                                    </div>
                                    <div class="list-post-item">
                                        <img src="img/post-img/list-post-img1.jpg" alt="post thumb">
                                        <div class="lt-post-desc">
                                            <a href="#">Here's How To Grocery Shop And Make Lunch</a>
                                            <p><i class="fa fa-clock-o"></i>07, August 2017</p>
                                        </div>
                                    </div>
                                    <div class="list-post-item">
                                        <img src="img/post-img/list-post-img4.jpg" alt="post thumb">
                                        <div class="lt-post-desc">
                                            <a href="#">7 Ridiculously Good Five-Ingredient Desserts</a>
                                            <p><i class="fa fa-clock-o"></i>07, August 2017</p>
                                        </div>
                                    </div>
                                    <div class="list-post-item">
                                        <img src="img/post-img/list-post-img2.jpg" alt="post thumb">
                                        <div class="lt-post-desc">
                                            <a href="#">7 Ridiculously Good Five-Ingredient Desserts</a>
                                            <p><i class="fa fa-clock-o"></i>07, August 2017</p>
                                        </div>
                                    </div>
                                    <div class="list-post-item">
                                        <img src="img/post-img/list-post-img3.jpg" alt="post thumb">
                                        <div class="lt-post-desc">
                                            <a href="#">7 Ridiculously Good Five-Ingredient Desserts</a>
                                            <p><i class="fa fa-clock-o"></i>07, August 2017</p>
                                        </div>
                                    </div>
                                    <div class="list-post-item">
                                        <img src="img/post-img/list-post-img6.jpg" alt="post thumb">
                                        <div class="lt-post-desc">
                                            <a href="#">7 Ridiculously Good Five-Ingredient Desserts</a>
                                            <p><i class="fa fa-clock-o"></i>07, August 2017</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ln single item end -->
                        </div>
                    </div>
                    <!-- letest-news area end -->
                   

                    <!-- life style start -->


                    <div class="top-bar-slider ls-slider owl-carousel">
                        <div class="lifestyle-slider-item">
                            <div class="section-top-bar">
                                <h4>Tech and Telecom</h4>
                            </div>
                            
                            <div class="row">

           <?php
           
                 $articles=$dbpdo->query("SELECT a.*,b.catname,c.authname FROM `articles` as a,categories as b,authors as c where a.catid=b.id and a.authorid=c.id  and catid=6 limit 10")->fetchAll(PDO::FETCH_OBJ);  
foreach($articles as $index=>$article)
{
$newdate=date("d,F Y",strtotime($article->date));  
$chotatitle=substr($article->title,0,30);  
$shortdescription=substr($article->content,0,300);  
echo "                           
                                <div class='lifestyle-post-item'>
                                    <div class='col-md-4 col-sm-4 col-xs-12'>
                                    <a href='showarticle.php?id=$article->id'>
                                        <img src='$article->photo' alt='post thumb'>
                                    </a>
                                    </div>
                                    <div class='col-md-8 col-sm-8 col-xs-12'>
                                        <a href='showarticle.php?id=$article->id'>$chotatitle ...</a>
                                        <div class='lf-post-fback'>
                                            <span><i class='fa fa-clock-o'></i>$newdate</span>
                                            <span><i class='fa fa-heart'></i>145</span>
                                            <span><i class='fa fa-comment'></i>34</span>
                                        </div>
                                        <p class='df-text'>$shortdescription </p>
                                    </div>
                                </div>";

    $id=$index+1;                        

if($id%5==0 && $id<10)                             
              echo "                 </div>


                        </div>
                        <div class='lifestyle-slider-item'>
                            <div class='section-top-bar'>
                                <h4>Tech and Telecom</h4>
                            </div>
                            <div class='row'>";

                           
                             
}
                            ?>

                            </div>
                        </div>
                    </div>


                    <!-- life style slider end -->
                </div>
                <!-- left content area start -->
                <!-- right section area start -->
                <div class="col-md-4 col-sm-4">
                    <!-- side bar area start -->
                    <div class="side-bar">
                        <!-- widget-social area start -->
                        <div class="widget widget-social">
                            <div class="widget-fb">
                                <i class="dblue fa fa-facebook"></i>
                                <h4>4,000</h4>
                                <h6>Fans</h6>
                            </div>
                            <div class="widget-twitter">
                                <i class="wblue fa fa-twitter"></i>
                                <h4>3,000</h4>
                                <h6>Followers</h6>
                            </div>
                            <div class="widget-g-plus">
                                <i class="red fa fa-youtube-play"></i>
                                <h4>2,000</h4>
                                <h6>Subscriber</h6>
                            </div>
                        </div>
                        <!-- widget-social area end -->
                        <!-- widget most populer area start -->
                        <div class="widget widget-most-populer">
                            <!-- top-bar-slider start -->
                            <div class="top-bar-slider owl-carousel">
                                <div class="most-slider-item">
                                    <div class="section-top-bar">
                                        <h4>MOST POPULAR</h4>
                                    </div>

<?php                           
$articles=$dbpdo->query("SELECT a.*,b.catname,c.authname FROM `articles` as a,categories as b,authors as c where a.catid=b.id and a.authorid=c.id  and catid=2 order by a.date limit 16")->fetchAll(PDO::FETCH_OBJ);
foreach($articles as $index=>$article)
{
$newdate=date("d,F Y",strtotime($article->date));  
$chotatitle=substr($article->title,0,30);  
  
echo "                           

                                    <div class='list-post-item'>
                                    <a href='showarticle.php?id=$article->id'>
                                        <img src='$article->photo' alt='post thumb'>
                                        </a>
                                        <div class='lt-post-desc'>
                                            <a href='showarticle.php?id=$article->id'>$chotatitle</a>
                                            <p><i class='fa fa-clock-o'></i>$newdate</p>
                                        </div>
                                    </div>";
                                                     
$id=$index+1;               
if($id%8==0 && $id<=16)    
echo"                               
                                </div><!-- single item end -->
                                <div class='most-slider-item'>
                                    <div class='section-top-bar'>
                                        <h4>Weakly POPULAR</h4>
                                    </div>";
}
                         
?>  
                               
                                </div><!-- single item end -->
                            </div><!-- top-bar slider end -->
                        </div>
                        <!-- widget most populer area end -->
                        <!-- widget banner area start -->
                        <div class="widget widget-banner">
                            <a href="#"><img src="img/banner/header-sidebar-banner1.jpg" alt="banner"></a>
                        </div>
                        <!-- widget banner area end -->
                        <!-- subscription area start -->
                        <div class="widget widget-subscribe">
                            <div id="output">
                            <h4>Stay Updated</h4>
                            <p>Sign up for our newsletter to receive the latest news and event postings.</p>
                            <div class="widget_wysija_cont">
                                <form id="clientform" class="validate" target="_blank" novalidate="">
                                    <input placeholder="Your email"  id="email" type="email">
                                    <button type=submit  name="subscribe"><i class="fa fa-envelope"></i></button>
                                </form>
                            </div>
                        </div>
                        </div>
                        <!-- subscription area end -->
                    </div>
                    <!-- side bar area end -->
                </div>
                <!-- right section area end -->
            </div>
        </div>
    </div>
    <!-- twich-content area end -->
  <!-- letest video area start -->
    <div class="letest-video-area">
        <div class="container">
            <div class="letest-video">
                <h1>latest video</h1>
                <a class="view-all" href="#">view all</a>
                <div class="lt-video-slider owl-carousel">
  <?php      

$videoes=$dbpdo->query("SELECT * from videos")->fetchAll(PDO::FETCH_OBJ);  
foreach($videoes as $video)
{
    $newdate=date("d,F Y",strtotime($video->date));  
    $photo="https://img.youtube.com/vi/".$video->code."/hqdefault.jpg";
    $videourl="https://www.youtube.com/watch?v=".$video->code;

  echo "            
                    
                    <div class='lt-video-item'>
                        <div class='ltv-thumb'>
                            <img src='$photo' alt='video thumbnail'>
                            <a class='lt-video' href='$videourl'><i class='fa fa-play'></i></a>
                        </div>
                        <div class='cmn-tag-area'>
                            <span><i class='fa fa-clock-o'></i>$newdate</span>
                            <span><i class='fa fa-eye'></i>15k</span>
                            <span><i class='fa fa-heart-o'></i>278</span>
                        </div>
                        <a href='#''>$video->title</a>
                    </div>";

                }


                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- letest video area end -->

    <!-- fitness area start -->
    <div class="fitness-area" style="margin-top:50px">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-top-bar">
                        <h4>Fitness</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ft-slider-area">

<?php
$articles=$dbpdo->query("SELECT a.*,b.catname,c.authname FROM `articles` as a,categories as b,authors as c where a.catid=b.id and a.authorid=c.id  and catid=7 order by a.date limit 2")->fetchAll(PDO::FETCH_OBJ);  
foreach($articles as $index=>$article)
{
    $newdate=date("d,F Y",strtotime($article->date));  
 

               echo"   <div class='col-md-6 col-sm-6 col-xs-12'>
                        <div class='ft-slider-item'>
                        <a href='showarticle.php?id=$article->id'>
                            <img src='$article->photo' alt='slider image'>
                            </a>
                            <div class='ft-slider-text'>
                                <a class='sl-post-cat' href='#'>$article->catname</a><br>
                                <a href='showarticle.php?id=$article->id' class='sl-post-title'>$article->title</a>
                                <div class='clearfix'></div>
                                <div class='meta-tag-area'>
                                    <span><i class='fa fa-clock-o'></i>$newdate</span>
                                    <span><i class='fa fa-heart'></i>124</span>
                                    <span><i class='fa fa-comment'></i>16</span>
                                </div>
                            </div>
                        </div>
                    </div>";

                }

           ?>

                </div>
            </div>
        </div>
    </div>
    <!-- fitness area end -->
     
   <?php include "sections/footer.php";?>

<script>  

        $(document).on("click","#search-btn",function() {
           
        $("#search").focus();
    })
   $("#clientform").submit(function(e){
    e.preventDefault();
   email=$("#email").val();
  $.post("addemail.php",{email},function(){

        $("#output").html("<h5>You are Added Successfully in the List</h5>");
   });
   });
</script>