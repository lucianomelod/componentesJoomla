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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
JHTML::_('behavior.tooltip');

$user       = JFactory::getUser();
$userId     = $user->get('id');
$listOrder  = $this->state->get('list.ordering');
$listDirn   = $this->state->get('list.direction');
$canCreate  = $user->authorise('core.create', 'com_cbturesolucoes') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'contentform.xml');
$canEdit    = $user->authorise('core.edit', 'com_cbturesolucoes') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'contentform.xml');
$canCheckin = $user->authorise('core.manage', 'com_cbturesolucoes');
$canChange  = $user->authorise('core.edit.state', 'com_cbturesolucoes');
$canDelete  = $user->authorise('core.delete', 'com_cbturesolucoes');
?>

<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post"
      name="adminForm" id="adminForm">

	<?php echo JLayoutHelper::render('default_filter', array('view' => $this), dirname(__FILE__)); ?>


<div class="pull-right"">
<?php if ($canEdit): ?>
	<a href="http://manuais.cbtu.gov.br" class="btn btn-default btn-sm" target="_blank">
          <span class="icon-question-sign"></span> Dúvida
	</a>
<?php endif; ?>

<!--<a href="<?php //echo JRoute::_('index.php?option=com_content&view=article&id=8064'); ?>" class="btn btn-default btn-sm" target="_blank">-->

<a href="<?php echo JRoute::_('index.php?option=com_content&view=article&Itemid=1102&id=8064'); ?>" class="btn btn-default btn-sm" target="_blank" title="Responsáveis pela publicação">
          <span class="icon-info-sign"></span> Info</a>
</div>

<!--<a href="<?php //echo JRoute::_('index.php?option=com_cbturesolucoes&task=contentform.edit&id=' . $item->id, false, 2); ?>" class="btn btn-mini" type="button"><i class="icon-edit" ></i></a>-->

	<table class="table table-striped" id="contentList">
		<thead>
		<tr>
			<?php if ($canEdit): ?>
			<?php if (isset($this->items[0]->state)): ?>
				<th width="5%">
	<?php //echo JHtml::_('grid.sort', 'JPUBLISHED', 'a.state', $listDirn, $listOrder);
	echo "Publicado"; ?>
</th>
			<?php endif; ?>
			<?php endif; ?>

				<!--<th class=''>
				<?php //echo JHtml::_('grid.sort',  'COM_CBTURESOLUCOES_CONTENTS_ID', 'a.id', $listDirn, $listOrder); ?>
				</th>
				<th class=''>
				<?php //echo JHtml::_('grid.sort',  'COM_CBTURESOLUCOES_CONTENTS_CREATED_BY', 'a.created_by', $listDirn, $listOrder); ?>
				</th>
				<th class=''>
				<?php //echo JHtml::_('grid.sort',  'COM_CBTURESOLUCOES_CONTENTS_MODIFIED_BY', 'a.modified_by', $listDirn, $listOrder); ?>
				</th>-->
				<th class=''>
				<?php //echo JHtml::_('grid.sort',  'COM_CBTURESOLUCOES_CONTENTS_DIRETORIA', 'a.diretoria', $listDirn, $listOrder); 
				echo "Diretoria"; ?>
				</th>
				<th class=''>
				<?php //echo JHtml::_('grid.sort',  'COM_CBTURESOLUCOES_CONTENTS_ANO', 'a.ano', $listDirn, $listOrder); 
				echo "Ano"; ?>
				</th>
				<th class=''>
				<?php //echo JHtml::_('grid.sort',  'COM_CBTURESOLUCOES_CONTENTS_NUMRESOLUCAO', 'a.numresolucao', $listDirn, $listOrder); 
				echo "Num Resolução"; ?>
				</th>
				<th class=''>
				<?php //echo JHtml::_('grid.sort',  'COM_CBTURESOLUCOES_CONTENTS_DATARESOLUCAO', 'a.dataresolucao', $listDirn, $listOrder);
				echo "Data Resolução"; ?>
				</th>
				<th class=''>
				<?php //echo JHtml::_('grid.sort',  'COM_CBTURESOLUCOES_CONTENTS_ASSUNTO', 'a.assunto', $listDirn, $listOrder);
				echo "Assunto"; ?>
				</th>
				<th class=''>
				<?php //echo JHtml::_('grid.sort',  'COM_CBTURESOLUCOES_CONTENTS_RESOLUCAO', 'a.resolucao', $listDirn, $listOrder);
				echo "Resolução"; ?>
				</th>


							<?php if ($canEdit || $canDelete): ?>
					<th class="center">
				<?php echo JText::_('COM_CBTURESOLUCOES_CONTENTS_ACTIONS'); ?>
				</th>
				<?php endif; ?>

		</tr>
		</thead>
		<tfoot>
		<tr>
			<td colspan="<?php echo isset($this->items[0]) ? count(get_object_vars($this->items[0])) : 10; ?>">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item) : ?>
			<?php $canEdit = $user->authorise('core.edit', 'com_cbturesolucoes'); ?>

							<?php if (!$canEdit && $user->authorise('core.edit.own', 'com_cbturesolucoes')): ?>
					<?php $canEdit = JFactory::getUser()->id == $item->created_by; ?>
				<?php endif; ?>

			<tr class="row<?php echo $i % 2; ?>">

			<?php if ($canEdit): ?>
			<?php if (isset($this->items[0]->state)) : ?>
					<?php $class = ($canChange) ? 'active' : 'disabled'; ?>
					<td class="center">
	<a class="btn btn-micro <?php echo $class; ?>" href="<?php echo ($canChange) ? JRoute::_('index.php?option=com_cbturesolucoes&task=content.publish&id=' . $item->id . '&state=' . (($item->state + 1) % 2), false, 2) : '#'; ?>">
	<?php if ($item->state == 1): ?>
		<i class="icon-ok"></i>
		<!--<i class="icon-publish"></i>-->
	<?php else: ?>
		<i class="icon-off"></i>
		<!--<i class="icon-unpublish"></i>-->
	<?php endif; ?>
	</a>
