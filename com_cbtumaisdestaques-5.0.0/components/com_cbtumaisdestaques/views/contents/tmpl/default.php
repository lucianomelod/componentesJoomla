<?php
/**
 * @version    CVS: 5.0.0
 * @package    Com_Cbtumaisdestaques
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

$user       = JFactory::getUser();
$userId     = $user->get('id');
//$listOrder  = $this->state->get('list.ordering', 'desc');
$listOrder  = $this->state->get('list.ordering');
$listDirn   = $this->state->get('list.direction');
$canCreate  = $user->authorise('core.create', 'com_cbtumaisdestaques') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'contentform.xml');
$canEdit    = $user->authorise('core.edit', 'com_cbtumaisdestaques') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'contentform.xml');
$canCheckin = $user->authorise('core.manage', 'com_cbtumaisdestaques');
$canChange  = $user->authorise('core.edit.state', 'com_cbtumaisdestaques');
$canDelete  = $user->authorise('core.delete', 'com_cbtumaisdestaques');
?>

<!--Título categoria selecionada 
<h1>Notícias <?php //echo $this->activeFilters[catid] ?></h1>-->

<div class="title-holder">
	<h2 class="page-title"> <?php

		$catid = $this->activeFilters[catid];

		if ($catid) {
            if ($catid == '9') {
                echo "Mais destaques Administração Central";
            }
            if ($catid == '11') {
                echo "Mais destaques Belo Horizonte";
            }
            if ($catid == '12') {
                echo "Mais destaques João Pessoa";
            }
            if ($catid == '14') {
                echo "Mais destaques Maceió";
            }
            if ($catid == '15') {
                echo "Mais destaques Natal";
            }
            if ($catid == '16') {
				echo "Mais destaques Recife";
			}		
		} else {
			echo "Mais destaques CBTU";
		}
	?></h2>
	<br />
</div>



<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post"
      name="adminForm" id="adminForm">

	<?php echo JLayoutHelper::render('default_filter', array('view' => $this), dirname(__FILE__)); ?>
	<table class="table table-striped" id="contentList">
		<thead>
		<tr>
			<?php if (isset($this->items[0]->state)): ?>
				<th width="5%">
	<?php //echo JHtml::_('grid.sort', 'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
</th>
			<?php endif; ?>

				<!--<th class=''>
				<?php //echo JHtml::_('grid.sort',  'COM_CBTUMAISDESTAQUES_CONTENTS_ID', 'a.id', $listDirn, $listOrder); ?>
				</th>-->
				<th class=''>
				<?php echo JHtml::_('grid.sort',  'COM_CBTUMAISDESTAQUES_CONTENTS_CREATED', 'a.created', $listDirn, $listOrder); ?>
				</th>
				
				<th class=''>
				<?php echo JHtml::_('grid.sort',  'COM_CBTUMAISDESTAQUES_CONTENTS_TITLE', 'a.title', $listDirn, $listOrder); ?>
				</th>
				<!--<th class=''>
				<?php echo JHtml::_('grid.sort',  'COM_CBTUMAISDESTAQUES_CONTENTS_CATID', 'a.catid', $listDirn, $listOrder); ?>
				</th>-->
				


							<?php if ($canEdit || $canDelete): ?>
					<th class="center">
				<?php echo JText::_('COM_CBTUMAISDESTAQUES_CONTENTS_ACTIONS'); ?>
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
			<?php $canEdit = $user->authorise('core.edit', 'com_cbtumaisdestaques'); ?>

			
			<tr class="row<?php echo $i % 2; ?>">

				<?php if (isset($this->items[0]->state)) : ?>
					<?php $class = ($canChange) ? 'active' : 'disabled'; ?>
					<td class="center">
	<!--<a class="btn btn-micro <?php //echo $class; ?>" href="<?php //echo ($canChange) ? JRoute::_('index.php?option=com_content&task=content.publish&id=' . $item->id . '&state=' . (($item->state + 1) % 2), false, 2) : '#'; ?>">
	<?php if ($item->state == 1): ?>
		<i class="icon-publish"></i>
	<?php else: ?>
		<i class="icon-unpublish"></i>
	<?php endif; ?>
	</a>-->
</td>
				<?php endif; ?>

				<!--<td>
					<?php //echo $item->id; ?>
				</td>-->

				<td>
					<?php 
					$date = date_create($item->created);
					echo date_format($date,'d-m-Y');

					//echo $item->created;?>
				</td>
				<td>

					<?php 
					echo '<a href="/index.php/pt/a-cbtu?option=com_content&view=article&Itemid=1102&id='.$item->id.'" target="_blank">'.$item->title.'</a>';
					//echo '<a href="/index.php?option=com_content&view=article&Itemid=1102&id='.$item->id.'" target="_blank">'.$item->title.'</a>';
					//echo $item->title; 
					?>
				</td>
				<!--<td>
					<?php //echo $item->catid; ?>
				</td>-->
				


								<?php if ($canEdit || $canDelete): ?>
					<td class="center">
					</td>
				<?php endif; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<?php if ($canCreate) : ?>
		<a href="<?php echo JRoute::_('index.php/pt/a-cbtu?option=com_cbtumaisdestaques&task=contentform.edit&id=0', false, 0); ?>"
		   class="btn btn-success btn-small"><i
				class="icon-plus"></i>
			<?php echo JText::_('COM_CBTUMAISDESTAQUES_ADD_ITEM'); ?></a>
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

		if (!confirm("<?php echo JText::_('COM_CBTUMAISDESTAQUES_DELETE_MESSAGE'); ?>")) {
			return false;
		}
	}
</script>
<?php endif; ?>
