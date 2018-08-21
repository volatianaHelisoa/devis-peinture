<?php /* Template Name: homepage */ 
get_header('headerHome');
$pageid = get_the_id();
$p = get_post($pageid);
$astuces = CBlog::getBy(2,5); 
$blogs = CBlog::getBy(3,3);
$temoignage = CTemoignage::getBy(3); 
?>
<main class="content-container">
        	<div class="wrapper">
            	<div class="blocCompare" id="compareDevis">
                	<div class="left">  
                    <?php the_field('script'); ?>
                    </div>
                    <div class="right">
                    	<h2>Comparez les professionnels de votre region</h2>
                        <ul>
                        	<li><span>01</span>Je remplis le formulaire</li>
                        	<li><span>02</span>Je recois des propositions</li>
                        	<li><span>03</span>Je compare les offres</li>
                        	<li><span>04</span>Je choisis le meilleur offre</li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="blocText">
            	<div class="wrapper">
                	<div class="text">
                    	<h2><?php echo $p->post_title; ?></h2>
                    	<p><?php echo $p->post_content; ?></p>
                    </div>
                </div>
            </div>
            <div class="blocastuceBlog">
            	<div class="wrapper">
                	<div class="blocAstuce">
                    	<div class="titre"><span>Conseils & ASTUCES</span></div>
                       
                        <ul>
                        <?php foreach ($astuces as $post) :  ?> 
                  
                        <li><a href="<?php echo $post->link; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title; ?></a></li>
            
                        <?php endforeach; ?>             
                        </ul>         
                        
                    </div>
                    <div class="blocBlog">
                    	<div class="titre"><span>Notre blog</span></div>
                        <div class="blog">
                        <?php  foreach ($blogs as $post) :  ?>
                        	<div>
                            	<a href="<?php echo $post->link; ?>" title=""><h3><?php echo $post->title; ?></h3></a>
                                <p><?php echo $post->extrait ?></p>
                                
                            </div>
                            <?php endforeach; ?>  
                            
                        </div>
                        <a href="<?php echo esc_url( get_category_link("3" ) ); ?>" class="link" title="Tout Voir">tout voir</a>
                    </div>
                </div>
            </div>
            <div class="blocTemoins">
            	<h2>des clients satisfaits</h2>
                
            	<div class="wrapTemoins">
                <?php foreach ($temoignage as $post) :  ?>
                	<div class="item">
                    	<div>
                            <p><?php echo $post->content; ?></p>
                            <div class="nomTemoin"><span><?php echo $post->author; ?></span></div>
                        </div>
                    </div>  
                    <?php endforeach; ?>                   
                </div>
                
            </div>
        </main>
     
<?php get_footer(); ?>