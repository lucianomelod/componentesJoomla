<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Cbturesolucoes
 * @author     Luciano Melo <lucianomelod@gmail.com>
 * @copyright  2018 Luciano Melo
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_cbturesolucoes', JPATH_SITE);
$doc = JFactory::getDocument();
$doc->addScript(JUri::base() . '/media/com_cbturesolucoes/js/form.js');

$user    = JFactory::getUser();
$canEdit = CbturesolucoesHelpersCbturesolucoes::canUserEdit($this->item, $user);


if($this->item->state == 1){
	$state_string = 'Publish';
	$state_value = 1;
} else {
	$state_string = 'Unpublish';
	$state_value = 0;
}
if($this->item->id) {
	$canState = JFactory::getUser()->authorise('core.edit.state','com_cbturesolucoes.content');
} else {
	$canState = JFactory::getUser()->authorise('core.edit.state','com_cbturesolucoes.content.'.$this->item->id);
}
?>

<div class="content-edit front-end-edit">
	<?php if (!$canEdit) : ?>
		<h3>
			<?php throw new Exception(JText::_('COM_CBTURESOLUCOES_ERROR_MESSAGE_NOT_AUTHORISED'), 403); ?>
		</h3>
	<?php else : ?>
		<?php if (!empty($this->item->id)): ?>
			
			<h1><?php //echo JText::sprintf('COM_CBTURESOLUCOES_EDIT_ITEM_TITLE', $this->item->id); ?>
			<?php echo JText::sprintf('COM_CBTURESOLUCOES_EDIT_ITEM_TITLE', $this->item->diretoria.' '.$this->item->numresolucao.' '.$this->item->ano); ?>
			
			</h1>
		<?php else: ?>
			<h1><?php echo JText::_('COM_CBTURESOLUCOES_ADD_ITEM_TITLE'); ?></h1>
		<?php endif; ?>

		<form id="form-content"
			  action="<?php echo JRoute::_('index.php?option=com_cbturesolucoes&task=content.save'); ?>"
			  method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
			
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />

	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />

	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />

	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />

	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

				<?php echo $this->form->getInput('created_by'); ?>
				<?php echo $this->form->getInput('modified_by'); ?>

	<?php echo $this->form->renderField('diretoria'); ?>

	<?php //echo $this->form->renderField('ano'); ?>
	
	<?php echo $this->form->renderField('numresolucao'); ?>

	<?php echo $this->form->renderField('dataresolucao'); ?>

	<?php //echo $this->form->renderField('categoria_resolucao'); ?>

	<?php //echo $this->form->renderField('estatus'); ?>

	<?php echo $this->form->renderField('assunto'); ?>

	<?php echo $this->form->renderField('resolucao'); ?>
<!-- CCreator
	<?php //if (!empty($this->item->resolucao)) : ?>
		<?php //$resolucaoFiles = array(); ?>
		<?php //foreach ((array)$this->item->resolucao as $fileSingle) : ?>
			<?php //if (!is_array($fileSingle)) : ?>
				<a href="<?php //echo JRoute::_(JUri::root() . 'arquivoresolucao' . DIRECTORY_SEPARATOR . $fileSingle, false);?>"><?php //echo $fileSingle; ?></a>
				<?php //$resolucaoFiles[] = $fileSingle; ?>
			<?php //endif; ?>
		<?php //endforeach; ?>
	<?php //endif; ?>
	<input type="hidden" name="jform[resolucao_hidden]" id="jform_resolucao_hidden" value="<?php //echo implode(',', $resolucaoFiles); ?>" />
CCreator -->

<!-- new -->
<?php if (!empty($this->item->resolucao)) :
		foreach ((array) $this->item->resolucao as $singleFile) : 
			if (!is_array($singleFile)) :
				echo '<a href="' . JRoute::_(JUri::root() . 'arquivoresolucao' . DIRECTORY_SEPARATOR . $singleFile, false) . '">' . $singleFile . '</a> ';
			endif;
		endforeach;
	endif; ?>
	<input type="hidden" name="jform[resolucao][]" id="jform_resolucao_hidden" value="<?php echo str_replace('Array,', '', implode(',', (array) $this->item->resolucao)); ?>" />
 <!-- endnew -->


			<!--<div class="fltlft" <?php //if (!JFactory::getUser()->authorise('core.admin','cbturesolucoes')): ?> style="display:none;" <?php //endif; ?> >
                <?php //echo JHtml::_('sliders.start', 'permissions-sliders-'.$this->item->id, array('useCookie'=>1)); ?>
                <?php //echo JHtml::_('sliders.panel', JText::_('ACL Configuration'), 'access-rules'); ?>
                <fieldset class="panelform">
                    <?php //echo $this->form->getLabel('rules'); ?>
                    <?php //echo $this->form->getInput('rules'); ?>
                </fieldset>
                <?php //echo JHtml::_('sliders.end'); ?>
            </div>-->
<?php if (!JFactory::getUser()->authorise('core.admin','cbturesolucoes')): ?>
	<script type="text/javascript">
		jQuery.noConflict();
		jQuery('.tab-pane select').each(function(){
			var option_selected = jQuery(this).find(':selected');
			var input = document.createElement("input");
			input.setAttribute("type", "hidden");
			input.setAttribute("name", jQuery(this).attr('name'));
			input.setAttribute("value", option_selected.val());
			document.getElementById("form-content").appendChild(input);
		});
		/*jQuery(window).ready(function(){
			document.getElementById("jform_dataresolucao").disabled = true;
			document.getElementById("jform_dataresolucao_btn").disabled = false;
		});*/
	</script>

<?php endif; ?>


			<div class="control-group">
				<div class="controls">

					<?php if ($this->canSave): ?>
						<button type="submit" class="validate btn btn-primary">
							<?php echo JText::_('JSUBMIT'); ?>
						</button>
					<?php endif; ?>
					<a class="btn"
					   href="<?php echo JRoute::_('index.php?option=com_cbturesolucoes&task=contentform.cancel'); ?>"
					   title="<?php echo JText::_('JCANCEL'); ?>">
						<?php echo JText::_('JCANCEL'); ?>
					</a>
				</div>
			</div>


			<input type="hidden" name="option" value="com_cbturesolucoes"/>

			<input type="hidden" name="task"
				   value="contentform.save"/>
			<?php echo JHtml::_('form.token'); ?>
		</form>
	<?php endif; ?>
</div>
