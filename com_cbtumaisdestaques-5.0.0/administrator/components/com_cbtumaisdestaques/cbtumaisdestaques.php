<?php
/**
 * @version    CVS: 5.0.0
 * @package    Com_Cbtumaisdestaques
 * @author     Luciano Melo <lucianomelod@gmail.com>
 * @copyright  2018 Luciano Melo
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_cbtumaisdestaques'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Cbtumaisdestaques', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('CbtumaisdestaquesHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'cbtumaisdestaques.php');

$controller = JControllerLegacy::getInstance('Cbtumaisdestaques');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
