
jQuery(document).ready(function($) {
	
	jQuery('a[href="tel:5045175529"]').click(function(){
		ga('send', {
		  hitType: 'event',
		  eventCategory: 'Button',
		  eventAction: 'ctc',
		  eventLabel: 'Clicked to Call'
		})
	});
	
	var vMiddle;
	var headlineHeight;
	
	//jQuery( window ).load(function() {
		
		if(jQuery( window ).width()>768){
			vMiddle = jQuery('.home .hero-section').height();
			headlineHeight = jQuery('.home .full-bleed-hero-headline').height();
			console.log(headlineHeight);
			console.log(vMiddle);
			jQuery('.home .full-bleed-hero-headline').css({ 'margin-top': -(vMiddle/2)-headlineHeight/2+'px' });
		};
		
		//window.dispatchEvent(new Event('resize'));
	//});
	
	jQuery( window ).resize(function() {
		vMiddle = jQuery('.home .hero-section').height();
		headlineHeight = jQuery('.home .full-bleed-hero-headline').height();
		if(jQuery( window ).width()>768){
			jQuery('.home .full-bleed-hero-headline').css({ 'margin-top': -(vMiddle/2)-headlineHeight/2+'px' });
		}
		//jQuery('.full-bleed-hero-introbox').css({ 'margin-top': -(vMiddle/2)-targetHeight/2+'px' });
	});

	

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
