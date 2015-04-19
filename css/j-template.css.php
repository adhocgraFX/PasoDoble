<?php
header('Content-type: text/css');

// get template params
$mainwidth = $this->params->get('mainwidth');
$asidewidth = $this->params->get('asidewidth');

$basefontsize = $this->params->get('basefontsize');
$textindent = $this->params->get('textindent');
$textresizer = $this->params->get('textresizer');

?>

<style type="text/css">

    html {
        font-size: <?php echo $basefontsize;?>%;
    }

    <?php if ($textindent == 1): ?>
        article p + p {
            text-indent: 1.5em;
            margin-top: -.75em;
        }

        article p.bild + p,
        article p.lead + p,
        article p.bildlegende + p,
        article p.autor + p,
        article p.readmore {
            text-indent: 0 !important;
        }

        article p.absatz {
            text-indent: 0 !important;
            margin-top: .75em !important;
        }
        article p.readmore a {
            margin: 0 !important;

        }

        article p.alert, article p.box {
            text-indent: 0 !important;
            margin: 1em 0 !important;
        }
    <?php endif; ?>

    <?php if (($textresizer == 1) or ($this->countModules('search'))): ?>
        button.actions {
            width: 3em;
        }
    <?php else : ?>
        button.actions {
            display: none !important;
            visibility: hidden;
        }
    <?php endif; ?>

    <?php if ($this->countModules('sidebar')): ?>
        button.sidebar-menu {
            width: 3em;
        }
    <?php else : ?>
        button.sidebar-menu {
            display: none !important;
            visibility: hidden;
        }
    <?php endif; ?>

    @media screen and (min-width: 48em){

        <?php if (($textresizer == 1) or ($this->countModules('search'))): ?>
            .app-bar-actions {
                height: 3em;
            }
        <?php else : ?>
            .app-bar-actions {
                height: 0;
            }
        <?php endif; ?>

        main {
            -webkit-flex: <?php echo $mainwidth;?>;
            -moz-flex: <?php echo $mainwidth;?>;
            -ms-flex: <?php echo $mainwidth;?>;
            flex: <?php echo $mainwidth;?>;
        }

        aside.sidebar-container {
            -webkit-flex: <?php echo $asidewidth;?>;
            -moz-flex: <?php echo $asidewidth;?>;
            -ms-flex: <?php echo $asidewidth;?>;
            flex: <?php echo $asidewidth;?>;
        }
    }

</style>