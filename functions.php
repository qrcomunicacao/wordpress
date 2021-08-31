/* SHORTCODES */

// Modelo shortcode
function funcao_shortcode(){ // Nome do shortcode
    return get_the_title(); // Função do WP/WOO
}
add_shortcode('nome_shortcode','funcao_shortcode'); // [shortcode], Nome da função


// Shortcode for post title
function post_title_shortcode(){ // Nome do shortcode
    return get_the_title(); // Função do WP/WOO
}
add_shortcode('post_title','post_title_shortcode');


// Shortcode Post permalink
function post_permalink_shortcode(){
    return get_the_permalink();
}
add_shortcode('post_permalink','post_permalink_shortcode');


// Shortcode ACF
function funcao_shortcode(){ // Nome do shortcode
    return get_field('nome_do_campo'); // Campo do ACF
}
add_shortcode('nome_shortcode','funcao_shortcode'); // [shortcode], Nome da função


// List ACF Repeater 
function acf_repeater() {
	if( have_rows('nome_repetidor') ) : // Nome do Repetidor
	while ( have_rows('nome_repetidor') ) : the_row(); // Nome do Repetidor
	$campo01 = get_sub_field('campo01'); // Campo 01
	$campo02 = get_sub_field('campo02'); // Campo 02
	echo "<p><a href='" . $campo01 . "' target='_blank'>" . $campo02 . "</a></p>"; // Formatação
		endwhile;
	endif;
}
add_shortcode('acf_repeater_shortcode', 'acf_repeater');


// Adicionar elemnto após a tag <body>
function hook_after_body() { ?>
<!-- Código aqui -->
<?php }
add_action('after_body', 'hook_after_body');


// Adicionar elemento no header do site
function hook_javascript() { ?>
<!-- Código aqui -->

<!-- Menu aparece quando rola a tela pra cima -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop || st === 0){
      $('.elementor-sticky--effects').slideUp("fast");
   } else {
      $('.elementor-sticky--effects').slideDown("fast");
   }
   lastScrollTop = st;
});
</script>

<?php }
add_action('wp_head', 'hook_javascript');

// Um produto por venda
add_filter( 'woocommerce_add_to_cart_validation', 'um_produto_por_venda', 9999, 2 );
function um_produto_por_venda( $passed, $added_product_id ) {
   wc_empty_cart();
   return $passed;

// Post Excerpt
function funcao_resumo_post() {
	$excerpt = get_the_excerpt();
	$excerpt = substr($excerpt, 0, 12);
	$result = substr($excerpt, 0, strrpos($excerpt, ' '));
	echo $result;
}
add_shortcode('resumo_post', 'funcao_resumo_post');

// Post content
function post_content(){
    return get_the_content();
}
add_shortcode('content','post_content');
