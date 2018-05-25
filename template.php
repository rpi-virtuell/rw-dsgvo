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
<style>

    #more-rpi-container-sidebar {
        position: fixed;
        top: 0;
        /*left: -400px;*/
        bottom: 0;
        width: 20%;
        color: #fff;
        z-index: 100001;
        margin-top: 70px;
        padding:0 30px 0 0;
        min-width: 300px;
        display: none;
    }


    #rpi-container-sidebar-button {
        position: absolute;
        /*left: 375px;*/
        transform: rotate(90deg);
        top: 88px;
        padding: 2px 10px 0 10px;
        border-radius: 5px 5px 0 0;
        box-shadow: 3px 2px 5px -1px rgba(0,0,0,0.71);
        font-family: monospace;
    }

    #more-rpi-container-sidebar .rpi-container-sidebar-wrapper {
        background: #093E5A;
        padding: 0 0 30px 0;
        width:80px;
    }

    .admin-bar #more-rpi-container-sidebar {
        margin-top: 101px;
    }
    .rpi-container-sidebar-content{
        /*font-family: "Imprima","Open Sans",sans-serif;*/
        font-size:15px;
        padding-top: 20px;

    }
    .rpi-container-sidebar-content ul{
        list-style: none;
        line-height: 1.7;
    }

    .rpi-container-sidebar-content a:hover{
        color:white;
    }
    /** twenty seven **/
    .home.admin-bar .custom-header-media{
        height: calc(100vh - 97px )!important;
    }
    .home .custom-header-media {
        height: calc(100vh - 65px )!important;
    }

    #more-rpi-container-sidebar .rpi-container-sidebar-title{
        font-size: 15px;
        font-weight: bold;
        text-align: center;
        clear:both;
    }

    #more-rpi-container-sidebar .rpi-core-services li{
        width: 44%;
        height: 100px;
        float: left;
        margin-left:4%;
        margin-bottom:4%;
    }
    #more-rpi-container-sidebar .rpi-core-services li a{
        display: block;
        margin:10px;
    }
    .rpi-container-sidebar-content .rpi-core-services span{
        font-size: 24px;
        font-weight: bold;
    }
    #more-rpi-container-sidebar .rpi-more-services{
        margin: 4%;
    }
    #more-rpi-container-sidebar .rpi-more-services li{
        margin: 4%;
    }
    #more-rpi-container-sidebar .rpi-about-link{
        margin: 4%;
        border: 1px solid #1B638A;
    }
    #more-rpi-container-sidebar .rpi-about-link ul{
        margin: 4%;

    }

    /*****************************************************************************/
    /* header bar */

    #rw-mn {
        position: fixed;
        top:0;
        left:0;
        z-index: 100001;
        width: 100%;
        border:0;
        -webkit-box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.71);
        -moz-box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.71);
        box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.71);
    }
    #rw-mn-shadow{
        height:65px;
        width:100%;
        display: none;
    }
    #rw-mn, #rw-mn a{
        color:snow;
        text-decoration: none;
    }
    #rw-mn a:hover{
        /*text-decoration: underline;*/
    }

    #rw-mn .rpi-header{
        display: flex;
        flex-flow: nowrap;
        min-width: 400px;
        height: 70px;
        max-width: 100%;
    }
    #rw-mn .rpi-left-col{
        flex: 0 400px;
        /*min-width: 350px;*/
    }
    #rw-mn .rpi-center-col{
        flex: 1 0px;
        position: relative;

    }
    #rw-mn .rpi-right-col{
        flex: 0 400px;

    }


    #rw-mn [class*=" icon-"]{
        background-image: none !important;
    }
    /*****************************************************************************/
    /* left col logo */

    #rw-mn .rpi-header-logo{
        line-height: 1;
        background-position: 0 -16px!important;
        height: 70px;
        display: flex;
        flex-flow: nowrap;
        width:100%;
        overflow: hidden;
    }
    #rw-mn .rpi-header-logo .rpi-header-blogname{
        flex: 1;
        line-height: 1.5;
        text-transform: lowercase;
        min-width: 170px;

    }
    #rw-mn .rpi-header-logo img{
        height: 62px;
        opacity:1;
        flex:0 70px;
        margin:5px;
    }
    #rw-mn .rpi-header-more-rpi{
        height: 70px;
        width:70px;
        min-width:70px;
        max-width:70px;
        opacity:1;
        flex:0 70px;
        /*margin: 5px 5px 5px -15px;*/


    }
    #rw-mn .rpi-header-more-rpi a{
        display: block;
        font-size: 22px;
        height: 70px;
        width: 80px;
        padding: 25px 25px;
        /*margin: -5px -10px auto auto;*/

    }


    /*****************************************************************************/
    /* center col */

    #rw-mn #rpi-top-menu a{
        color: #444;
        font-weight: bold;
    }
    #rw-mn #rpi-top-menu a:hover{
        color: #999;
    }
    #rw-mn #rpi-top-menu .current-menu-item a{
        color: #999;
    }
    #rw-mn #rpi-top-menu{
        position: absolute;
        z-index: 9999;
        font-size: .9vw;
        margin-right: 70px;
    }
    #rw-mn #rpi-top-menu li{
        list-style: none;
        float: left;
        padding-left: 20px;
    }
    #rw-mn #rpi-top-menu .menu-scroll-down{
        display: none;
    }

    #rw-mn .rw-search-wrapper{
        display: flex;
        flex-flow: nowrap;
        min-width: 150px;
        max-width: 100%;
        height: 70px;
        overflow: hidden;
        border: none;
    }
    #rw-mn .rw-search-wrapper input{
        flex: 1;
        border: none;
        border-radius: 0;
        height: 70px;
        font-size: 28px;
        padding: 0 20px;
        margin: 0;
        background-image: none;
        width:auto;
    }
    #rw-mn .rw-search-wrapper button {
        flex: 0 20px;
        height: 70px;
        border: none;
        border-radius: 0;
        font-size: 20px;
        padding: 0 25px;
        min-width: 70px;
        background-position: center center;
    }

    #rw-mn #searchsubmit{
        background-size: 20px;
        right:0;
    }
    #rw-mn #searchsubmit:hover{
        background-size: 24px;
    }
    #rw-mn .rw-search-wrapper label{
        display: none;
    }
    #rw-mn .rpi-center-col .header-navigation li {
        font-size: 11px;
    }
    #rw-mn form {
        margin:0 !important;
    }

    /* right col */
    #rw-mn .rpi-right-col .header-navigation{
        width:100%;
        display: block;
        height:70px;
        overflow: hidden;
    }
    #rw-mn .rpi-right-col ul{
        margin: 0;

    }
    #rw-mn .header-navigation ul{
        list-style: none;

    }
    /* not logged in vistors */

    #rw-mn .rpi-right-col ul.rpi-header-signon{
        width:100%;
        display: flex;
        flex-flow: nowrap;
        height: 70px;
        padding-right: 29px;
        justify-content: space-between;
    }
    #rw-mn .rpi-right-col ul.rpi-header-signon .rpi-header-services{

    }
    #rw-mn .rpi-right-col ul.rpi-header-signon .register-button{
        flex: 40%;
        margin-top: 25px;
        text-align: right;

    }
    #rw-mn .rpi-right-col ul.rpi-header-signon .login-button{
        flex: 40%;
        margin-top: 25px;
        float: right;
    }


    #rw-mn .rpi-header-button a{
        width: auto;
        text-align: center;
        padding: 3px 20px;
        border-radius: 3px;
        display: block;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
        margin: 0 10px;
    }
    #rw-mn .rpi-header-button a:hover{
        text-decoration: none !important;
        color: #ffffff;
    }

    #rw-mn .rpi-header-account li.icon-button{
        padding: 20px 20px;
        font-size: 23px;
    }


    /* logged in users */

    #rw-mn .rpi-right-col ul.rpi-header-account{
        width:100%;
        display: flex;
        flex-flow: nowrap;
        height: 70px;
        padding-right: 29px;
    }

    #rw-mn .rpi-right-col ul.rpi-header-account .rpi-header-services{
        flex: 0 50px;
    }
    #rw-mn .rpi-right-col ul.rpi-header-account .rpi-header-notifications{
        flex: 0 50px;
    }
    #rw-mn .rpi-right-col ul.rpi-header-account .rpi-header-avatar{
        flex: 1;
        display: flex;
        flex-flow: nowrap;
    }
    #rw-mn .rpi-right-col .rpi-header-avatar .rpi-user-name{
        flex: 1;
        text-align: right;
        line-height: 11px;
        margin-top: 21px;
    }
    #rw-mn .rpi-right-col .rpi-header-avatar .rpi-user-avatar{
        flex: 0 55px
    }

    #rw-mn .rpi-header-avatar{
        margin-top: 10px;
    }
    #rw-mn .rpi-user-name span{
        font-size:0.95em;
    }
    #rw-mn #rpi-user-avatar{
        margin-right: 20px;
    }

    #rw-mn #rpi-user-avatar img{
        border-radius:50%;
        width:50px;
        margin-left: 15px;
        height: auto;
    }

    #rpi-header-dropdown, #rpi-left-menu-toggle, #rpi-pending-notifications{
        display:none;
    }

    nav ul li ul {
        position: absolute;
        top: 69px;
        right: 0px;
        z-index: 8;
        text-align: left;
    }
    nav ul li ul li {
        width:200px;
    }
    nav ul li ul li a {
        display:block;
        padding:10px 10px;
        font-size: 0.950rem;
    }
    nav ul li ul.fallback {
        display:none;
    }
    nav ul li:hover ul.fallback {
        display:block;
    }

    #rw-mn nav.mobile{
        display:none;
    }

    /******************************************************************************************/
    body.no-navbar #tc-page-wrap .tc-header, #tc-sn{
        top: 70px!important;
    }
    body.admin-bar #tc-page-wrap .tc-header, #tc-sn{
        top: 100px!important;
    }

    #page-container header#main-header{
        top: 100px;
    }
    .navigation-top{
        z-index:9;
    }

    @media all and (max-width: 1024px) {
        /*
		.rpi-header-notifications, .rpi-user-name{
			display: none;
		}
		#rw-mn .rpi-right-col ul.rpi-header-account .rpi-header-avatar{
			display: inline;
			float: right;
		}
		#rw-mn #rpi-user-avatar {
			margin-right: 13px;
			width:100%;
		}
		#rw-mn .rpi-header-more-rpi{

		}
		#rw-mn .rw-search-wrapper{
			flex: 0;
		}
		*/
        #rw-mn .rpi-header-logo .rpi-header-blogname{

        }
        #rw-mn .rpi-left-col{
            flex:0 75%;
        }
        #rw-mn .rpi-right-col{
            flex:0 25%;
        }
        #rw-mn nav.mobile{
            display:block;
        }

        #rw-mn nav.mobile ul.rpi-header-account .rpi-header-avatar {

            display: flex;
            float: right;

        }
        #more-rpi-container-sidebar ul{
            padding: 0;
            margin: 0;
            min-width:90px;
        }
        .rpi-header-button, .rpi-header-signon{
            display:none;
        }

        #rw-mn .rpi-left-col{
            flex: 0 400px;
            max-width: 400px;
        }
        #rw-mn .rpi-right-col{
            flex:1;
        }
        #rw-mn .rpi-header-more-rpi {
            display: none;
        }
        .rpi-header-button, .rpi-header-signon{
            display:none;
        }
        #rw-mn nav.mobile ul.rpi-header-account .rpi-header-avatar, #rpi-user-avatar {

            display: inline;
            float: right;

        }
    }
    @media all and (max-width: 900px) {
        #rw-mn .rpi-center-col{
            display: none;
        }
    }

    @media all and (max-width: 768px) {

        #rw-mn{
            position:absolute;
        }
        #rw-mn .rpi-header-avatar {
            margin-top: 17px;
        }
        #rw-mn .rpi-header-logo img{
            margin-top: 11px;
        }


        #rw-mn .rpi-header-logo .rpi-header-blogname{

        }
        #rw-mn .rpi-left-col{
            flex:0 75%;
        }
        #rw-mn .rpi-right-col{
            flex:0 25%;
        }
        #rw-mn nav.mobile{
            display:block;
        }


        #more-rpi-container-sidebar ul{
            padding: 0;
            margin: 0;
            min-width:90px;
        }


    }

    @media all and (max-width: 420px) {
        rpi-header-more-rpi{
            display: none;
        }

        rw-mn .rpi-center-col{
            display: none;
        }
        #rw-mn .rpi-left-col{
            width:75%;
        }
        #rw-mn .rpi-right-col{
            width:25%;
        }
        #rw-mn nav.mobile{
            display:block;
        }

        #more-rpi-container-sidebar ul{
            padding: 0;
            margin: 0;
            min-width:90px;
        }
        .rpi-header-button, .rpi-header-signon{
            display:none;
        }
    }


    *{
        font-family: "Roboto","Open Sans",sans-serif;
    }

    #wpadminbar{
        background-color: #093E5A;
        z-index: 99999999;
    }

    /* news */
    .rpi-service-news{
        background-color: #169361;
    }
    /* material */
    .rpi-service-materialpool{
        background-color: #D95821;
    }
    /* gruppen */
    .rpi-service-gruppen{
        background-color: #734F89;
    }
    /* blogs */
    .rpi-service-blogs{
        background-color: #D98521;
    }

    /* more */
    .rpi-service-more{
        background-color: #1B638A;
    }


    #rw-mn {
        background-color: #1B638A;
    }
    #rw-mn a{
        color: snow;
    }
    #rw-mn a:hover{
        color: #fff;
    }

    .rpi-header-logo .rpi-header-blogname{
        color:snow;
        padding: 15px 0 0 20px;
        font-size: 30px;
        text-align: center;

    }
    #more-rpi-container-sidebar {
        background: transparent;
    }
    #more-rpi-container-sidebar .rpi-container-sidebar-wrapper {
        background: #093E5A;
    }
    a#rpi-container-sidebar-button {
        background-color: #093E5A;
        color: #fff;
    }
    a#rpi-container-sidebar-button:hover {
        background-color: #1B638A;
        color: #fff;
    }

    .rpi-container-sidebar-content a{
        color:#ddd;
    }

    /* button icons */
    #rw-mn .rw-search-wrapper button i{
        color: #ffffff;
    }
    #rw-mn nav ul li ul li a{
        border-top: 1px solid #337A9A;
        color:snow;
    }
    /* search field background color */
    #rw-mn .rw-search-wrapper input{
        background-color: snow;
    }

    /*********************************************************************/
    #rw-mn a.rpi-notification-link.no-alert{
        color:#92AAB5;
    }


