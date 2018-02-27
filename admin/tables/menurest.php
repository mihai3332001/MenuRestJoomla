<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Hello Table class
 *
 * @since  0.0.1
 */
class MenuRestTableMenuRest extends JTable
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  A database connector object
	 */
//	function __construct(&$db)
	//{
		//parent::__construct('#__menurest', 'id', $db);
	//}
	public function __construct(&$db)
        {
         parent::__construct('#__menurest', 'id', $db);
        }
}


class MenuRestCategoriesTableMenuRestCategories extends JTable
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  A database connector object
	 */
//	function __construct(&$db)
	//{
		//parent::__construct('#__menurest', 'id', $db);
	//}
	public function __construct(&$db)
        {
         parent::__construct('#__menurest_categories', 'id', $db);
        }
}

class MenuRestPriceTableMenuRestPrice extends JTable
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  A database connector object
	 */
//	function __construct(&$db)
	//{
		//parent::__construct('#__menurest', 'id', $db);
	//}
	public function __construct(&$db)
        {
         parent::__construct('#__menurest_price', 'id', $db);
        }
}

class MenuRestModalTableMenuRestModal extends JTable
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  A database connector object
	 */
//	function __construct(&$db)
	//{
		//parent::__construct('#__menurest', 'id', $db);
	//}
	public function __construct(&$db)
        {
         parent::__construct('#__menurest_modal', 'id', $db);
        }
}



