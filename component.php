<?php defined( '_JEXEC' ) or die; 

// variables
$app             = JFactory::getApplication();
$doc = JFactory::getDocument();
$tpath = $this->baseurl.'/templates/'.$this->template;

// generator tag
$this->setGenerator(null);

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet($tpath.'/css/j-template.css');
$doc->addStyleSheet($tpath.'/css/print.css');

?><!doctype html>

<html lang="<?php echo $this->language; ?>">

<head>
  <jdoc:include type="head" />
</head>

<body class="contentpane" id="print">
  <div id="overall">
    <jdoc:include type="message" />
    <jdoc:include type="component" />
  </div>
</body>

</html>
