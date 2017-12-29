
jQuery(document).ready(function($) {

  jQuery('.material-design-hamburger__icon').click(
    function() {      
      var child;
      
      jQuery('.drawer').toggleClass('menu--on');

      child = this.childNodes[1].classList;

      if (child.contains('material-design-hamburger__icon--to-arrow')) {
        child.remove('material-design-hamburger__icon--to-arrow');
        child.add('material-design-hamburger__icon--from-arrow');
      } else {
        child.remove('material-design-hamburger__icon--from-arrow');
        child.add('material-design-hamburger__icon--to-arrow');
      }

  });
	
}); /* end of as page load scripts */
