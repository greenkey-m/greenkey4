<?php
/**
 * @package    greenkey4
 *
 * @author     matt <info@greenkey.ru>
 * @copyright  Copyright (C) 2018, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://greenkey.ru
 */

defined('_JEXEC') or die;

JHtml::_('jquery.framework');
JHtml::_('jquery.ui');
JHtml::_('behavior.framework');

use \Joomla\CMS\Factory;

//JHtml::script('https://maps.googleapis.com/maps/api/js?v=3.exp&language=ru');
JHtml::script('https://code.jquery.com/jquery-3.3.1.min.js', null, array('integrity' => 'sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN'));
//JHtml::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js');
//JHtml::script('https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js');
//JHtml::script('https://npmcdn.com/headroom.js@0.9.4/dist/headroom.min.js');
//JHtml::script('templates/' . $this->template . '/vendor/jquery.easypiechart.js');
//JHtml::script('templates/' . $this->template . '/vendor/jquery.sequence-min.js');
//JHtml::script('templates/' . $this->template . '/vendor/okvideo.min.js');
//JHtml::script('templates/' . $this->template . '/vendor/jquery.touchSwipe.min.js');
//JHtml::script('https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js');
//JHtml::script('templates/' . $this->template . '/vendor/bootstrap4/js/bootstrap.min.js');
//JHtml::script('https://maps.googleapis.com/maps/api/js?v=3.exp&language=ru');
//JHtml::script('http://maps.google.com/maps/api/js?sensor=true');
JHtml::script('templates/' . $this->template . '/node_modules/bootstrap/dist/js/bootstrap.bundle.js');
JHtml::script('templates/' . $this->template . '/node_modules/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js');
JHtml::script('templates/' . $this->template . '/code/web.js');
//JHtml::script('templates/' . $this->template . '/assets/template.js');

//JHtml::stylesheet('../media/jui/css/chosen.css');
//JHtml::stylesheet('https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css');
//JHtml::stylesheet('templates/' . $this->template . '/vendor/animate.css');
//JHtml::stylesheet('templates/' . $this->template . '/fonts/fontawesome5/css/fontawesome.css');
//JHtml::stylesheet('templates/' . $this->template . '/node_modules/bootstrap/css/bootstrap.min.css');
JHtml::stylesheet('templates/' . $this->template . '/assets/template.css');

// Check for a custom CSS file
/*$userCss = JPATH_SITE . '/templates/' . $this->template . '/assets/user.css';
if (file_exists($userCss) && filesize($userCss) > 0)
{
  JHtml::stylesheet($userCss);
}*/


$app             = Factory::getApplication();
$doc             = Factory::getDocument();
$user            = Factory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

$sitename = $app->get('sitename');

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');

// Check for modules in position, to correct grid
$has_left = ($this->countModules('left'));
$has_right = ($this->countModules('right'));
$center_class = "col-12 col-lg-8 col-xl-6";
if ((!$has_left) && ($has_right)) {
    $center_class = "col-12 col-lg-8 col-xl-9";
}
if (($has_left) && (!$has_right)) {
    $center_class = "col-12 col-lg-12 col-xl-9";
}
if ((!$has_left) && (!$has_right)) {
    $center_class = "col-12 col-lg-12 col-xl-12";
}

// Logo file or site title param
// Change to path
if ($params->get('logoFile')) {
    $logo = '<img class="logo" src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
} else {
    $logo = '<img class="logo" src="/images/logo/logo_full_small.png" />';
}



