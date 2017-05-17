<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

class bkap_common{
    
    /**
     * Return function name to be executed when multiple time slots are enabled.
     * 
     * This function returns the function name to display the timeslots on the 
     * frontend if type of timeslot is Multiple for multiple time slots addon.
     * 
     * @return str
     */
	public static function bkap_ajax_on_select_date() {
		global $post;
		
		$booking_settings = get_post_meta( $post->ID, 'woocommerce_booking_settings', true );
		
		if( isset( $booking_settings['booking_enable_multiple_time'] ) && $booking_settings['booking_enable_multiple_time'] == "multiple" && function_exists('is_bkap_multi_time_active') && is_bkap_multi_time_active() ) {
			return 'multiple_time';
		}
	}

	/**
	 * Return an array of dates that fall in a date range
	 * 
	 * This function returns an array of dates that falls
	 * in a date range in the d-n-Y format.
	 * 
	 * @param $StartDate d-n-Y format
	 * $EndDate d-n-Y format
	 * 
	 * @return $Days array
	 */
	public static function bkap_get_betweendays( $StartDate, $EndDate ) {
		$Days[]                   =   $StartDate;
		$CurrentDate              =   $StartDate;
			
		$CurrentDate_timestamp    =   strtotime($CurrentDate);
		$EndDate_timestamp        =   strtotime($EndDate);
		
		if( $CurrentDate_timestamp != $EndDate_timestamp )
		{
			while( $CurrentDate_timestamp < $EndDate_timestamp )
			{
				$CurrentDate            =   date( "d-n-Y", strtotime( "+1 day", strtotime( $CurrentDate ) ) );
				$CurrentDate_timestamp  =   $CurrentDate_timestamp + 86400;
				$Days[]                 =   $CurrentDate;
			}
			array_pop( $Days );
		}
		return $Days;
	}
	
	/**
	 * Send the Base language product ID
	 * 
	 * This function has been written as a part of making the Booking plugin
	 * compatible with WPML. It returns the base language Product ID when WPML
	 * is enabled. 
	 * 
	 * @param $product_id int
	 * @return $base_product_id int
	 */
	public static function bkap_get_product_id( $product_id ) {
	    $base_product_id = $product_id;
	    // If WPML is enabled, the make sure that the base language product ID is used to calculate the availability
	    if ( function_exists( 'icl_object_id' ) ) {
	        global $sitepress;
	        $default_lang = $sitepress->get_default_language();
	        $base_product_id = icl_object_id( $product_id, 'product', false, $default_lang );
	        // The base product ID is blanks when the product is being created.
	        if (! isset( $base_product_id ) || ( isset( $base_product_id ) && $base_product_id == '' ) ) {
	            $base_product_id = $product_id;
	        }
	    } 
		return $base_product_id;
	}
	
	/**
	 * Return Woocommerce price
	 * 
	 * This function returns the Woocommerce price applicable for a product.
	 * 
	 * @param $product_id int
	 * $variation_id int
	 * $product_type str
	 * 
	 * @return $price
	 */
	public static function bkap_get_price( $product_id, $variation_id, $product_type ) {
		$price = 0;
		
		if ( $product_type == 'variable' ){
			$sale_price = get_post_meta( $variation_id, '_sale_price', true );
			
			if( !isset( $sale_price ) || $sale_price == '' || $sale_price == 0 ) {
				$regular_price  =   get_post_meta( $variation_id, '_regular_price', true );
				$price          =   $regular_price;
			}else {
				$price          =   $sale_price;
			}
			
		} elseif( $product_type == 'simple' ) {
			$sale_price = get_post_meta( $product_id, '_sale_price', true );
			
			if( !isset( $sale_price ) || $sale_price == '' || $sale_price == 0 ) {
				$regular_price  =   get_post_meta( $product_id, '_regular_price', true );
				$price          =   $regular_price;
			}else {
				$price          =   $sale_price;
			}
		}
		return $price;
	}
	
	/**
	 * Return product type
	 * 
	 * Returns the Product type based on the ID received
	 * 
	 * @params $product_id int
	 * @return $product_type str
	 */
	public static function bkap_get_product_type($product_id) {
		$product      =   get_product( $product_id );
		$product_type =   $product->product_type;
		
		return $product_type;
	}
	
	/**
	 * Returns the WooCommerce Product Addons Options total
	 * 
	 * This function returns the WooCommerce Product Addons
	 * options total selected by a user for a given product.
	 * 
	 * @param $diff_days int
	 * $cart_item_meta array
	 * 
	 * @return $addons_price int
	 */
	public static function woo_product_addons_compatibility_cart( $diff_days, $cart_item_meta ) {
	    $addons_price = 0;
	    if( class_exists('WC_Product_Addons') ) {
			$single_addon_price = 0;
		 	
		 	if( isset( $cart_item_meta['addons'] ) ) {
				$product_addons = $cart_item_meta['addons'];
				
				foreach( $product_addons as $key => $val ) {
					$single_addon_price += $val['price'];
				}
				
				if( isset( $diff_days ) && $diff_days > 1 && $single_addon_price > 0 ) {
					$diff_days         -=  1;
					$single_addon_price =  $single_addon_price * $diff_days;
					$addons_price      +=  $single_addon_price;
				}
					
			}
		}
		return $addons_price;
	}
}
?>