</style>
<div id="rw-mn" style="margin-bottom: 30px;">
<header id="rpi-masthead" class="rpi-site-header" role="banner" data-infinite="on">

    <div class="rpi-header-wrap">
        <div class="rpi-header">

            <div class="rpi-left-col">

                <div class="rpi-header-logo">
                    <a href="//rpi-virtuell.de/"><img src="https://about.rpi-virtuell.de/wp-content/plugins/rw-multiinstanz-navigation//assets/rpi-logo-trans.png"></a>
                    <div class="rpi-header-blogname">
                        <!--style="background: url('https://about.rpi-virtuell.de/wp-content/plugins/rw-multiinstanz-navigation//assets/blogs.png') no-repeat 10px center; background-size: 50px"-->
                        <a href="https://about.rpi-virtuell.de">
                            rpi-virtuell                            </a>
                        <!-- mehr rpi-virtuell -->
                    </div>
                    <div class="rpi-header-more-rpi">
                        <a id="rpi-services-button" href="#mehr-rpi-virtuell">
                            <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                        </a>
                    </div>
                </div><!--.header-links-->

            </div><!--.left-col-->

            <div class="rpi-center-col">
                <div id="rpi-top-menu">

                </div>
                <div class="header-navigation">
<br>
 Wir brauchen ihr Einverständnis        </div>
            </div><!--.center-col-->


        </div>
    </div>
