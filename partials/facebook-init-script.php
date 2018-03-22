<?php if ( get_facebook_app_id() ): ?>
	<div id="fb-root"></div>
	<script>!function ( e, t, n )
		{
			var o, s = e.getElementsByTagName( t )[ 0 ];
			e.getElementById( n ) || (o = e.createElement( t ), o.id = n, o.src = "//connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v2.8&appId=<?php echo get_facebook_app_id(); ?>", s.parentNode.insertBefore( o, s ))
		}( document, "script", "facebook-jssdk" );</script>
<?php endif; ?>