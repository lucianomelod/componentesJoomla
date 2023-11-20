<?php
/**
 * @copyright	Copyright © 2018 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @generator	http://xdsoft/joomla-module-generator/
 */
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
/* Available fields:"categoria1","categoria2","categoria3","categoria4","categoria5","categoria6","categoria7", */
// Include assets
$doc->addStyleSheet(JURI::root()."modules/mod_cbtuinforhme/assets/css/style.css");
$doc->addScript(JURI::root()."modules/mod_cbtuinforhme/assets/js/script.js");
// $width 			= $params->get("width");
/** 
	$db = JFactory::getDBO();
	$db->setQuery("SELECT * FROM #__mod_cbtuinforhme where del=0 and module_id=".$module->id);
	$objects = $db->loadAssocList();
*/

require JModuleHelper::getLayoutPath('mod_cbtuinforhme', $params->get('layout', 'default'));