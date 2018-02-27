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


JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);

?>
<form action="index.php?option=com_menurest&view=menurests" method="post" id="adminForm" name="adminForm">
<div class="row-fluid">
		<div class="span6">
			<?php echo JText::_('COM_MENUREST_MENURESTS_FILTER'); ?>
			<?php
echo JLayoutHelper::render(
					'joomla.searchtools.default',
					array('view' => $this)
				);
			?>
		</div>
	</div>
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?php echo JText::_('COM_MENUREST_NUM'); ?></th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="30%">
					<?php echo JHtml::_('grid.sort', 'COM_MENUREST_MENURESTS_NAME', 'content', $listDirn, $listOrder); ?>
			</th>
			<th width="20%">
				<?php echo JHtml::_('grid.sort', 'COM_MENUREST_CATEGORY', 'menuCat.catName', $listDirn, $listOrder); ?>
			</th>
			<th width="20%">
				<?php echo JHtml::_('grid.sort', 'COM_MENUREST_PRICE', 'price', $listDirn, $listOrder); ?>
			</th>
            <th width="20%">
				<?php echo JHtml::_('grid.sort', 'COM_MENUREST_MODAL', 'menuModal.modalName', $listDirn, $listOrder); ?>
			</th>
             <th width="2%">
				<?php echo JHtml::_('grid.sort', 'COM_MENUREST_ID', 'menu.id', $listDirn, $listOrder); ?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="7">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
        <?php //var_dump($this->items); ?>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) : 
					$link = JRoute::_('index.php?option=com_menurest&task=menurest.edit&id=' . $row->id);
					?>
                     <input type="hidden" name="id" value="<?php echo $row->id; ?>" /> 
                      <input type="hidden" name="modalID" value="<?php echo $row->modalID; ?>" /> 
                      <input type="hidden" name="priceID" value="<?php echo $row->priceID; ?>" /> 
					<tr>
						<td>
							<?php echo $this->pagination->getRowOffset($i); ?>
						</td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
                        <a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_MENUREST_EDIT_MENUREST'); ?>">
							<?php echo $row->content; ?>
                            </a>
						</td>
						<td align="center">
							<?php echo $row->catName; ?>
						</td>
						<td align="center">
							<?php echo $row->price; ?>
						</td>
                       <td align="center">
							<?php echo $row->modalName; ?>
						</td>
                         <td align="center">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>

    	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>
</form>