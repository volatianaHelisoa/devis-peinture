<?php
/*
Template Name: devispeinture-page

*/
get_header(); 
$pageid = get_the_id();
$p = get_post($pageid);
$blogs = CBlog::getBy(3,5);

?>
<main class="content-container">
			<div class="breadCrumb">
            	<div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div class="breadCrumbs">','</div>');
                } ?>
                </div>
            </div>
            <div class="container content">
             <div class="row">
               <div class="col-md-12">
                	<h1><?php echo $p->post_title; ?></h1>
                    <div class="text">
                    	<p><?php echo $p->post_content; ?></p>
                    </div>
                    <div class="listing-blog clearfix row">
                        
                    <?php
                 
                    foreach ($blogs as $post) :  ?>
                    <div class="col-md-4 col-xs-6">
                            <div class="item">
                                <img src="<?php echo CBlog::getArticleImage($post->thumbnail,'blog-small'); ?>" alt="<?php echo $post->title; ?>">
                                <div class="text white-bg">
                                    <a href="<?php echo $post->link; ?>" class="title"><?php echo $post->title; ?></a>
                                    <p><?php echo $post->extrait ?></p>
                                   
                                </div>
                            </div>
                        </div>
                        
                        <?php endforeach; ?>
                             
                                       
                    </div>
                    <div class="text-centered">
                        <div class="wp-pagenavi">
                        <?php wp_pagenavi(); ?>
                        </div>
                    </div>
                    
                </div>
              </div>
            </div>
        </main>
<?php

get_footer();