</td>
			<?php endif; ?>
			<?php endif; ?>

				<!--<td>
					<?php //echo $item->id; ?>
				</td>
				<td>
					<?php //echo JFactory::getUser($item->created_by)->name; ?>	</td>
				<td>
					<?php //echo JFactory::getUser($item->modified_by)->name; ?>	</td>
				<td>
				<?php //if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php //echo JHtml::_('jgrid.checkedout', $i, $item->uEditor, $item->checked_out_time, 'contents.', $canCheckin); ?>
				<?php //endif; ?>
				<a href="<?php //echo JRoute::_('index.php?option=com_cbturesolucoes&view=content&id='.(int) $item->id); ?>">
				<?php //echo $this->escape($item->diretoria); ?></a>
				</td>-->
				<td>
				<?php echo $item->diretoria; ?>
				</td>
				<td>
					<?php echo $item->ano; ?>
				</td>
				<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->uEditor, $item->checked_out_time, 'contents.', $canCheckin); ?>
				<?php endif; ?>
				<a href="<?php echo JRoute::_('index.php?option=com_cbturesolucoes&view=content&id='.(int) $item->id); ?>" target="_blank">
				<?php echo $this->escape($item->numresolucao); ?></a>
					<?php //echo $item->numresolucao; ?>
				</td>
				<td>
					<?php //echo $item->dataresolucao; ?>
					<?php echo date_format(date_create($item->dataresolucao), 'd/m/Y' ); ?>
				</td>
				<td>
					<?php echo $item->assunto; ?>
				</td>
				<td>

					<?php
						if (!empty($item->resolucao)) :
							$resolucaoArr = (array) explode(',', $item->resolucao);
							foreach ($resolucaoArr as $singleFile) : 
								if (!is_array($singleFile)) :
									$uploadPath = 'arquivoresolucao' . DIRECTORY_SEPARATOR . $singleFile;
									echo '<a href="' . JRoute::_(JUri::root() . $uploadPath, false) . '" target="_blank" title="See the resolucao">' . $singleFile . '</a> ';
								endif;
							endforeach;
						else:
							echo $item->resolucao;
						endif; ?>				</td>


								<?php if ($canEdit || $canDelete): ?>
					<td class="center">
						<?php if ($canEdit): ?>
							<a href="<?php echo JRoute::_('index.php?option=com_cbturesolucoes&task=contentform.edit&id=' . $item->id, false, 2); ?>" class="btn btn-mini" type="button"><i class="icon-edit" ></i></a>
						<?php endif; ?>
						<?php if ($canDelete): ?>
							<a href="<?php echo JRoute::_('index.php?option=com_cbturesolucoes&task=contentform.remove&id=' . $item->id, false, 2); ?>" class="btn btn-mini delete-button" type="button"><i class="icon-trash" ></i></a>
						<?php endif; ?>
					</td>
				<?php endif; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<?php if ($canCreate) : ?>
		<a href="<?php echo JRoute::_('index.php?option=com_cbturesolucoes&task=contentform.edit&id=0', false, 0); ?>"
		   class="btn btn-success btn-small"><i
				class="icon-plus"></i>
			<?php echo JText::_('COM_CBTURESOLUCOES_ADD_ITEM'); ?></a>
	<?php endif; ?>

	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>
</form>

<?php if($canDelete) : ?>
<script type="text/javascript">

	jQuery(document).ready(function () {
		jQuery('.delete-button').click(deleteItem);
	});

	function deleteItem() {

		if (!confirm("<?php echo JText::_('COM_CBTURESOLUCOES_DELETE_MESSAGE'); ?>")) {
			return false;
		}
	}
</script>
<?php endif; ?>
