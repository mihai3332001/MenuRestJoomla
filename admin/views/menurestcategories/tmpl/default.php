<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<form action="index.php?option=com_menurest&view=menurestcategories" method="post" id="adminForm" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?php echo JText::_('COM_MENUREST_NUM'); ?></th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="80%">
				<?php echo JText::_('COM_MENUREST_CATEGORIES_CATNAME') ;?>
			</th>
             <th width="2%">
				<?php echo JText::_('COM_MENUREST_ID'); ?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
        <?php //var_dump($this->items); ?>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) : 
					$link = JRoute::_('index.php?option=com_menurest&task=menurestcategory.edit&id=' . $row->id);
					?>
                    
                  
					<tr>
						<td>
							<?php echo $this->pagination->getRowOffset($i); ?>
						</td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
                        <a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_MENUREST_EDIT_CATEGORIES'); ?>">
							<?php echo $row->catName; ?>
                            </a>
						</td>
                         <td align="center">
							<?php echo $row->id;  ?>
                              <input type="hidden" name="test" value="<?php echo $row->id; ?>" /> 
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
    	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>
</form>