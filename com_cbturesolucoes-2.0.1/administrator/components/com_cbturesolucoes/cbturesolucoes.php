<?php
/**
 * @version    CVS: 1.1.0
 * @package    Com_Cbturesolucoes
 * @author     Luciano Melo <lucianomelod@gmail.com>
 * @copyright  2018 Luciano Melo
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_cbturesolucoes'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Cbturesolucoes', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('CbturesolucoesHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'cbturesolucoes.php');

$controller = JControllerLegacy::getInstance('Cbturesolucoes');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
