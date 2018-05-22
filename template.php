<html>
<body>

<?php dynamic_sidebar( 'sidebar-dsgvo-top' ); ?>
<?php
$privacypageid = get_option( 'wp_page_for_privacy_policy' );
$post = get_post( $privacypageid );
echo $post->post_content;
?>

<form >
	<button type="submit" name="dsgvo" value="ok">Ja, ich bin damit einverstanden!</button>
</form>
<?php dynamic_sidebar( 'sidebar-dsgvo-bottom' ); ?>

</body>
</html>