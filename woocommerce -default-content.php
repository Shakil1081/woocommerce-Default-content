<?php
/**
 * @package 
 * @version 1.7.2
 */
/*
Plugin Name: woocommerce Default content
Plugin URI: http://webspreed.com/
Description: Default Unique Content plugin will over right product description if it's empty..
Version: 1.7.2
Requires PHP:      7.2
Author:   Shakil Hossain
Author URI: http://webspreed.com/
License:           GPL v2 or later
*/

if (is_admin()) {

    /* Call the html code */
    add_action('admin_menu', 'site_settings');

    function site_settings() {
        add_menu_page('Default Content', 'Default Content', 'administrator', 'default-content', 'default_content_function');
    }

}

function default_content_function() {
    ?>
    <div class="wrap">
        <div id="icon-tools" class="icon32"></div>
        <h2>Default Content</h2>
        <?php
        if (isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true'):
            ?>
            <div class="updated below-h2" id="message">
                <p>Settings Updated.</p>
            </div>
        <?php endif; ?>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>
            <table class="widefat" style="margin-top: 20px;">
                <tbody>
                    <tr><th></th><th><strong style="color: #990000;font-size: 12px;font-weight: bold;padding: 5px;">{%V-name%} {%Cert-name%} {%Exam code%} {%Exam-name%}</strong></th></tr>
                    <tr>
                        <td style="width: 15%;">Vendor Content</td>
                        <td>
                            <?php
                            $contentValue = get_option('vendor_description');
                            wp_editor(html_entity_decode(stripcslashes($contentValue)), 'vendor_description', $settings = array('textarea_name' => 'vendor_description', 'textarea_rows' => 10));
                            ?>
                        </td>
                    </tr>
					<!--
                    <tr>
                        <td>Vendor meta title</td>
                        <td>
                            <?php
                            $contentValue = get_option('vendor_title');
                            ?> 
                            <input type="text" value="<?php echo $contentValue; ?>" name="vendor_title" />
                        </td>
                    </tr>
                    <tr>
                        <td>Vendor meta description</td>
                        <td>
                            <?php
                            $contentValue = get_option('vendor_meta_desc');
                            ?> 
                            <textarea cols="45" rows="4" name="vendor_meta_desc"><?php echo $contentValue; ?></textarea>

                        </td>
                    </tr>
                    <tr>
                        <td>Vendor meta Keywords</td>
                        <td>
                            <?php
                            $contentValue = get_option('vendor_meta_keywords');
                            ?> 
                            <input type="text" value="<?php echo $contentValue; ?>" name="vendor_meta_keywords" />

                        </td>
                    </tr>
                    --><tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">Certification Content</td>
                        <td>
                            <?php
                            $contentValue = get_option('certification_description');
                            wp_editor(html_entity_decode(stripcslashes($contentValue)), 'certification_description', $settings = array('textarea_name' => 'certification_description', 'textarea_rows' => 10));
                            ?>
                        </td>
                    </tr>
                    <!--<tr>
                        <td>Certificate meta title</td>
                        <td>
                            <?php
                            $contentValue = get_option('certification_title');
                            ?> 
                            <input type="text" value="<?php echo $contentValue; ?>" name="certification_title" />
                        </td>
                    </tr>
                    <tr>
                        <td>Certificate meta description</td>
                        <td>
                            <?php
                            $contentValue = get_option('certification_meta_desc');
                            ?> 
                            <textarea cols="45" rows="4" name="certification_meta_desc"><?php echo $contentValue; ?></textarea>

                        </td>
                    </tr>
                    <tr>
                        <td>Certificate meta Keywords</td>
                        <td>
                            <?php
                            $contentValue = get_option('certification_keywords');
                            ?> 
                            <input type="text" value="<?php echo $contentValue; ?>" name="certification_keywords" />

                        </td>
                    </tr>
                    --><tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">Exam Content</td>
                        <td>
                            <?php
                            $contentValue = get_option('examn_description');
                            wp_editor(html_entity_decode(stripcslashes($contentValue)), 'examn_description', $settings = array('textarea_name' => 'examn_description', 'textarea_rows' => 10));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">Exam Features</td>
                        <td>
                            <?php
                            $contentValue = get_option('exam_features');
                            wp_editor(html_entity_decode(stripcslashes($contentValue)), 'exam_features', $settings = array('textarea_name' => 'exam_features', 'textarea_rows' => 10));
                            ?>
                        </td>
                    </tr>
                 <!--   <tr>
                        <td>Exam meta title</td>
                        <td>
                            <?php
                            $contentValue = get_option('exam_title');
                            ?> 
                            <input type="text" value="<?php echo $contentValue; ?>" name="exam_title" />
                        </td>
                    </tr>
                    <tr>
                        <td>Exam meta description</td>
                        <td>
                            <?php
                            $contentValue = get_option('exam_meta_desc');
                            ?> 
                            <textarea cols="45" rows="4" name="exam_meta_desc"><?php echo $contentValue; ?></textarea>

                        </td>
                    </tr>
                    <tr>
                        <td>Exam meta Keywords</td>
                        <td>
                            <?php
                            $contentValue = get_option('exam_meta_keywords');
                            ?> 
                            <input type="text" value="<?php echo $contentValue; ?>" name="exam_meta_keywords" />

                        </td>
                    </tr>
                    --><tr>
                        <td colspan="2"><hr/></td>
                    </tr>
                    <!--<tr>
                        <td>Exam demo link title</td>
                        <td>
                            <?php
                            $contentValue = get_option('exam_demo_link_title');
                            ?> 
                            <input type="text" style="width: 100%;" value="<?php echo $contentValue; ?>" name="exam_demo_link_title" />

                        </td>
                    </tr>-->
                </tbody>
            </table>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="exam_demo_link_title,examn_description,certification_description,vendor_description,vendor_title,vendor_meta_desc,vendor_meta_keywords,certification_title,certification_keywords,certification_meta_desc,exam_title,exam_meta_desc,exam_meta_keywords,exam_features" />

            <p>
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>

        </form>

    </div>
    <?php
}


/**
 * Customize product data tabs
 */
 
 function woocommerce_default_description($content) {
    $empty = empty($content) || trim($content) === '';
    if(is_product() && $empty) {

global $post;
$terms = get_the_terms( $post->ID, 'product_cat' );
foreach ($terms as $term) {
$product_cat_id = $term->term_id;
$_SESSION['cat'] = $product_cat_id;

  $product_cat_name = $term->name; 
$_SESSION['catname'] = $product_cat_name;
break;
} 
		
		$prodCats = get_the_terms(get_the_ID(), 'product_cat');
		

		
                $prodCat = null;
                foreach ($prodCats as $cat) {
                    $prodCat = $cat;
                    break;
                }				
                $topCat = null;
               
				if(count($prodCats)>=2){
				$sub=$prodCats['1']->name;
				}else{
					$sub='';
				}
				if ($prodCat) {
                    $topCat = get_term_by('name', $prodCat->name, 'product_cat');
                }
                
                    $defaultFeatures = get_option('exam_features');
                    if ($prodCat)
                        if($topCat){
							$defaultFeatures = str_replace("{%V-name%}", $topCat->name, $defaultFeatures);
						}else{
							$defaultFeatures = str_replace("{%V-name%}", '', $defaultFeatures);
						}
                    if ($topCat)					
                    $defaultFeatures = str_replace("{%Cert-name%}", $sub, $defaultFeatures);
                    $defaultFeatures = str_replace("{%Exam code%}", get_the_title(), $defaultFeatures);
                    $defaultFeatures = str_replace("{%Exam-name%}", get_post_meta(get_the_ID(), 'exam_full_name', true), $defaultFeatures);
                                 
				
				$defaultDesc = get_option('examn_description');
				
				
				
				
				
                    if ($prodCat){
						if($topCat){
                        $defaultDesc = str_replace("{%V-name%}", $topCat->name, $defaultDesc);
						}else{
							$defaultDesc = str_replace("{%V-name%}", '', $defaultDesc);
						}
					}
                    if ($topCat)
                    $defaultDesc = str_replace("{%Cert-name%}", $sub, $defaultDesc);
                    $defaultDesc = str_replace("{%Exam code%}", get_the_title(), $defaultDesc);
                    $defaultDesc = str_replace("{%Exam-name%}", get_post_meta(get_the_ID(), 'exam_full_name', true), $defaultDesc);


                    $defaultDesc = str_replace('[recent_exams]', "", $defaultDesc);
                    
			
		
        $content = '<h4>Product Features</h4>'.$defaultFeatures.' <br>'.$defaultDesc.'default text content';
		
		
    }
    return $content;
}
add_filter( 'the_content', 'woocommerce_default_description' ); 

function rmg_woocommerce_default_product_tabs($tabs) {
    if (empty($tabs['description'])) {
        $tabs['description'] = array(
            'title'    => __( 'Description', 'woocommerce' ),
            'priority' => 10,
            'callback' => 'woocommerce_product_description_tab',
        );
    }
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'rmg_woocommerce_default_product_tabs' );


function wpse_view_cart_store() {
    $output="";
global $product;
$id = $product->get_id();
$files = $product->get_downloads($id);
$downloads = $product->get_downloads();

foreach( $downloads as $key => $each_download ) {
	if($each_download["name"]=="Dummy")
  	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="single_add_to_cart_button button alt site " style="margin-left: 20px;" href="' . $each_download['file'] . '" download="proposed_file_name">&#10148; Download Demo</a>';
}
}
add_action( 'woocommerce_after_add_to_cart_button', 'wpse_view_cart_store' );


function so_31423071_remove_archive_description(){
    remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description' );
    remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' );
    if ( !is_product() ){
		if (get_query_var('term')){
			$catObject = get_term_by('slug', get_query_var('term'), 'product_cat');
		}
		if($catObject->description){
			echo $catObject->description;
		}else{
			$defaultDesc = get_option('vendor_description');
			$defaultDesc = str_replace('[recent_exams]', do_shortcode('[recent_exams]'), $defaultDesc);
			echo str_replace("{%V-name%}", $catObject->name, $defaultDesc);
        }
    }

}
add_action( 'woocommerce_before_main_content', 'so_31423071_remove_archive_description' );
