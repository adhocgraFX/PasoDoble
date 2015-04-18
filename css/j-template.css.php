<?php
header('Content-type: text/css');

// get template params
$brandtextcolor = $this->params->get('brandtextcolor');
$bodybackground = $this->params->get('bodybackground');
$maxwidth = $this->params->get('maxwidth');
$basefontsize = $this->params->get('basefontsize');
$textindent = $this->params->get('textindent');

?>

<style type="text/css">

    html {
        font-size: <?php echo $basefontsize;?>%;
    }

    h1.logo-text, .navdrawer-container h4, aside h4 {
        color: <?php echo $brandtextcolor;?> !important;
    }

    <?php if ($textindent == 1): ?>
        article p + p {
            text-indent: 1.5em;
            margin-top: -.75em;
        }

        article p.bild + p,
        article p.lead + p,
        article p.bildlegende + p,
        article p.autor + p {
            text-indent: 0 !important;
        }

        article p.readmore {
            text-indent: 0 !important;
            display: block;
            padding: 1em 0 2em 0;
        }

        article p.readmore a {
            margin: 0 !important;
        }
    <?php endif; ?>

    @media screen and (min-width: 48em){

        <?php if ($bodybackground): ?>
            body {
                background: url(<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($bodybackground);?>) center top no-repeat fixed;
                background-size: cover;
            }
        <?php endif; ?>

        main {
            max-width: <?php echo $maxwidth;?>em;
        }

        <?php if ($this->countModules('sidebar')): ?>
            .main-container {
                width: 66.6666%;
            }
            .sidebar-container {
                width: 33.3333%;
            }
        <?php else : ?>
            .main-container {
                width: 100%;
            }
        <?php endif; ?>
    }

</style>