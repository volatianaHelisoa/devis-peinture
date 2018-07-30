<?php

get_header(); 

$category = get_the_category();
$category_id = $category[0]->cat_ID;
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


$blogs = CBlog::getBy($category_id ,9,$paged);

var_dump($category_id);
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
                	<h1><?php single_cat_title(); ?></h1>
                    <div class="text">
                    	<p><?php echo category_description($category_id); ?></p>
                    </div>
                    <div class="listing-blog clearfix row">
                        
                    <?php
                 
                    foreach ($blogs as $post) :  ?>
                    <div class="col-md-4 col-xs-6">
                            <div class="item">
                                <img src="<?php echo CBlog::getArticleImage($post->thumbnail,'blog-detail'); ?>" alt="<?php echo $post->title; ?>">
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