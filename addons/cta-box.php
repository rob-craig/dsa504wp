<div class="cta-box">

        <?php 
        if(get_post_type($parentID) == "committee"){
                $context_text = "the <strong>".get_the_title($parentID)." Committee</strong>";
        } else {
                $context_text = "<strong>DSA New Orleans</strong>";
        };

        // hack to catch caucases
        if( preg_match("/caucus/i", get_the_title($parentID)) == true ){
                $context_text = "the <strong>".get_the_title($parentID)."</strong>";
        }

        ?>
		
		
        <b>Get Involved</b>
        <p> 
        Have questions about <?php echo $context_text; ?>, or want to join up? Drop us a line and we'll get in touch:
        </p>
		<form id="contact">
        <input type="text" id="name" placeholder="Name" required/>
        <input type="email" id="email" placeholder="Email" required/>
        <input type="text" id="mmm_honey" value="" />
        <input type="tel" id="phone" placeholder="Phone (Optional)" />
		<select id="track">
		  <option value="member-track">I'm interested in getting involved!</option>
		  <option value="updates-track">Just send me DSA504 updates.</option>
		</select>

        <input type="submit" value="Submit" class="submit"/>
		</form>
</div>

<script>
jQuery("#contact").submit(function(e){
	
    e.preventDefault(); // if the clicked element is a link
	
	if(jQuery("#mmm_honey").val()!=""){return};
	
	if(jQuery("#contact")[0].checkValidity()){
		jQuery.post(
			'<?php echo admin_url('admin-ajax.php'); ?>', 
			{ 
				'action':'signUp', 
				'name':jQuery('#name').val(),
				'email':jQuery('#email').val(), 
				'phone':jQuery('#phone').val(),
				'track':jQuery('#track'.val(),
				'committee-mail':'<?php echo get_field('contact_email'); ?>'
			}, 
			function(response) {
				console.log(response);
				jQuery("#contact").hide();
				
				if(response == "ok"){
				jQuery("#contact").before(
				"<div><strong>Thanks! We'll be in touch shortly.</strong> If you don't hear from us or need to get in contact sooner, email us at <a href='mailto:hello@dsaneworleans.org'>hello@dsaneworleans.org</a>.</div>"
				);
				}else{
				jQuery("#contact").before(
				"<div><strong>Uh-oh- something went wrong.</strong> Please contact us via email at <a href='mailto:hello@dsaneworleans.org'>hello@dsaneworleans.org</a>, or on <a href='https://twitter.com/neworleansdsa'>Twitter.</a></div>"
				);
				
				}
				
			}
		);
	}

});
</script>
