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
 * HelloWorld Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 * @since       0.0.9
 */
 
 
class MenuRestControllerMenuRest extends JControllerForm
{
	 public function delete() {
	

	 $app = JFactory::getApplication();
	  $cid = JRequest::getVar('cid', array(), '', 'array');
     //$id = $app->input->getInt('id');
	// JArrayHelper::toInteger($id);

if(count($cid) === 1) {


foreach ($cid as $id){
	$menurest  = $this->Query($id);
	}
//var_dump($menurest);
//die();
   foreach($menurest as $menu){
	  (int) $modalID = $menu->modalID;
	 (int) $id = $menu->id; 	  
	(int) $priceID = $menu->priceID;
		 $model = $this->getModel();
	  $model->delete($menu->id);
	  $this->modalQuery($menu->modalID);
	 $this->priceQuery($menu->priceID);	 
	  $app->enqueueMessage(JText::_('File deleted.'), 'Success');
	 $this->setRedirect(JRoute::_('index.php?option=com_menurest', false));	
	   }    

 }else {

 	foreach ($cid as $id){
	$menurest = $this->Query($id);
	 foreach($menurest as $menu){

	  (int) $modalID = $menu->modalID;
	 (int) $id = $menu->id; 	  
	(int) $priceID = $menu->priceID;
		 $model = $this->getModel();
	  $model->delete($menu->id);
	  $this->modalQuery($menu->modalID);
	 $this->priceQuery($menu->priceID);	 
	   } 
	   	  $app->enqueueMessage(JText::_('File deleted.'), 'Success');
	 $this->setRedirect(JRoute::_('index.php?option=com_menurest', false));	   
	}

}	 	
	 
}
	public function Query ($id){
$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__menurest');
		$query->where('id' . '='. $id);
		$db->setQuery((string) $query);
		$messages = $db->loadObjectList();
        return $messages;	
		}
		
		public function priceQuery ($priceID){
		 $db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query  = "DELETE FROM #__menurest_price WHERE id  = $priceID";
		$db->setQuery($query);
		$result = $db->execute();
        return $result;		   
		}
		
		public function modalQuery ($modalID){
		 $db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query  = "DELETE FROM #__menurest_modal WHERE id  = $modalID";
		$db->setQuery($query);
		$result = $db->execute();
        return $result;		 	  
		}
}