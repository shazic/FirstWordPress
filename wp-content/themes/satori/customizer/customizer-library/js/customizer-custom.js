/**
 * Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( window ).load( function() {
        
        //Show / Hide Color selector for slider setting
        var the_slider_select_value = $( '#customize-control-satori-slider-type select' ).val();
        ustore_customizer_slider_check( the_slider_select_value );
        
        $( '#customize-control-satori-slider-type select' ).on( 'change', function() {
            var slider_select_value = $( this ).val();
            ustore_customizer_slider_check( slider_select_value );
        } );
        
        function ustore_customizer_slider_check( slider_select_value ) {
            if ( slider_select_value == 'satori-slider-default' ) {
                $( '#accordion-section-satori-slider-section #customize-control-satori-meta-slider-shortcode' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-cats' ).show();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-size' ).show();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-linkto-post' ).show();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-remove-title' ).show();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-auto-scroll' ).show();
            } else if ( slider_select_value == 'satori-meta-slider' ) {
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-cats' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-size' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-linkto-post' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-remove-title' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-auto-scroll' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-meta-slider-shortcode' ).show();
            } else {
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-cats' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-size' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-linkto-post' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-remove-title' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-slider-auto-scroll' ).hide();
                $( '#accordion-section-satori-slider-section #customize-control-satori-meta-slider-shortcode' ).hide();
            }
        }
        
    } );
    
} )( jQuery );