?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="templates/<?php echo $this->template ?>/media/favicons/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="templates/<?php echo $this->template ?>/media/favicons/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="templates/<?php echo $this->template ?>/media/favicons/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="templates/<?php echo $this->template ?>/media/favicons/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="templates/<?php echo $this->template ?>/media/favicons/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="templates/<?php echo $this->template ?>/media/favicons/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="templates/<?php echo $this->template ?>/media/favicons/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="templates/<?php echo $this->template ?>/media/favicons/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="templates/<?php echo $this->template ?>/media/favicons/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="templates/<?php echo $this->template ?>/media/favicons/mstile-310x310.png" />

    <!-- Google Webfonts
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,300,300italic,400italic,500,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,100,100italic,200,300,300italic,400italic,500,700,900' rel='stylesheet' type='text/css'> -->

    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>


    <jdoc:include type="head" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />

</head>
<body id="page-top">
<!--
<div id="bgndVideo" class="player" data-property="{
videoURL:'https://youtu.be/SLC1y4nAyzE',
containment:'body',
autoPlay:true,
mute:true,
startAt:0,
opacity:1,
quality:'highres',
loop:true}"></div>
<div id="bgndVideo" class="player" data-property="{
videoURL:'https://youtu.be/wFpeM3fxJoQ',
containment:'body',
autoPlay:true,
mute:true,
startAt:30,
stopAt:73,
opacity:1,
quality:'highres',
optimizeDisplay: true,

loop:true}"></div>
-->

<div id="spacebg">
    <canvas id="c"></canvas>
</div>

<aside class="offside">
    <div class="sideshadow"></div>
    <button id="offcanvas" type="button" class="offcanvas" type="button" data-toggle="offside">
        <!--<img src="images/logo/icon_white.png" />-->
        <i class="fas fa-bars"></i>
    </button>
    <div class="cover">
        <a href="/"><?php echo $logo; ?></a>
        <jdoc:include type="modules" name="sidebar" style="no" />
    </div>
</aside>

<div id="page-container">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-md-8 col-lg-9 main-flexbox">

                <!-- HEADER -->
                <header class="row">
                    <div class="col-1 col-sm-4">
                        <jdoc:include type="modules" name="sub-header-1" style="no" />
                    </div>
                    <div class="col-11 col-sm-8">
                        <jdoc:include type="modules" name="sub-header-2" style="no" />
                    </div>
                </header>

                <?php if ($this->countModules('top')) : ?>
                    <div class="row">
                        <div class="col">
                            <jdoc:include type="modules" name="top" style="no" />
                        </div>
                    </div>
                <?php endif; ?>

                <!-- BODY -->
                <main class="row">
                    <?php if ($has_left): ?>
                        <div class="col-12 <?php echo $has_right ? "col-sm-12" : "col-sm-4"; ?> col-md-12 <?php echo $has_right ? "col-lg-12" : "col-lg-4"; ?> col-xl-3">
                            <jdoc:include type="modules" name="left" style="no" />
                        </div>
                    <?php endif; ?>
                    <div class="col-12 col-sm  col-md col-lg  col-xl">
                        <jdoc:include type="modules" name="center-header" style="no" />
                        <jdoc:include type="message" />
                        <jdoc:include type="component" />
                        <jdoc:include type="modules" name="center-footer" style="col" />
                    </div>
                    <?php if ($has_right): ?>
                        <div class="col-12 col-sm-4  col-md-12 col-lg-4  col-xl-3">
                            <jdoc:include type="modules" name="right" style="no" />
                        </div>
                    <?php endif; ?>
                </main>

                <?php if ($this->countModules('bottom')) : ?>
                    <div class="row">
                        <div class="col">
                            <jdoc:include type="modules" name="bottom" style="no" />
                        </div>
                    </div>
                <?php endif; ?>

                <!-- FOOTER -->
                <footer class="row">
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
                        <jdoc:include type="modules" name="sub-footer-1" style="html5" />
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
                        <jdoc:include type="modules" name="sub-footer-2" style="html5" />
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
                        <jdoc:include type="modules" name="sub-footer-3" style="html5" />
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
                        <jdoc:include type="modules" name="sub-footer-4" style="html5" />
                    </div>
                </footer>


            </div>
        </div>
    </div>

</div>

</body>
</html>
