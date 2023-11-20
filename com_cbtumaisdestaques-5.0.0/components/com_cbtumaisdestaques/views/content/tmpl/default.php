<?php
/**
 * @version    CVS: 3.0.0
 * @package    Com_Cbtumaisdestaques
 * @author     Luciano Melo <lucianomelod@gmail.com>
 * @copyright  2018 Luciano Melo
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

$canEdit = JFactory::getUser()->authorise('core.edit', 'com_cbtumaisdestaques');

if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_cbtumaisdestaques'))
{
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>

<div class="item_fields">

	<table class="table">
		

		<tr>
			<th><?php echo JText::_('COM_CBTUMAISDESTAQUES_FORM_LBL_CONTENT_TITTLE'); ?></th>
			<td><?php echo $this->item->tittle; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CBTUMAISDESTAQUES_FORM_LBL_CONTENT_CATID'); ?></th>
			<td><?php echo $this->item->catid; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CBTUMAISDESTAQUES_FORM_LBL_CONTENT_CREATED'); ?></th>
			<td><?php echo $this->item->created; ?></td>
		</tr>

	</table>

</div>

<?php if($canEdit && $this->item->checked_out == 0): ?>

	<a class="btn" href="<?php echo JRoute::_('index.php?option=com_cbtumaisdestaques&task=content.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_CBTUMAISDESTAQUES_EDIT_ITEM"); ?></a>

<?php endif; ?>

<?php if (JFactory::getUser()->authorise('core.delete','com_cbtumaisdestaques.content.'.$this->item->id)) : ?>

	<a class="btn btn-danger" href="#deleteModal" role="button" data-toggle="modal">
		<?php echo JText::_("COM_CBTUMAISDESTAQUES_DELETE_ITEM"); ?>
	</a>

	<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3><?php echo JText::_('COM_CBTUMAISDESTAQUES_DELETE_ITEM'); ?></h3>
		</div>
		<div class="modal-body">
			<p><?php echo JText::sprintf('COM_CBTUMAISDESTAQUES_DELETE_CONFIRM', $this->item->id); ?></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Close</button>
			<a href="<?php echo JRoute::_('index.php?option=com_cbtumaisdestaques&task=content.remove&id=' . $this->item->id, false, 2); ?>" class="btn btn-danger">
				<?php echo JText::_('COM_CBTUMAISDESTAQUES_DELETE_ITEM'); ?>
			</a>
		</div>
	</div>

<?php endif; ?>