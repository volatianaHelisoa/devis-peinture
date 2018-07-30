<?php /* Template Name: homepage */ 
get_header('headerHome');
$pageid = get_the_id();
$p = get_post($pageid);
$astuces = CBlog::getBy(2); 
$blogs = CBlog::getBy(3);
?>
<main class="content-container">
        	<div class="wrapper">
            	<div class="blocCompare">
                	<div class="left">
                    	
                    </div>
                    <div class="right">
                    	<h2>Comparez les professionnels de votre region</h2>
                        <ul>
                        	<li><span>01</span>Je remplis le formulaire</li>
                        	<li><span>02</span>Je recois des propositions</li>
                        	<li><span>03</span>Je compare les offres</li>
                        	<li><span>04</span>Je choisis meilleur</li>
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
                  
                        <li><a href="<?php echo $post->link; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
            
                        <?php endforeach; ?>             
                        </ul>         
                        
                    </div>
                    <div class="blocBlog">
                    	<div class="titre"><span>Notre blog</span></div>
                        <div class="blog">                        
                            <?php  foreach ($blogs as $post) :  ?>
                        	<div>
                            	<a href="<?php echo $post->link; ?>" title="">
                                	<h3><?php echo $post->post_title; ?></h3>
                                    <p><?php echo $post->extrait ?></p>
                                </a>
                            </div>
                            <?php endforeach; ?>  
                            
                        </div>
                        <a href="<?php echo  get_permalink(get_page_by_path("blog-liste")->ID); ?>" class="link" title="Tout Voir">tout voir</a>
                    </div>
                </div>
            </div>
            <div class="blocTemoins">
            	<h2>des clients satisfaits</h2>
            	<div class="wrapTemoins">
                	<div class="item">
                    	<div>
                            <p>Un ami m'avait conseillé une entreprise de peinture mais je trouvais le devis assez élevé.Votre service m'a permis de comparer.</p>
                            <div class="nomTemoin"><span>Sophie P.</span></div>
                        </div>
                    </div>
                    <div class="item">
                    	<div>
                            <p>Pouvoir configurer son projet pièce par pièce aussi simplement est un vrai plus, je devais rénover tout mon logement. Le peintre est super.</p>
                            <div class="nomTemoin"><span>Michael R.</span></div>
                        </div>
                    </div>
                    <div class="item">
                    	<div>
                            <p>J'ai bien reçu mes devis pour ma peinture après avoir eu une estimation en ligne, merci pour le service.</p>
                            <div class="nomTemoin"><span>Alexandre G.</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php get_footer(); ?>