<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorldList Model
 *
 * @since  0.0.1
 */
class MenuRestModelMenuRests extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	 
	 public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'menu.id',
				'menuCat.catName',
				'content',
				'price',
				'menuModal.modalName'
			);
		}

		parent::__construct($config);
	}
	protected function getListQuery()
	{
	    $db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select(array('menu.ID', 'menu.categoryID', 'menu.priceID', 'menu.modalID', 'menu.content', 'menu.celery', 'menu.cereals' , 'menu.crustaceans' , 'menu.eggs' , 'menu.fish' , 'menu.lupin' , 'menu.milk' , 'menu.molluscs' , 'menu.nuts' , 'menu.peanuts' , 'menu.soybeans', 'menu.mustard', 'menu.sesame', 'menu.sulphites' , 'menu.vegetarian', 'menu.vegan' , 'menuPrice.id', 'menuPrice.price', 'menuCat.id', 'menuCat.catName', 'menuModal.id', 'menuModal.modalName'));
		$query->from('#__menurest AS menu');
		$query->join('INNER', '#__menurest_price AS menuPrice ON (menu.priceID = menuPrice.ID)') ;
		$query->join('LEFT', '#__menurest_categories AS menuCat ON (menu.categoryID = menuCat.ID)') ;
		$query->join('RIGHT', '#__menurest_modal AS menuModal ON (menu.modalID = menuModal.ID)') ;
		$db->setQuery($query);
		//$messages = $db->loadObjectList();
		// Filter: like / search
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			$like = $db->quote('%' . $search . '%');
			$query->where('content LIKE ' . $like);
		}

	
		
		
		

		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'content');
		$orderDirn 	= $this->state->get('list.direction', 'asc');

		$query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));

		
            return $query;
	}
}