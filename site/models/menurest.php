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
class MenuRestModelMenuRest extends JModelList
{
	/**
	 * @var string message
	 */
	//protected $catTitle;
	//protected $content;
	//protected $price;
	//protected $placeholder;

	/**
	 * Get the message
         *
	 * @return  string  The message to be displayed to the user
	 */

	protected $messages;

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
		
		
protected function getListQuery()
        {
        
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select(array('menu.ID', 'menu.categoryID', 'menu.priceID', 'menu.modalID', 'menu.content', 'menu.celery', 'menu.cereals' , 'menu.crustaceans' , 'menu.eggs' , 'menu.fish' , 'menu.lupin' , 'menu.milk' , 'menu.molluscs' , 'menu.nuts' , 'menu.peanuts' , 'menu.soybeans', 'menu.mustard', 'menu.sesame', 'menu.sulphites' , 'menu.vegetarian', 'menu.vegan' , 'menuPrice.id', 'menuPrice.price', 'menuCat.id', 'menuCat.catName', 'menuModal.id', 'menuModal.modalName'));
		$query->from('#__menurest AS menu');
		$query->join('INNER', '#__menurest_price AS menuPrice ON (menu.priceID = menuPrice.id)') ;
		$query->join('LEFT', '#__menurest_categories AS menuCat ON (menu.categoryID = menuCat.id)') ;
		$query->join('RIGHT', '#__menurest_modal AS menuModal ON (menu.modalID = menuModal.id)') ;
		$query -> order('menu.content ASC');
		$db->setQuery($query);
		$messages = $db->loadObjectList();
		 return $messages;
        }
		
protected function getListCat()
        {
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query = 'SELECT DISTINCT catName, id FROM #__menurest_categories';
		$db->setQuery($query);
		$messages = $db->loadObjectList();
		 return $messages;
		}
		
public function getItemCategories($id){
 $db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('catName');
		$query->from('#__menurest_categories');
		$query->where('id' . '='. $id);
		$db->setQuery((string) $query);
		$messages = $db->loadResult();
        return $messages;		  
}

	/**
	 * Get the message
	 *
	 * @param   integer  $id  Greeting Id
	 *
	 * @return  string        Fetched String from Table for relevant Id
	 */
	 
	public function getMsg()
	{
	$categories = $this->getListCat();
   // $current_category = $categories[0]->id;	
	$messages = $this->getListQuery();
		//var_dump($messages);
	
		echo '<div class="colummTable">';
		echo '<div id="colummMenu" class="clearfix">';
		
 	//echo ' <ul class="nav nav-tabs">'; 
	$count = 1;
	echo '<div class="col-md-12">';
	echo '<div class="dropdown">';
    echo '<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Menu ';
    echo '<span class="caret"></span></button>';
    echo '<ul class="dropdown-menu">';
	foreach($categories as $category){
		
	
    echo '<li><a href="#' . $category->id . '">' . $category->catName . '</a></li>';

	
	}
	echo '</ul>';
    echo '</div>';

	echo '<div>';
	foreach($categories as $category){
		
		//$tab_active = ($category->id == $current_category) ? "active" : '';
	//$result[$category->id] = $category->catName;
	echo '<div class="col-md-12">';
	echo '<div class="menu-items" id="' .$category->id . '">';
	 echo '<h3 class="menu-item-title">'. $category->catName .'</h3>';	
	 echo '</div>';
	  echo '</div>';
	//echo '<div class="tab-content">';
	//foreach ($categories as $category2) {
		//$tab_active = ($category2->id == $current_category) ? "active" : '';
   	//echo '<div id="' .$category2->id .'" class="tab-pane fade in '  .$tab_active . '">';
		//var_dump($messages);
	foreach($messages as $key=>$val){

		if($val->categoryID == $category->id){
			if(!empty($val->content)){	
		echo '<div class="col-md-4">';	
     echo '<div class="menu-item-text"><span>' . $val->content . '</span>';

	  echo '</div><span class="menu-item-price">' . $val->price .' € </span> '; 

	echo '<div id="test-popup' . $count . '" class="white-popup mfp-hide">';
	echo '<div class="modalpopup">';
	
	$allegrien = ($val->celery == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/celery.png" /> <br />Celery</div>' : '';
	$allegrien .= ($val->cereals == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/cereals.png" /> <br />Cereals</div>' : '';
	$allegrien .= ($val->crustaceans == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/crustacena.png" /> <br />Crustaceans</div>' : '';
	$allegrien .= ($val->eggs == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/eggs.png" /> <br />Eggs</div>' : '';
	$allegrien .= ($val->fish == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/fish.png" /> <br />Fish</div>' : '';
	$allegrien .= ($val->lupin == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/lupin.png" /> <br />Lupin</div>' : '';
	$allegrien .= ($val->milk == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/milk.png" /> <br />Milk</div>' : '';
	$allegrien .= ($val->molluscs == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/molluscs.png" /> <br />Molluscs</div>' : '';
	$allegrien .= ($val->nuts == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/nuts.png" /> <br />Nuts</div>' : '';
	$allegrien .= ($val->peanuts == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/Peanut.png" /> <br />Peanuts</div>' : '';
	$allegrien .= ($val->mustard == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/mustard.png" /> <br />Mustard</div>' : '';
	$allegrien .= ($val->soybeans == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/soya.png" /> <br />Soybeans</div>' : '';
	$allegrien .= ($val->sesame == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/sesame.png" /> <br />Sesame</div>' : '';
	$allegrien .= ($val->sulphites == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/sul.png" /> <br />Sulphites</div>' : '';
	//$allegrien .= '<div class="vegetarian">';
	$allegrien .= ($val->vegetarian == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/vegetarian.png" /> <br />Vegetarian</div>' : '';
	$allegrien .= ($val->vegan == 1) ? '<div class="allegrien"><img src="components/com_menurest/img/vegan.png" /> <br />Vegan</div>' : '';
	//$allegrien .= '</div>';
	//var_dump($allegrien);
	if($allegrien != null){
		echo $allegrien;
	}
	else{
		echo "No known allergens contained.";
	}

	

	
	echo '</div>';
	echo '</div>';
	echo '<div class="menu-item-description">';
  	echo $val->modalName;
		echo ' <a href="#test-popup' . $count . '" class="open-popup-link"><i class="fa fa-info-circle"></i></a>';
echo '</div>';
$count++;
	 echo '</div>';
			}
		}
		
		}
	//}
		//echo '</div>';  
//}
}
	
	echo '</div>';
	echo '</div>';



}
}
	
	