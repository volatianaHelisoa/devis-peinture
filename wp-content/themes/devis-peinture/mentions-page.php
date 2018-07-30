<?php
/*
Template Name: mentions-page
Template Post Type: post, page
*/
get_header(); 
$pageid = get_the_id();
$p = get_post($pageid);
?>

<main class="content-container content-generique">
			<div class="breadCrumb">
            	<div class="container">
                	<a href="<?php echo  get_permalink(get_page_by_path("home")->ID); ?>">Home</a>
                    <span class="current-nav">Mentions légales</span>
                </div>
            </div>
            <div class="container content">
				<div class="titre"><span>Mentions légales</span></div>
                <div class="clearfix row  text-mentions">
                    <div class="col-md-4">
                        <img src="<?php echo get_the_post_thumbnail_url($p); ?>" alt="">
                    </div>
                    <div class="col-md-8 content-text">
                    <?php while(have_posts()) : the_post(); ?>
                        <?php the_content();?>

                    <?php   endwhile;    ?>
                    </div>
                </div>
            </div>
        </main>

<?php
get_footer();