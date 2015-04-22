<?php defined( '_JEXEC' ) or die;

/**
 * @copyright	Paso Doble responsive Joomla! 3 template © 2015 adhocgraFX / Johannes Hock - All Rights Reserved.
 * @license		GNU/GPL
 **/

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$sitename = $app->get('sitename');

// get template params
$logo = $this->params->get('logo');
$textresizer = $this->params->get('textresizer');

// generator tag
$this->setGenerator(null);

// get template params

// Add Joomla! JavaScript Framework
JHtml::_('bootstrap.framework');
// JHtml::_('jquery.framework');

// Add current user information
$user = JFactory::getUser();

if ($view == "form" or $layout == "edit"):
    // $doc->addStyleSheet($tpath.'/css/jui-bootstrap/jui-template.css');
    // template css
    $doc->addStyleSheet($tpath.'/css/j-template.css');
else:
    // template css
    $doc->addStyleSheet($tpath.'/css/j-template.css');
endif;?>

<!doctype html>

<html lang="<?php echo $this->language; ?>">

<head>

  <jdoc:include type="head" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- brick fonts -->
    <link rel="stylesheet" href="//brick.a.ssl.fastly.net/Fira+Sans:300,300i,400,400i,500,500i">

  <!-- Bildverkleinerung über mobify cdn -->
  <script>!function(a,b,c,d,e){function g(a,c,d,e){var f=b.getElementsByTagName("script")[0];a.src=e,a.id=c,a.setAttribute("class",d),f.parentNode.insertBefore(a,f)}a.Mobify={points:[+new Date]};var f=/((; )|#|&|^)mobify=(\d)/.exec(location.hash+"; "+b.cookie);if(f&&f[3]){if(!+f[3])return}else if(!c())return;b.write('<plaintext style="display:none">'),setTimeout(function(){var c=a.Mobify=a.Mobify||{};c.capturing=!0;var f=b.createElement("script"),h="mobify",i=function(){var c=new Date;c.setTime(c.getTime()+3e5),b.cookie="mobify=0; expires="+c.toGMTString()+"; path=/",a.location=a.location.href};f.onload=function(){if(e)if("string"==typeof e){var c=b.createElement("script");c.onerror=i,g(c,"main-executable",h,mainUrl)}else a.Mobify.mainExecutable=e.toString(),e()},f.onerror=i,g(f,"mobify-js",h,d)})}(window,document,function(){var a=/webkit|msie\s10|(firefox)[\/\s](\d+)|(opera)[\s\S]*version[\/\s](\d+)|3ds/i.exec(navigator.userAgent);return a?a[1]&&+a[2]<4?!1:a[3]&&+a[4]<11?!1:!0:!1},
        // path to mobify.js
        "//cdn.mobify.com/mobifyjs/build/mobify-2.0.0.min.js",
        // calls to APIs go here
        function() {
          var capturing = window.Mobify && window.Mobify.capturing || false;
          if (capturing) {
            Mobify.Capture.init(function(capture){
              var capturedDoc = capture.capturedDoc;
              var images = capturedDoc.querySelectorAll("img, picture");
              Mobify.ResizeImages.resize(images);
              // Render source DOM to document
              capture.renderCapturedDoc();
            });
          }
        });
  </script>

    <!-- Web Application Manifest -->
    <link rel="manifest" href="manifest.json">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="<?php echo htmlspecialchars($app->getCfg('sitename')); ?>">
  <link rel="icon" sizes="192x192" href="<?php echo $tpath; ?>/images/touch/chrome-touch-icon-192x192.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="<?php echo htmlspecialchars($app->getCfg('sitename')); ?>">
  <link rel="apple-touch-icon" href="<?php echo $tpath; ?>/images/touch/apple-touch-icon.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
  <meta name="msapplication-TileColor" content="#2c4d91">

  <meta name="theme-color" content="#3372DF">

  <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
  <!--
  <link rel="canonical" href="http://www.example.com/">
  -->

  <!-- load css options -->
  <?php include_once ('css/j-template.css.php'); ?>


</head>
  
<body class="<?php echo $option . ' view-' . $view . ($layout ? ' layout-' . $layout : ' no-layout') . ($task ? ' task-' . $task : ' no-task');
    ?> <?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?>">

<header class="app-bar promote-layer" role="banner">
    <section class="app-bar-actions">
        <?php if ($textresizer == 1): ?>
            <div class="textresizer-container">
                <ul class="textresizer" id="textsizer-embed">
                    <li><a href="#nogo" class="small-text" title="small"><span class="icon-chevron-down"></span><p hidden>small</p></a></li>
                    <li><a href="#nogo" class="default-text" title="default"><span class="icon-format-size"></span><p hidden>default</p></a></li>
                    <li><a href="#nogo" class="large-text" title="large"><span class="icon-chevron-up"></span><p hidden>large</p></a></li>
                </ul>
            </div>
        <?php endif; ?>
        <?php if ($this->countModules('search')): ?>
            <div class="search-container">
                <jdoc:include type="modules" name="search" style="jduo"  />
            </div>
        <?php endif; ?>
    </section>
    <section class="app-bar-container">
        <button class="menu" aria-label="Navigation"></button>
        <a href="<?php echo $this->baseurl ?>">
            <h1 class="logo-text"><?php echo htmlspecialchars($sitename); ?></h1>
        </a>
        <button class="actions" aria-label="actions"></button>
        <button class="sidebar-menu" aria-label="Sidebar"></button>
    </section>
</header>

<nav class="navdrawer-container promote-layer" role="navigation">
    <?php if ($logo): ?>
        <div class="logo-image">
            <a href="<?php echo $this->baseurl ?>">
                <img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"  alt="<?php echo htmlspecialchars($sitename); ?>" />
            </a>
        </div>
    <?php else: ?>
        <h4>Navigation</h4>
    <?php endif; ?>

    <jdoc:include type="modules" name="nav" />
</nav>

<section class="layout block-group">
    <?php if ($this->countModules('slideshow')): ?>
        <section class="slider-container" role="complementary">
            <jdoc:include type="modules" name="slideshow" style="flickity"/>
        </section>
    <?php endif; ?>

    <?php if ($this->countModules('top_row')): ?>
        <section class="top" role="complementary">
            <jdoc:include type="modules" name="top_row" style="jduo" />
        </section>
    <?php endif; ?>

    <section class="main-container">
        <main role="main">
            <jdoc:include type="message" />
            <jdoc:include type="component" />
        </main>
        <?php if ($this->countModules('sidebar')): ?>
            <aside class="sidebar-container" role="complementary">
                <h4 class="sidebar-text">Sidebar</h4>
                <jdoc:include type="modules" name="sidebar" style="jduo"  />
            </aside>
        <?php endif; ?>
    </section>

    <?php if ($this->countModules('bottom_row')): ?>
        <section class="bottom" role="complementary">
            <jdoc:include type="modules" name="bottom_row" style="jduo" />
        </section>
    <?php endif; ?>
</section>

<?php if ($this->countModules('breadcrumbs')): ?>
    <section class="breadcrumbs-container block-group" role="navigation">
        <jdoc:include type="modules" name="breadcrumbs" />
    </section>
<?php endif; ?>

<?php if ($this->countModules('footer')): ?>
  <footer class="block-group" role="contentinfo">
      <jdoc:include type="modules" name="footer" style="jduo" />
  </footer>
<?php endif; ?>

<a href="#" class="go-top"><span class="icon-chevron-up"></span><p hidden>Top</p></a>

<jdoc:include type="modules" name="debug" />

<!--  load plugin scripts
<script src="//cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.min.js"></script>
-->
<script type="text/javascript" src="<?php echo $tpath.'/js/template.js.php';?>"></script>

<!-- load plugin options -->
<?php include_once ('js/plugin.js.php'); ?>

</body>

</html>
