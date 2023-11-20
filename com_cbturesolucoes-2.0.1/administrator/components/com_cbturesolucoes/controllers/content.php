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

jimport('joomla.application.component.controllerform');

/**
 * Content controller class.
 *
 * @since  1.6
 */
class CbturesolucoesControllerContent extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'contents';
		parent::__construct();
	}
}
