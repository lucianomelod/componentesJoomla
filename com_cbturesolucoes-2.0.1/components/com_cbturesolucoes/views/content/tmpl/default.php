<?php
/**
 * @version    CVS: 1.1.0
 * @package    Com_Cbturesolucoes
 * @author     Luciano Melo <lucianomelod@gmail.com>
 * @copyright  2018 Luciano Melo
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

$canEdit = JFactory::getUser()->authorise('core.edit', 'com_cbturesolucoes.' . $this->item->id);

if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_cbturesolucoes' . $this->item->id))
{
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>


<div class="item_fields">

	<table class="table">
		

		<!--<tr>
			<th><?php //echo JText::_('COM_CBTURESOLUCOES_FORM_LBL_CONTENT_STATE'); ?></th>
			<td>
			<i class="icon-<?php //echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
		</tr>-->

		<!-- -------- new ------------ -->
		<tr>
		<th><?php echo JText::_('Publicado por'); ?></th>
		<td><?php 
		$created = $this->item->created_by;
		echo JFactory::getUser($created)->name;
		//echo JFactory::getUser($item->created_by)->name; ?>
		</td>
		</tr>

		<tr>
		<th><?php echo JText::_('Modificado por'); ?></th>
		<td><?php 
		$modified = $this->item->modified_by;
		echo JFactory::getUser($modified)->name; ?>
			<?php //echo $this->$item->modified_by; ?>
		</td>
		</tr>
		<!-- -------- end new ------------ -->

		<tr>
			<th><?php echo JText::_('COM_CBTURESOLUCOES_FORM_LBL_CONTENT_DIRETORIA'); ?></th>
			<td><?php echo $this->item->diretoria; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CBTURESOLUCOES_FORM_LBL_CONTENT_ANO'); ?></th>
			<td><?php echo $this->item->ano; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CBTURESOLUCOES_FORM_LBL_CONTENT_NUMRESOLUCAO'); ?></th>
			<td><?php echo $this->item->numresolucao; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CBTURESOLUCOES_FORM_LBL_CONTENT_DATARESOLUCAO'); ?></th>
			<td><?php //echo $this->item->dataresolucao; ?>
				<?php echo date_format(date_create($this->item->dataresolucao), 'd/m/Y'); ?>
			</td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CBTURESOLUCOES_FORM_LBL_CONTENT_ASSUNTO'); ?></th>
			<td><?php echo nl2br($this->item->assunto); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CBTURESOLUCOES_FORM_LBL_CONTENT_RESOLUCAO'); ?></th>
			<td>
			<?php
			foreach ((array) $this->item->resolucao as $singleFile) : 
				if (!is_array($singleFile)) : 
					$uploadPath = 'arquivoresolucao/' . DIRECTORY_SEPARATOR . $singleFile;
					 echo '<a href="' . JRoute::_(JUri::root() . $uploadPath, false) . '" target="_blank">' . $singleFile . '</a> ';
				endif;
			endforeach;
		?></td>
		</tr>

	</table>

</div>

<?php if($canEdit && $this->item->checked_out == 0): ?>

	<a class="btn" href="<?php echo JRoute::_('index.php?option=com_cbturesolucoes&task=content.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_CBTURESOLUCOES_EDIT_ITEM"); ?></a>

<?php endif; ?>

<?php if (JFactory::getUser()->authorise('core.delete','com_cbturesolucoes.content.'.$this->item->id)) : ?>

	<a class="btn btn-danger" href="#deleteModal" role="button" data-toggle="modal">
		<?php echo JText::_("COM_CBTURESOLUCOES_DELETE_ITEM"); ?>
	</a>

	<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3><?php echo JText::_('COM_CBTURESOLUCOES_DELETE_ITEM'); ?></h3>
		</div>
		<div class="modal-body">
			<p><?php echo JText::sprintf('COM_CBTURESOLUCOES_DELETE_CONFIRM', $this->item->id); ?></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Close</button>
			<a href="<?php echo JRoute::_('index.php?option=com_cbturesolucoes&task=content.remove&id=' . $this->item->id, false, 2); ?>" class="btn btn-danger">
				<?php echo JText::_('COM_CBTURESOLUCOES_DELETE_ITEM'); ?>
			</a>
		</div>
	</div>

<?php endif; ?>