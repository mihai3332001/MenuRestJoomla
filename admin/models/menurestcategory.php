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
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class MenuRestModelMenuRestCategory extends JModelAdmin
{
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	

	public function getTable($type = 'MenuRestCategory', $prefix = 'MenuRestTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	

	
	public function getForm($data = array(), $loadData = true)
	{ 
		// Get the form.
		$form = $this->loadForm(
			'com_menurest.menurestcategory',
			'menurestcategory',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);
		
		if (empty($form))
		{
			return false;
		}
		return $form;
	}
	
		


	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
			'com_menurest.edit.menurest.data',
			array()
		);
		
		if (empty($data))
		{	
			$data = $this->getItem();
			//var_dump($this->getItem());
		}

		return $data;
	}
	
}

