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
class MenuRestModelMenuRest extends JModelAdmin
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
	 public function save($data)
{
	
	if(empty($data['id'])){
		$saveCategory = array('catName' => $data['catName']);
		$savePrice = array('price' => $data['price']);
		$saveModal = array('modalName' => $data['modalName']);
		$tableCategories = $this->getTableCategories();
		$tablePrice = $this->getTablePrice();
		$tableModal = $this->getTableModal();
		
	$data['celery'] = (empty($data['celery'])) ? 0 : 1;
	$data['cereals'] = (empty($data['cereals'])) ? 0 : 1;
	$data['crustaceans'] = (empty($data['crustaceans'])) ? 0 : 1;
	$data['eggs'] = (empty($data['eggs'])) ? 0 : 1;
	$data['fish'] = (empty($data['fish'])) ? 0 : 1;
	$data['lupin'] = (empty($data['lupin'])) ? 0 : 1;
	$data['milk'] = (empty($data['milk'])) ? 0 : 1;
	$data['molluscs'] = (empty($data['molluscs'])) ? 0 : 1;
	$data['nuts'] = (empty($data['nuts'])) ? 0 : 1;
	$data['peanuts'] = (empty($data['peanuts'])) ? 0 : 1;
	$data['soybeans'] = (empty($data['soybeans'])) ? 0 : 1;
	$data['mustard'] = (empty($data['mustard'])) ? 0 : 1;
	$data['sesame'] = (empty($data['sesame'])) ? 0 : 1;
	$data['sulphites'] = (empty($data['sulphites'])) ? 0 : 1;
	$data['vegetarian'] = (empty($data['vegetarian'])) ? 0 : 1;
	$data['vegan'] = (empty($data['vegan'])) ? 0 : 1;

	 if (!$tablePrice->bind($savePrice))
    {
        $this->setError(JText::sprintf('USERS PROFILE BIND FAILED', $user->getError()));
        return false;
    }

    if (!$tablePrice->save($savePrice))
    {
        $this->setError($user->getError());
        return false;
    }
	
	  if (!$tableModal->bind($saveModal))
    {
        $this->setError(JText::sprintf('USERS PROFILE BIND FAILED', $user->getError()));
        return false;
    }

    if (!$tableModal->save($saveModal))
    {
        $this->setError($user->getError());
        return false;
    }
		
	//$lastIdCategories = $tableCategories->id;
	$lastIdPrice = $tablePrice->id;
	$lastIdModal = $tableModal->id;
	
	$data["categoryID"] = $this->getItemCategories($data['catName']);
	$data["priceID"] = $lastIdPrice;
	$data["modalID"] = $lastIdModal;
		//var_dump($data);
		//die();
	$table = $this->getTable();
	
	if (!$table->bind($data))
    {
        $this->setError(JText::sprintf('USERS PROFILE BIND FAILED', $user->getError()));
        return false;
    }
	 if (!$table->save($data))
    {
        $this->setError($user->getError());
        return false;
    }
	 $user = JFactory::getUser();
	  return $user->id;
} else {
	$data['celery'] = (empty($data['celery'])) ? 0 : 1;
	$data['cereals'] = (empty($data['cereals'])) ? 0 : 1;
	$data['crustaceans'] = (empty($data['crustaceans'])) ? 0 : 1;
	$data['eggs'] = (empty($data['eggs'])) ? 0 : 1;
	$data['fish'] = (empty($data['fish'])) ? 0 : 1;
	$data['lupin'] = (empty($data['lupin'])) ? 0 : 1;
	$data['milk'] = (empty($data['milk'])) ? 0 : 1;
	$data['molluscs'] = (empty($data['molluscs'])) ? 0 : 1;
	$data['nuts'] = (empty($data['nuts'])) ? 0 : 1;
	$data['peanuts'] = (empty($data['peanuts'])) ? 0 : 1;
	$data['soybeans'] = (empty($data['soybeans'])) ? 0 : 1;
	$data['mustard'] = (empty($data['mustard'])) ? 0 : 1;
	$data['sesame'] = (empty($data['sesame'])) ? 0 : 1;
	$data['sulphites'] = (empty($data['sulphites'])) ? 0 : 1;
	$data['vegetarian'] = (empty($data['vegetarian'])) ? 0 : 1;
	$data['vegan'] = (empty($data['vegan'])) ? 0 : 1;
	
   // $userId = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('user.id');
  	 $user = JFactory::getUser();

	$table = $this->getTable();
	$tableCategories = $this->getTableCategories();
	$tablePrice = $this->getTablePrice();
	$tableModal = $this->getTableModal();

	$saveCategory = array('id' => $data['catName']);
	$data['categoryID'] = $this->getItemCategories($data['catName']);
	$savePrice = array('id' => $data['priceID'], 'price' => $data['price']);
	$saveModal = array('id' => $data['modalID'], 'modalName' => $data['modalName']);
		//var_dump($data);
		//die();
		if (!$table->bind($data))
    {
        $this->setError(JText::sprintf('USERS PROFILE BIND FAILED', $user->getError()));
        return false;
    }
	 if (!$table->save($data))
    {
        $this->setError($user->getError());
        return false;
    }

    if (!$tableCategories->bind($saveCategory))
    {
        $this->setError(JText::sprintf('USERS PROFILE BIND FAILED', $user->getError()));
        return false;
    }

    if (!$tableCategories->save($saveCategory))
    {
        $this->setError($user->getError());
        return false;
    }
	
	  if (!$tablePrice->bind($savePrice))
    {
        $this->setError(JText::sprintf('USERS PROFILE BIND FAILED', $user->getError()));
        return false;
    }

    if (!$tablePrice->save($savePrice))
    {
        $this->setError($user->getError());
        return false;
    }
	
	  if (!$tableModal->bind($saveModal))
    {
        $this->setError(JText::sprintf('USERS PROFILE BIND FAILED', $user->getError()));
        return false;
    }

    if (!$tableModal->save($saveModal))
    {
        $this->setError($user->getError());
        return false;
    }
	
	
	

    return $user->id;
	}
}

	public function getTable($type = 'MenuRest', $prefix = 'MenuRestTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
		public function getTableCategories($type = 'MenuRestCategories', $prefix = 'MenuRestCategoriesTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getTablePrice($type = 'MenuRestPrice', $prefix = 'MenuRestPriceTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getTableModal($type = 'MenuRestModal', $prefix = 'MenuRestModalTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.6
	 */


	public function getForm($data = array(), $loadData = true)
	{ 
		// Get the form.
		$form = $this->loadForm(
			'com_menurest.menurest',
			'menurest',
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


 public function getItem($pk = NULL) {
        $item = parent::getItem($pk);
		if(!empty($item->categoryID)){
        $item->catName = $this->getItemCategories($item->categoryID);
 		$item->price = $this->getItemPrice($item->priceID);
		$item->modalName = $this->getItemModal($item->modalID);
		}
        return $item;
      }
	  
public function getItemCategories($id){
 $db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id');
		$query->from('#__menurest_categories');
		$query->where('id' . '='. $id);
		$db->setQuery((string) $query);
		$messages = $db->loadResult();
        return $messages;		  
}

public function getItemModal($id){
 $db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('modalName');
		$query->from('#__menurest_modal');
		$query->where('id' . '='. $id);
		$db->setQuery((string) $query);
		$messages = $db->loadResult();
        return $messages;		  
}

public function getItemPrice($id){
 $db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('price');
		$query->from('#__menurest_price');
		$query->where('id' . '='. $id);
		$db->setQuery((string) $query);
		$messages = $db->loadResult();
         return $messages;		  
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
			//var_dump( $this->getItem());
		}

		return $data;
	}
}

