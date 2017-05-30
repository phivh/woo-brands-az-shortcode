<?php
/*
Plugin Name: WooCommerce Brand AZ Shortcode
Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
Description: A brand list shortCode used to mega menu, next version will be extra shortcode for page, widget -> Have Fun!
Version:     1.0.0
Author:      Ph.d2d
Author URI:  phd2d.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if(!function_exists('init_woo_brands_shortcode')) {
	function init_Phd2d_brands_az() {
		if( !function_exists( 'brands_menu_html' ) ) {

			function brands_menu_html( $atts ) {
				$atts = shortcode_atts( array(
					'style' => 'brands-menu'
				), $atts );

				// do shortcode actions here
				$html = '';

				ob_start();

				$brand_args = array(
					'post_type' => 'product',
					'orderby'	=> 'name',
					'order'		=> 'asc',
					'taxonomy'	=> 'product_brand',
					'hide_empty'=> '0',
					'parent'	=> ''
					);
				$brand_list = get_categories( $brand_args );

				$az_array = array();

				foreach($brand_list as $brand_item) {

					$brand_name = $brand_item->name;

					$first_word = mb_strcut($brand_name, 0,1);

					switch (strtoupper($first_word)) {
						case 'A':
							// Push all brand name A into array
							$az_array['A'][] .=  $brand_name;
							break;
						case 'B':
							// Push all brand name B into array
							$az_array['B'][] .=  $brand_name;
							break;
						case 'C':
							// Push all brand name C into array
							$az_array['C'][] .=  $brand_name;
							break;
						case 'D':
							// Push all brand name D into array
							$az_array['D'][] .=  $brand_name;
							break;
						case 'E':
							// Push all brand name E into array
							$az_array['E'][] .=  $brand_name;
							break;
						case 'F':
							// Push all brand name F into array
							$az_array['F'][] .=  $brand_name;
							break;
						case 'G':
							// Push all brand name G into array
							$az_array['G'][] .=  $brand_name;
							break;
						case 'H':
							// Push all brand name H into array
							$az_array['H'][] .=  $brand_name;
							break;
						case 'I':
							// Push all brand name I into array
							$az_array['I'][] .=  $brand_name;
							break;
						case 'J':
							// Push all brand name J into array
							$az_array['J'][] .=  $brand_name;
							break;
						case 'K':
							// Push all brand name K into array
							$az_array['K'][] .=  $brand_name;
							break;
						case 'L':
							// Push all brand name L into array
							$az_array['L'][] .=  $brand_name;
							break;
						case 'M':
							// Push all brand name M into array
							$az_array['M'][] .=  $brand_name;
							break;
						case 'N':
							// Push all brand name N into array
							$az_array['N'][] .=  $brand_name;
							break;
						case 'O':
							// Push all brand name O into array
							$az_array['O'][] .=  $brand_name;
							break;
						case 'P':
							// Push all brand name P into array
							$az_array['P'][] .=  $brand_name;
							break;
						case 'S':
							// Push all brand name S into array
							$az_array['S'][] .=  $brand_name;
							break;
						case 'R':
							// Push all brand name R into array
							$az_array['R'][] .=  $brand_name;
							break;
						case 'T':
							// Push all brand name T into array
							$az_array['T'][] .=  $brand_name;
							break;
						case 'U':
							// Push all brand name U into array
							$az_array['U'][] .=  $brand_name;
							break;
						case 'V':
							// Push all brand name V into array
							$az_array['V'][] .=  $brand_name;
							break;
						case 'W':
							// Push all brand name W into array
							$az_array['W'][] .=  $brand_name;
							break;
						case 'X':
							// Push all brand name X into array
							$az_array['X'][] .=  $brand_name;
							break;
						case 'Y':
							// Push all brand name Y into array
							$az_array['Y'][] .=  $brand_name;
							break;
						case 'Z':
							// Push all brand name Z into array
							$az_array['Z'][] .=  $brand_name;
							break;
						
						default:
							$az_array['#'][] .=  $brand_name;
							break;
					}
				}
				?>
				<div class="inner brands">
				    <div class="brand_list">
				    	<?php 
				    		foreach ( $az_array as $group_name => $brand_group ) {
				    	?>
				    	<div brand_group="<?php echo $group_name;?>" class="brand_group">
				            <div class="heading"><?php echo $group_name;?></div>
				            <div class="body">
				            	<?php 
				            		foreach ($brand_group as $brand) {	
				            	?>
				                <a href="/product_brand/<?php echo mb_strtolower(str_replace(' ', '-', $brand));?>"><?php echo $brand;?></a>
				                <?php } ?>
				            </div>
				        </div>
				    	<?php
				    		}
				    	?>
				    </div>

				    <div class="brand_group_names">
				        <div class="brand_group_name all">
				            <a href="/shop/brands">Tất cả</a>
				        </div>
				        <?php 
				    		foreach ( $az_array as $group_name => $brand_group ) {
				    	?>
				        <div brand_group="<?php echo $group_name;?>" class="brand_group_name"><?php echo $group_name;?></div>
				        <?php
				    		}
				    	?>
				    </div>
				</div>
				<?php
				$html = ob_get_clean();
				return $html;
			}

		}

		add_shortcode( 'Ph_d2d_brands_az' , 'brands_menu_html' );
		
		// Add Script & Style 
		$plugin_url = plugin_dir_url( __FILE__ );

		wp_enqueue_script( 'brand-plugin',$plugin_url.'plugin.js',array('jquery'),null,true);

		wp_enqueue_style('brand-css',$plugin_url.'plugin.css');
	}	
}
add_action('init', 'init_Phd2d_brands_az' );

function active_Phd2d_brands_az() {
	//run
	init_Phd2d_brands_az();
}

function deactive_Phd2d_brands_az() {
	// bye
}
register_activation_hook( __FILE__, 'active_Phd2d_brands_az' );
register_deactivation_hook( __FILE__, 'deactive_Phd2d_brands_az' );