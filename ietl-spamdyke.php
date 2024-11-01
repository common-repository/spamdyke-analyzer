<?php
/*
Plugin Name: Spamdyke Analyzer
Plugin URI: http://www.alessandroconsorti.it/spamdyke-analyzer-documentation/
Description: A plugin to understand SpamDyke 's error codes 
Version: 1.1.2
Author: Alessandro Consorti
Author URI: http://www.alessandroconsorti.it
License: GPLv3
*/

function spamdyke_register_styles() {
wp_enqueue_style('ietl-box', WP_PLUGIN_URL.'/spamdyke-analyzer/css/style.css');
}
add_action( 'wp_enqueue_scripts', 'spamdyke_register_styles' );


function plugin_text_start() {
  load_plugin_textdomain('ietl-spamdyke', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action('init', 'plugin_text_start');

function ietl_decode_errore( $atts, $content = null ){
    
  extract(shortcode_atts(array('code' => 'Default code',
				'tag_title' => 'p',
				'tag_descr' => 'p'),
				$atts));

  $errore_sconosciuto="The error code was not recognized. <br> If you wish you can send me a message from the contact page with the code.";
  
  $decodifica="";
  $codice_spamdyke=sanitize_text_field($_GET['code']);//$code;
  
  //Multilingua
 $titolo_errore = sprintf(__("Spamdyke's error code: %s", 'ietl-spamdyke'), $titolo_errore);
  
  
	if (isset($codice_spamdyke) and strlen($codice_spamdyke)> 0 ){
		$titolo_errore.=$codice_spamdyke;
		//Se è presente la variabile codice_spamdyke..
		switch ($codice_spamdyke) {
			case "DENIED_ACCESS_DENIED":
				$decodifica .= __('Refused. Access is denied.', 'ietl-spamdyke');
				break;
			case "DENIED_AUTH_REQUIRED":
				$decodifica .= __('Refused. Authentication is required to send mail.', 'ietl-spamdyke');
				break;
			case "DENIED_BLACKLIST_IP":
				$decodifica .= __('Refused. Your IP address is blacklisted.', 'ietl-spamdyke');
				break;		
			case "DENIED_BLACKLIST_NAME":
				$decodifica .= __('Refused. Your domain name is blacklisted.', 'ietl-spamdyke');
				break;		
			case "DENIED_EARLYTALKER":
				$decodifica .= __('Refused. You are not following the SMTP protocol.', 'ietl-spamdyke');
				break;		
			case "DENIED_GRAYLISTED":
				$decodifica .= __('Your address has been graylisted. Try again later.', 'ietl-spamdyke');
				break;		
			case "DENIED_HEADER_BLACKLISTED":
				$decodifica .= __('Refused. Your message has been blocked due to its content.', 'ietl-spamdyke');
				break;		
			case "DENIED_IDENTICAL_SENDER_RECIPIENT":
				$decodifica .= __('Refused. Identical sender and recipient addresses are not allowed.', 'ietl-spamdyke');
				break;		
			case "DENIED_IP_IN_CC_RDNS":
				$decodifica .= __('Refused. Your reverse DNS entry contains your IP address and a country code.', 'ietl-spamdyke');
				break;		
			case "DENIED_IP_IN_RDNS":
				$decodifica .= __('Refused. Your reverse DNS entry contains your IP address and a banned keyword.', 'ietl-spamdyke');
				break;		
			case "DENIED_OTHER":
				$decodifica .= __('The text returned by qmail &#40;or the downstream filter that generated the rejection&#41;.', 'ietl-spamdyke');
				break;		
			case "DENIED_RBL_MATCH":
				$decodifica .= __('The text returned by the DNS RBL &#40;if any&#41; or Refused. Your IP address is listed in the RBL at name.', 'ietl-spamdyke');
				break;		
			case "DENIED_RDNS_MISSING":
				$decodifica .= __('Refused. You have no reverse DNS entry.', 'ietl-spamdyke');
				break;		
			case "DENIED_RDNS_RESOLVE":
				$decodifica .= __('Refused. Your reverse DNS entry does not resolve.', 'ietl-spamdyke');
				break;		
			case "DENIED_RHSBL_MATCH":
				$decodifica .= __('The text returned by the RHSBL &#40;if any&#41; or Refused. Your domain name is listed in the RHSBL at name.', 'ietl-spamdyke');
				break;		
			case "DENIED_RECIPIENT_BLACKLISTED":
				$decodifica .= __('Refused. Mail is not being accepted at this address.', 'ietl-spamdyke');
				break;		
			case "DENIED_REJECT_ALL":
				$decodifica .= __('Refused. Mail is not being accepted.', 'ietl-spamdyke');
				break;		
			case "DENIED_RELAYING":
				$decodifica .= __('Refused. Sending to remote addresses &#40;relaying&#41; is not allowed.', 'ietl-spamdyke');
				break;		
			case "DENIED_SENDER_BLACKLISTED":
				$decodifica .= __('Refused. Your sender address has been blacklisted.', 'ietl-spamdyke');
				break;		
			case "DENIED_SENDER_NO_MX":
				$decodifica .= __('Refused. The domain of your sender address has no mail exchanger &#40;MX&#41;.', 'ietl-spamdyke');
				break;
			case "DENIED_TOO_MANY_RECIPIENTS":
				$decodifica .= __('Too many recipients. Try the remaining addresses again later.', 'ietl-spamdyke');
				break;
			case "DENIED_UNQUALIFIED_RECIPIENT":
				$decodifica .= __('Improper recipient address. Try supplying a domain name.', 'ietl-spamdyke');
				break;
			case "DENIED_ZERO_RECIPIENTS":
				$decodifica .= __('Refused. You must specify at least one valid recipient.', 'ietl-spamdyke');
				break;
			case "FAILURE_AUTH":
				$decodifica .= __('Refused. Authentication failed.', 'ietl-spamdyke');
				break;
			case "FAILURE_TLS":
				$decodifica .= __('Failed to negotiate TLS connection.', 'ietl-spamdyke');
				break;
			case "TIMEOUT":
				$decodifica .= __('Timeout. Talk faster next time.', 'ietl-spamdyke');
				break;
			case "UNKNOWN_AUTH":
				$decodifica .= __('Refused. Unknown authentication method.', 'ietl-spamdyke');
				break;
			default:
				$decodifica .=$errore_sconosciuto;
		}
		

		$decodifica = '<div class="ietl-box"><p>'.$decodifica.'</p></div>';
	}
	else{
		$titolo_errore.=" NULL";
		$decodifica=$errore_sconosciuto;
	}
	
	$msg = "<{$tag_title}>{$titolo_errore}</{$tag_title}><br>";
    $msg .= "<{$tag_descr}>{$decodifica}</{$tag_descr}>"; 		
    return $msg;
}

add_shortcode( 'SpamdykeDecode', 'ietl_decode_errore' );
?>