<?php

/**
 * @version    CVS: 5.0.0
 * @package    Com_Cbtumaisdestaques
 * @author     Luciano Melo <lucianomelod@gmail.com>
 * @copyright  2018 Luciano Melo
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Cbtumaisdestaques records.
 *
 * @since  1.6
 */
class CbtumaisdestaquesModelContents extends JModelList
{
/**
	* Constructor.
	*
	* @param   array  $config  An optional associative array of configuration settings.
	*
	* @see        JController
	* @since      1.6
	*/
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.`id`',
				'ordering', 'a.`ordering`',
				'state', 'a.`state`',
				'created_by', 'a.`created_by`',
				'modified_by', 'a.`modified_by`',
				'title', 'a.`title`',
				'catid', 'a.`catid`',
				'created', 'a.`created`',
			);
		}

		parent::__construct($config);
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @param   string  $ordering   Elements order
	 * @param   string  $direction  Order direction
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.
		$app = JFactory::getApplication('administrator');

		// Load the filter state.
		$search = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string');
		$this->setState('filter.state', $published);
		// Filtering title
		$this->setState('filter.title', $app->getUserStateFromRequest($this->context.'.filter.title', 'filter_title', '', 'string'));

		// Filtering catid
		$this->setState('filter.catid', $app->getUserStateFromRequest($this->context.'.filter.catid', 'filter_catid', '', 'string'));

		// Filtering created
		$this->setState('filter.created', $app->getUserStateFromRequest($this->context.'.filter.created', 'filter_created', '', 'string'));


		// Load the parameters.
		$params = JComponentHelper::getParams('com_cbtumaisdestaques');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.title', 'asc');
	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param   string  $id  A prefix for the store id.
	 *
	 * @return   string A store id.
	 *
	 * @since    1.6
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id .= ':' . $this->getState('filter.search');
		$id .= ':' . $this->getState('filter.state');

		return parent::getStoreId($id);
	}

	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return   JDatabaseQuery
	 *
	 * @since    1.6
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db    = $this->getDbo();
		$query = $db->getQuery(true);

		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select', 'DISTINCT a.*'
			)
		);
		$query->from('`#__content` AS a');

		// Join over the users for the checked out user
		$query->select("uc.name AS uEditor");
		$query->join("LEFT", "#__users AS uc ON uc.id=a.checked_out");

		// Join over the user field 'created_by'
		$query->select('`created_by`.name AS `created_by`');
		$query->join('LEFT', '#__users AS `created_by` ON `created_by`.id = a.`created_by`');

		// Join over the user field 'modified_by'
		$query->select('`modified_by`.name AS `modified_by`');
		$query->join('LEFT', '#__users AS `modified_by` ON `modified_by`.id = a.`modified_by`');

		//Consulta Default para pegar somente as categorias que nos interessam
		$query->where('a.catid IN (9, 46, 47, 74, 11, 48, 49, 75, 12, 50, 51, 76, 14, 52, 53, 77, 15, 54, 55, 78, 16, 56, 57, 79) ');

		// Join over the foreign key 'catid'
		$query->select('`#__categories_2960041`.`title` AS categories_fk_value_2960041');

		$query->join('LEFT', '#__categories AS #__categories_2960041 ON #__categories_2960041.`id` = a.`catid`');

		//--new
		$query->order('a.created DESC');

		// Filter by published state
		$published = $this->getState('filter.state');

		if (is_numeric($published))
		{
			$query->where('a.state = ' . (int) $published);
		}
		elseif ($published === '')
		{
			$query->where('(a.state IN (0, 1))');
		}

		// Filter by search in title
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
				$query->where('a.id = ' . (int) substr($search, 3));
			}
			else
			{
				$search = $db->Quote('%' . $db->escape($search, true) . '%');
				$query->where('( a.title LIKE ' . $search . '  OR #__categories_2960041.title LIKE ' . $search . '  OR  a.created LIKE ' . $search . ' )');
			}
		}


		// Filtering title

		// Filtering catid
		$filter_catid = $this->state->get("filter.catid");

		/*if ($filter_catid !== null && !empty($filter_catid))
		{
			$query->where("a.`catid` = '".$db->escape($filter_catid)."'");
		}*/

		// Implementado novo

		if ($filter_catid) {
            if ($filter_catid == '9') {
                $query->where("a.`catid` IN (9, 46, 47, 74) ");
            }
            if ($filter_catid == '11') {
                $query->where("a.`catid` IN (11, 48, 49, 75) ");
            }
            if ($filter_catid == '12') {
                $query->where("a.`catid` IN (12, 50, 51, 76) ");
            }
            if ($filter_catid == '14') {
                $query->where("a.`catid` IN (14, 52, 53, 77) ");
            }
            if ($filter_catid == '15') {
                $query->where("a.`catid` IN (15, 54, 55, 78) ");
            }
            if ($filter_catid == '16') {
				$query->where("a.`catid` IN (16, 56, 57, 79) ");
			}		
			else {
				$query->where("a.`catid` IN (9, 46, 47, 74, 11, 48, 49, 75, 12, 50, 51, 76, 14, 52, 53, 77, 15, 54, 55, 78, 16, 56, 57, 79) ");
            }

        }

		// Filtering created
		// Add the list ordering clause.
		$orderCol  = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');

		if ($orderCol && $orderDirn)
		{
			$query->order($db->escape($orderCol . ' ' . $orderDirn));
		}

		return $query;
	}

	/**
	 * Get an array of data items
	 *
	 * @return mixed Array of data items on success, false on failure.
	 */
	public function getItems()
	{
		$items = parent::getItems();

		foreach ($items as $oneItem)
		{

			if (isset($oneItem->catid))
			{
				$values    = explode(',', $oneItem->catid);
				$textValue = array();

				foreach ($values as $value)
				{
					$db    = JFactory::getDbo();
					$query = $db->getQuery(true);
					$query
						->select('`#__categories_2960041`.`title`')
						->from($db->quoteName('#__categories', '#__categories_2960041'))
						->where($db->quoteName('id') . ' = '. $db->quote($db->escape($value)));

					$db->setQuery($query);
					$results = $db->loadObject();

					if ($results)
					{
						$textValue[] = $results->title;
					}
				}

				$oneItem->catid = !empty($textValue) ? implode(', ', $textValue) : $oneItem->catid;
			}
		}

		return $items;
	}
}