</header>
</div>
<div style="margin-top: 90px;">
<?php dynamic_sidebar( 'sidebar-dsgvo-top' ); ?>

<p>
    Liebe Nutzerin, lieber Nutzer,
</p><p>
    wir freuen uns, dass Sie unseren Dienst in Anspruch nehmen wollen.
</p><p>
    rpi-virtuell ist Teil des Comenius-Instituts in Münster und stellt zahlreiche Dienste und Webseiten für den Bildungsbereich bereit. Unsere Dienste vernetzen Bildungsinformationen weit über den kirchlichen Bereich hinaus. Dabei werden auch personenbezogene Daten verarbeitet.
</p><p>
    In unserer Datenschutzerklärung erläutern wir, welche Daten wir verarbeiten und wofür wir sie benötigen. Für die Nutzung unseres Angebotes benötigen wir Ihre Zustimmung.
</p>

<iframe width="100%" height="100%" src="https://about.rpi-virtuell.de/datenschutz/"></iframe>
<?php
$privacypageid = get_option( 'wp_page_for_privacy_policy' );
$post = get_post( $privacypageid );
//echo $post->post_content;
?>

<form >
	<button type="submit" name="dsgvo" value="ok">Ja, ich bin damit einverstanden!</button>
</form>
<?php dynamic_sidebar( 'sidebar-dsgvo-bottom' ); ?>
</div>
</body>
</html>
