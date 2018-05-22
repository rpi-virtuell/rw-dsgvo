<?php
$privacypageid = get_option( 'wp_page_for_privacy_policy' );
$post = get_post( $privacypageid );
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="de">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php $post->post_title; ?></title>

</head>
<body class="docs ">



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