<?php
/**
 * @version    CVS: 5.0.0
 * @package    Com_Cbtumaisdestaques
 * @author     Luciano Melo <lucianomelod@gmail.com>
 * @copyright  2018 Luciano Melo
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Cbtumaisdestaques', JPATH_COMPONENT);
JLoader::register('CbtumaisdestaquesController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = JControllerLegacy::getInstance('Cbtumaisdestaques');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
