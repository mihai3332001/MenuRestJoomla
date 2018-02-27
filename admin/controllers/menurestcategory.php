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
class MenuRestControllerMenuRestCategory extends JControllerForm
{
	
	 public function delete() {
	 $app = JFactory::getApplication();
     $id = $app->input->getInt('id');

       
  //var_dump($id);
//die();
        // Get the model
        $model = $this->getModel();
		if(!empty($this->query($id))){
			$app->enqueueMessage(JText::_('Cannot delete categories. First delete products.'), 'error');
			}
			else {
			$return = $model->delete($id);
		
				}
			

        // Redirect to the list screen.
        $this->setRedirect(JRoute::_('index.php?option=com_menurest&view=menurestcategories&layout=edit', false));

    }
	
	public function query ($id){
		 $db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('categoryID');
		$query->from('#__menurest');
		$query->where('categoryID' . '=' . $id);
		$db->setQuery($query);
		$messages = $db->loadResult();
        return $messages;		  
		}
	
}