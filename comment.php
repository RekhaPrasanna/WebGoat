<?php 
header ("X-XSS-Protection: 0"); 
// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) { 
      // Feedback for end user
      // ruleid: tainted-user-input-in-php-script
      $html .= '<pre>Hello ' . $_GET[ 'name' ] . '</pre>';
} 

if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) { 
    $user_input = $_GET['name'];
    // Feedback for end user
    // ruleid: tainted-user-input-in-php-script
    $html .= '<pre>Hello ' . $user_input . '</pre>';
} 

// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) { 
    // Feedback for end user
    // ok: tainted-user-input-in-php-script
    $str .= 'Hello ' . $_GET[ 'name' ] . 'str';
} 

if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) { 
    $user_input = htmlspecialchars($_GET['name']);
    // Feedback for end user
    // ok: tainted-user-input-in-php-script
    $html .= '<pre>Hello ' . $user_input . '</pre>';
}

$product_id   = isset( $_GET['wc-helper-product-id'] ) ? absint( $_GET['wc-helper-product-id'] ) : 0;
$subscription = self::_get_subscriptions_from_product_id( $product_id );
$notices[]    = array(
    'type'    => 'updated',
    'message' => sprintf(
        /* translators: %s: product name */
        // ok: tainted-user-input-in-php-script
        __( '%s activated successfully. You will now receive updates for this product.', 'woocommerce' ),
        '<strong>' . esc_html( $subscription['product_name'] ) . '</strong>'
    ),
);
?>
