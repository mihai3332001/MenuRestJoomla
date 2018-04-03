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
class MenuRestViewMenuRests extends JViewLegacy
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
		// Get application
		$app = JFactory::getApplication();
		$context = "menurest.list.admin.menurest";
		//var_dump($app);
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'content', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		$this->filterForm    	= $this->get('FilterForm');
		$this->activeFilters 	= $this->get('ActiveFilters');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}
		$this->canDo = JHelperContent::getActions('com_menurest');
		//var_dump($this->items);
		//echo '<input type="hidden" name="id" value=" '. $modalID  . '" />';
		// Set the toolbar
		$this->addToolBar();
		// Display the template
		parent::display($tpl);
		
		// Set the document
		$this->setDocument();
		if (JFactory::getUser()->authorise('core.admin', 'com_menurest')) 
    {
	JToolBarHelper::preferences('com_menurest');
   }
	}
// include JButtonLink so we can extend it


/**
 * Same as JButtonLink but opening in a new window
 */



	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		$title = JText::_('COM_MENUREST_MANAGER_MENURESTS');

		if ($this->pagination->total)
		{
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}
if ($this->canDo->get('core.create')) 
		{
			JToolBarHelper::addNew('menurest.add', 'JTOOLBAR_NEW');
		}
		if ($this->canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('menurest.edit', 'JTOOLBAR_EDIT');
		}
		if ($this->canDo->get('core.delete')) 
		{
			JToolBarHelper::deleteList('', 'menurest.delete', 'JTOOLBAR_DELETE');
		}
		JToolBarHelper::title($title, 'menurests');

		JToolbarHelper::addNew('menurestcategories.add', "Add Category");

	}
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_MENUREST_ADMINISTRATION'));
	}
}