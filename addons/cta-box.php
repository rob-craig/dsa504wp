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
        <input type="text" placeholder="Name"/>
        <input type="email" placeholder="Email"/>
        <input type="text" id="mmm_honey" value="" />
        <input type="tel" placeholder="Phone (Optional)"/>

        <input type="submit" value="Submit"/>
</div>