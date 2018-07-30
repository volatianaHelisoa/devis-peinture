<?php

/**
 * class rewrite url
 */
class rewrite {

  /**
   * Constructor function.
   **/
  function __construct() {
    add_action('init', array($this, 'flush_rewrite_rules'));
    add_filter('post_type_link', array($this, 'post_type_link'), 10, 3);
    add_filter('post_link', array($this, 'post_type_link'), 10, 3);
    add_filter('term_link', array($this, 'term_link'), 1, 3);
    add_action('generate_rewrite_rules', array(
      $this,
      'create_custom_rewrite_rules'
    ));
    add_filter('query_vars', array($this, 'add_custom_page_variables'));
  } // End constructor

  /**
   * rewrite post type url
   */


  function post_type_link($permalink, $post, $leavename) {

    switch ($post->post_type) {
      case 'blogs' :
     // remplacer url blogs par blog
        $permalink = str_replace('blogs/', 'blog/', $permalink);
        break;
     case 'atelier':
          $permalink = str_replace('atelier/', 'atelier-de-groupe/', $permalink);
          break;
    
     case 'pourqui':
          $permalink = str_replace('pourqui/', 'pour-qui/', $permalink);
          break;
    }

    return $permalink;
  }

  /**
   * Fonction qui permet de change l'url des divers post_type le pays rattaché.
   */
  function rewrite_permalink($post, $permalink) {
      
    $genre_associe = wp_get_post_terms($post->ID, 'genre', array('fields' => 'ids'));
    if (isset($genre_associe) && count($genre_associe) > 0) {
        $genre_associe = get_term_by('term_id', $genre_associe[0], 'genre');
        $permalink = str_replace('carte/', $genre_associe->slug . '/', $permalink);
    }
      
    return $permalink;
  }

  /**
   * Fonction qui permet de change l'url des pays et metiers.
   */
  function term_link($termlink, $term, $taxonomy) {
    global $statut;

    /*switch ($taxonomy) {
      case 'genre' :
        $termlink = str_replace('genre/','agenda/',$termlink);
        break;
    }*/

    return $termlink;
  }

  /**
   * create_custom_rewrite_rules()
   * Creates the custom rewrite rules.
   * return array $rules.
   **/
  public function create_custom_rewrite_rules() {
     
    global $wp_rewrite;

    remove_action('template_redirect', 'redirect_canonical');
    $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
    if (preg_match("#.*?\/(blog)\/(.+?)\/$#", $_SERVER['REQUEST_URI']) && strpos($url_path, '/page') === false  ) {
        // Define custom rewrite tokens
        $post_type = '%posttype%';

        // Add the rewrite tokens
        $wp_rewrite->add_rewrite_tag($post_type, '(.+?)', 'post_type=blog');

        // Define the custom permalink structure
        $rewrite_keywords_structure = $wp_rewrite->root . "blog/%blogs%/";

        // Generate the rewrite rules
        $new_rule = $wp_rewrite->generate_rewrite_rules( $rewrite_keywords_structure, EP_NONE, false,false,false,false,false  );

        $wp_rewrite->rules = $new_rule + $wp_rewrite->rules;
    }

     if (preg_match("#.*?\/(atelier-de-groupe)\/(.+?)\/$#", $_SERVER['REQUEST_URI']) && strpos($url_path, '/page') === false  ) {
        // Define custom rewrite tokens
        $post_type = '%posttype%';

        // Add the rewrite tokens
        $wp_rewrite->add_rewrite_tag($post_type, '(.+?)', 'post_type=atelier');

        // Define the custom permalink structure
        $rewrite_keywords_structure = $wp_rewrite->root . "atelier-de-groupe/%atelier%/";

        // Generate the rewrite rules
        $new_rule = $wp_rewrite->generate_rewrite_rules( $rewrite_keywords_structure, EP_NONE, false,false,false,false,false  );

        $wp_rewrite->rules = $new_rule + $wp_rewrite->rules;
    }

     if (preg_match("#.*?\/(pour-qui)\/(.+?)\/$#", $_SERVER['REQUEST_URI']) && strpos($url_path, '/page') === false  ) {
        
        // Define custom rewrite tokens
        $post_type = '%posttype%';

        // Add the rewrite tokens
        $wp_rewrite->add_rewrite_tag($post_type, '(.+?)', 'post_type=pourqui');

        // Define the custom permalink structure
        $rewrite_keywords_structure = $wp_rewrite->root . "pour-qui/%pourqui%/";

        // Generate the rewrite rules
        $new_rule = $wp_rewrite->generate_rewrite_rules( $rewrite_keywords_structure, EP_NONE, false,false,false,false,false  );

        $wp_rewrite->rules = $new_rule + $wp_rewrite->rules;
    }
   
    return $wp_rewrite->rules;
  } // End create_custom_rewrite_rules()

  /**
   * add_custom_page_variables()
   * Add the custom token as an allowed query variable.
   * return array $public_query_vars.
   **/
  public function add_custom_page_variables($public_query_vars) {
    $public_query_vars[] = 'mois';
    $public_query_vars[] = 'annee';
    $public_query_vars[] = 'jour';

    return $public_query_vars;
  } // End add_custom_page_variables()

  /**
   * flush_rewrite_rules()
   * Flush the rewrite rules, which forces the regeneration with new rules.
   * return void.
   **/
  public function flush_rewrite_rules() {
    global $wp_rewrite;

    $wp_rewrite->flush_rules();
  } // End flush_rewrite_rules()
}

new rewrite();
?>