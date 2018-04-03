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
 * HelloWorlds View
 *
 * @since  0.0.1
 */
class MenuRestViewMenuRestCategories extends JViewLegacy
{
	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}
		$this->canDo = JHelperContent::getActions('com_menurest');
		// Set the toolbar
		$this->addToolBar();
		// Display the template
		parent::display($tpl);
	if (JFactory::getUser()->authorise('core.admin', 'com_menurest')) 
    {
	JToolBarHelper::preferences('com_menurest');
   }
	}
	

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		JToolbarHelper::title(JText::_('COM_MENUREST_MANAGER_CATEGORIES'));
		if ($this->canDo->get('core.create')) 
		{
			JToolBarHelper::addNew('menurestcategory.add', 'JTOOLBAR_NEW');
		}
		if ($this->canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('menurestcategory.edit', 'JTOOLBAR_EDIT');
		}
		if ($this->canDo->get('core.delete')) 
		{
			JToolBarHelper::deleteList('', 'menurestcategory.delete', 'JTOOLBAR_DELETE');
		}
	
	
		JToolbarHelper::cancel(
			'menurest.cancel',
		'JTOOLBAR_CLOSE'
		);
	}
}