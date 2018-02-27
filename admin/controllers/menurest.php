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
     $id = $app->input->getInt('id');
	(int) $modalID = $app->input->getInt('modalID');
	(int) $priceID = $app->input->getInt('priceID');
	 
   // var_dump($id);
  // die(); 
 if(!empty($id)){
	 $this->Query($id);
	 $this->modalQuery($modalID);
	 $this->priceQuery($priceID);
	 $app->enqueueMessage(JText::_('File deleted.'), 'Success');
	 $this->setRedirect(JRoute::_('index.php?option=com_menurest', false));
	 }

 }
	 
	 	
	public function Query ($id){
		 $db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query  = "DELETE FROM #__menurest WHERE id  = $id";
		$db->setQuery($query);
		$result = $db->execute();
        return $result;		  
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