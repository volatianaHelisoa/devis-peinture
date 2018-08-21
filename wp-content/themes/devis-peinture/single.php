<?php
/*
Template Name: blog-detail
Template Post Type: post, page
*/
get_header(); 
$pageid = get_the_id();
$p = get_post($pageid);
$astuces = CBlog::getBy(2,2); 

?>
<main class="content-container detail">
			<div class="breadCrumb">
            	<div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div class="breadCrumbs">','</div>');
                } ?>
                </div>
            </div>
            <div class="container content">
            	<div class="col-md-12">
                	<h1><?php echo $p->post_title; ?></h1>
					<div class="row">
                        <div class="col-md-8 text">
                            <img src="<?php echo get_the_post_thumbnail_url($p,'blog-detail'); ?>" alt="<?php the_title(); ?>">
                            <p><?php echo $p->post_content; ?></p>                                                      
                            <div class="listing-blog clearfix row">
                              <div class="col-md-12"><div class="titre"><span>Conseils &amp; ASTUCES</span></div></div>
                                <div class="clearfix">
                                <?php foreach ($astuces as $post) :  ?>
                                    <div class="col-md-6">
                                        <div class="item">
                                            <img src="<?php echo CBlog::getArticleImage($post->thumbnail,'blog-liste'); ?>" alt="<?php echo $post->title; ?>">
                                            <div class="text white-bg">
                                                <a href="<?php echo $post->link; ?>" class="title"><?php echo $post->title; ?></a>
                                                <p><?php echo $post->extrait ?></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>    
                                               
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        	<div class="bloc-pub">
                            	<div class="titre-pub">
                                	<span>Comparez et Obtenir </span>un devis de peinture rapidement en ligne
                                </div>
                                <a href="<?php echo  get_permalink(get_page_by_path("home")->ID); ?>">Devis Gratuit</a>
                            </div>
                            <div class="blocAstuce">
                            	<div class="titre"><span>Conseils &amp; ASTUCES</span></div>
                                <?php dynamic_sidebar( 'sidebar-astuce' ); ?>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </main>
<?php
get_footer();