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

/** @var JDocumentHtml $this */

$app = JFactory::getApplication();

// Output as HTML5
$this->setHtml5(true);

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add html5 shiv
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// Add Stylesheets
JHtml::_('stylesheet', $this->baseurl . '/templates/' . $this->template . '/assets/template.css', array('version' => 'auto'), array('version' => 'auto', 'relative' => true));

// Load optional rtl Bootstrap css and Bootstrap bugfixes
JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <jdoc:include type="head" />
</head>
<body class="contentpane modal<?php echo $this->direction === 'rtl' ? ' rtl' : ''; ?>">
<jdoc:include type="message" />
<jdoc:include type="component" />
</body>
</html>
