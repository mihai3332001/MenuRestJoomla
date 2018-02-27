<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$document = JFactory::getDocument(); 
$document->addStyleSheet('components'.DS.'com_menurest'.DS.'css'.DS.'style.css');


//JHtml::_('script', 'https://code.jquery.com/jquery-1.9.1.min.js');
//JHtml::_('script', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js');

echo $this->msg;

?>


  <script>
jQuery.noConflict();

 jQuery('.open-popup-link').magnificPopup({
  type:'inline',
   midClick: true
});

jQuery("document").ready(function(jQuery){

	var nav = jQuery('.dropdown');

	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 136) {
			nav.addClass("f-nav");
		} else {
			nav.removeClass("f-nav");
		}
	});

});

jQuery(document).ready(function(){
  // Add smooth scrolling to all links
  jQuery(".dropdown-menu li a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;
	
      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      jQuery('html, body').animate({
        scrollTop: jQuery(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

  </script>