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
 * HelloWorld View
 *
 * @since  0.0.1
 */
class MenuRestViewMenuRestCategory extends JViewLegacy
{
	/**
	 * View form
	 *
	 * @var         form
	 */
	protected $form = null;
	protected $canDo;
	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		// Get the Data
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->canDo = JHelperContent::getActions('com_menurest', 'menurest', $this->item->id);
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}
		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
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
		$input = JFactory::getApplication()->input;
		// Hide Joomla Administrator Main menu
		$input->set('hidemainmenu', true);

		$isNew = ($this->item->id == 0);
		
		if ($isNew)
		{
			
			if ($this->canDo->get('core.create')) 
			{
				JToolBarHelper::title(JText::_('COM_MENUREST_MANAGER_MENURESTCATEGORY_NEW'));
				JToolBarHelper::save('menurestcategory.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('menurestcategory.save2new', 'save-new.png', 'save-new_f2.png',
				                       'JTOOLBAR_SAVE_AND_NEW', false);
			}
			JToolBarHelper::cancel('menurestcategory.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			JToolBarHelper::title(JText::_('COM_MENUREST_MANAGER_MENURESTCATEGORY_EDIT'));
			if ($this->canDo->get('core.edit'))
			{
				// We can save the new record
				JToolBarHelper::save('menurestcategory.save', 'JTOOLBAR_SAVE');
 
				// We can save this record, but check the create permission to see
				// if we can return to make a new one.
				if ($this->canDo->get('core.create')) 
				{
					JToolBarHelper::custom('menurestcategory.save2new', 'save-new.png', 'save-new_f2.png',
					                       'JTOOLBAR_SAVE_AND_NEW', false);
				}
				JToolBarHelper::cancel('menurestcategory.cancel', 'JTOOLBAR_CANCEL');
			}
		}

	
	}
}

