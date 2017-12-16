<section class="form" style="background-color:<?php echo get_sub_field('background_color'); ?>">

					<form class="bg-form wrap">
					<h2><?php echo get_sub_field('form_headline'); ?></h2>
					<p><?php echo get_sub_field('form_copy'); ?></p>
						<?php while(the_flexible_field("form_fields")): ?>
								<?php if(get_row_layout() == "form_field"): ?>
										<?php 
										$field_name = get_sub_field('form_field_name');
										$required = get_sub_field('form_required');
										if($required == "true"){
											$rqrd = "required";
										} else {
											$rqrd = "";
										};
										$placeholder = get_sub_field('form_placeholder');
										$field_type= get_sub_field('form_field_type');
										$value = "";
										if($field_type == "hidden"||$field_type == "submit"){
											$value = get_sub_field('value');
											$value = 'value="'.$value.'"';
										};
										
										?>
										<?php
										if($field_type == "submit"){
										?>
											<div class="form_legend">* Required</div>
										<?php
										};
										?>
										<?php
										if($field_type == "textarea"){ ?>
										<textarea rows="4" name="<?php echo $field_name;?>" type="<?php echo $field_type;?>" placeholder="<?php echo $placeholder; if($required == "true"){echo " *";};?>" <?php echo $rqrd;?>></textarea>
										<?php } else { ?>
										<input name="<?php echo $field_name;?>" type="<?php echo $field_type;?>" placeholder="<?php echo $placeholder; if($required == "true"){echo " *";};?>" <?php echo $rqrd;?> <?php echo $value;?>/>
										<?php }; ?>
										<!--
										<label for="<?php echo $field_name;?>"><?php echo $placeholder;?></label>
										-->
								<?php endif; ?>
							<?php endwhile; ?>
						</form>
							
							<script>var AjaxURL = '<?php echo admin_url('admin-ajax.php'); ?>';</script>
							<script>
								/* Subscribe Box */
								function subscribe(data) {
										console.log(data)
										jQuery.ajax ({
											url: AjaxURL,
											type: 'POST',
											data: { action: 'mte_subscribe', 'data': data	},
											success : function( rdata ) {
												//console.log(rdata)
												
												/*
												jQuery("#thanksbox").modal({
												  escapeClose: false,
												  showClose: false
												});
												*/
												//Redirect to thanks page
												window.location.href = "<?php echo get_field('redirect_url');?>";
											}
										})
									};
															
								function hasHtml5Validation () {
								 return typeof document.createElement('input').checkValidity === 'function';
								}
								
								if (hasHtml5Validation()) {
								 jQuery(".bg-form").submit(function (e) {
								   if (!this.checkValidity()) {
									 // Prevent default stops form from firing
									 e.preventDefault();
									 jQuery(this).addClass('invalid');
									
								   } else {
									 e.preventDefault();
									 jQuery(this).removeClass('invalid');
									 var data = jQuery(".bg-form").serialize();
									 subscribe(data);
								   }
								 });
								}
								
							</script>
							

	<br class="clearit"/>
						<!-- Thanks box 
								<div id="thanksbox" style="display:none;">
								<h1><?php echo get_field('thanks_box_headline');?></h1>
								<p><?php echo get_field('thanks_box_copy');?></p>
								</div>
						 end thanks box -->
</section>

