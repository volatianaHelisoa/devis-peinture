<?php
/*
Template Name: contact-page */
get_header();
$pageid = get_the_id();
$p = get_post($pageid);
?>


        <main class="content-container content-generique">
			<div class="breadCrumb">
            	<div class="container">
                	<?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<div class="breadCrumbs">','</div>');
                    } ?>
                </div>
            </div>
            <div class="container content">
				<div class="titre"><span><?php the_title(); ?></span></div>
                <div class="wrap-contact">
                	<div class="text-left">
                        <div>
                            Vous souhaitez formuler des remarques <br>
                            ou des suggestions sur notre site ?
                        	<span>veuillez utiliser ce formulaire</span>
                        </div>
					</div>
                	<div class="content-form">
                      <h2>FORMULAIRE</h2>
                      <?php while(have_posts()) : the_post(); ?>
                       <?php the_content();?>
                       <?php endwhile; wp_reset_query();  ?>
               
                
                    </div>
                </div>
            </div>
        </main>
<?php
get_footer(); 