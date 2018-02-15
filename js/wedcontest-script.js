jQuery(document).ready(function($) {
	$('#register_form').submit(function(e){
		e.preventDefault();
		var jqxhr = $.post( wedcontest.ajax_url, $('#register_form').serializeArray())
		.done(function(response) {
			console.info('The server responded: ' + response);
		}).fail(function(response){
			alert(response.responseJSON.data[0].message);
		});
		return false;
	});
});
function checkPasswordStrength( $pass1,
	$pass2,
	$strengthResult,
	$submitButton,
	blacklistArray ) {
	var pass1 = $pass1.val();
	var pass2 = $pass2.val();
    $submitButton.attr( 'disabled', 'disabled' );
    $strengthResult.removeClass( 'short bad good strong' );
    blacklistArray = blacklistArray.concat( wp.passwordStrength.userInputBlacklist() )
    var strength = wp.passwordStrength.meter( pass1, blacklistArray, pass2 );
    switch ( strength ) {
    	case 2:
    	$strengthResult.addClass( 'bad' ).html( pwsL10n.bad );
    	break;
    	case 3:
    	$strengthResult.addClass( 'good' ).html( pwsL10n.good );
    	break;
    	case 4:
    	$strengthResult.addClass( 'strong' ).html( pwsL10n.strong );
    	break;
    	case 5:
    	$strengthResult.addClass( 'short' ).html( pwsL10n.mismatch );
    	break;
    	default:
    	$strengthResult.addClass( 'short' ).html( pwsL10n.short );
    }
    if ( (4 === strength || 3==strength) && '' !== pass2.trim() ) {
    	$submitButton.removeAttr( 'disabled' );
    }
    return strength;
}
jQuery( document ).ready( function( $ ) {
    $( 'body' ).on( 'keyup', 'input[name=password], input[name=password_retyped]',
    	function( event ) {
    		checkPasswordStrength(
                $('input[name=password]'),         // First password field
                $('input[name=password_retyped]'), // Second password field
                $('#password-strength'),           // Strength meter
                $('button[type=submit]'),           // Submit button
                ['black', 'listed', 'word']        // Blacklisted words
                );
    	}
    	);
});
