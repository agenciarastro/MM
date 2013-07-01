<?php
/*
Template Name: Tour
*/
?>

<?php get_header(); ?>
	<div id="content">
	
		<script src="<?php bloginfo('template_url'); ?>/library/tour/swfobject/swfkrpano.js" type="text/javascript"></script>
		<div id="panoDIV">
		  <script>
		    embedpano({target:"panoDIV",swf:"<?php bloginfo('template_url'); ?>/library/tour/templo.swf", wmode:"transparent"});
		  </script>
		    <noscript>
		      <div id="tour">
		        <object width="100%" height="100%">
		          <embed src="<?php bloginfo('template_url'); ?>/library/tour/templo.swf" width="100%" height="100%" allowFullScreen="true" wmode="transparent"></embed>
		        </object>
		      </div>
		    </noscript>
		  </div>
		  
	</div> <!-- end #content -->
<?php get_footer(); ?>