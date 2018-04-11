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
        <input type="text" placeholder="Name" required/>
        <input type="email" placeholder="Email" required/>
        <input type="text" id="mmm_honey" value="" />
        <input type="tel" placeholder="Phone (Optional)" />

        <input type="submit" value="Submit" class="submit"/>
		</form>
</div>

<script>
jQuery("#contact").submit(function(e){
	
	console.log("click");
    e.preventDefault(); // if the clicked element is a link
	
	if($("#mmm_honey").val()!=""){return};
	
	if($("#contact")[0].checkValidity()){
		$.post(
			'<?php echo admin_url('admin-ajax.php'); ?>', 
			{ 'action':'signUp', 'name':'test1', 'email':'test2', 'phone':'test3' }, 
			function(response) {
				console.log(response);
			}
		);
	}

});
</script>
