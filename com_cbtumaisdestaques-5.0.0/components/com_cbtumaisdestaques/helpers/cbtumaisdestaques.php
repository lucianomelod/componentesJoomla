<?php

/**
 * @version    CVS: 5.0.0
 * @package    Com_Cbtumaisdestaques
 * @author     Luciano Melo <lucianomelod@gmail.com>
 * @copyright  2018 Luciano Melo
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

JLoader::register('CbtumaisdestaquesHelper', JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_cbtumaisdestaques' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'cbtumaisdestaques.php');

/**
 * Class CbtumaisdestaquesFrontendHelper
 *
 * @since  1.6
 */
class CbtumaisdestaquesHelpersCbtumaisdestaques
{
	/**
	 * Get an instance of the named model
	 *
	 * @param   string  $name  Model name
	 *
	 * @return null|object
	 */
	public static function getModel($name)
	{
		$model = null;

		// If the file exists, let's
		if (file_exists(JPATH_SITE . '/components/com_cbtumaisdestaques/models/' . strtolower($name) . '.php'))
		{
			require_once JPATH_SITE . '/components/com_cbtumaisdestaques/models/' . strtolower($name) . '.php';
			$model = JModelLegacy::getInstance($name, 'CbtumaisdestaquesModel');
		}

		return $model;
	}

	/**
	 * Gets the files attached to an item
	 *
	 * @param   int     $pk     The item's id
	 *
	 * @param   string  $table  The table's name
	 *
	 * @param   string  $field  The field's name
	 *
	 * @return  array  The files
	 */
	public static function getFiles($pk, $table, $field)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select($field)
			->from($table)
			->where('id = ' . (int) $pk);

		$db->setQuery($query);

		return explode(',', $db->loadResult());
	}

    /**
     * Gets the edit permission for an user
     *
     * @param   mixed  $item  The item
     *
     * @return  bool
     */
    public static function canUserEdit($item)
    {
        $permission = false;
        $user       = JFactory::getUser();

        if ($user->authorise('core.edit', 'com_cbtumaisdestaques'))
        {
            $permission = true;
        }
        else
        {
            if (isset($item->created_by))
            {
                if ($user->authorise('core.edit.own', 'com_cbtumaisdestaques') && $item->created_by == $user->id)
                {
                    $permission = true;
                }
            }
            else
            {
                $permission = true;
            }
        }

        return $permission;
    }
}
