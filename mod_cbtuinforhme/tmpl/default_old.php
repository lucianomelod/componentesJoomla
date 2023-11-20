<?php
// No direct access
defined('_JEXEC') or die;

$categoria1 = $params->get('categoria1', '0');
$categoria2 = $params->get('categoria2', '0');
$categoria3 = $params->get('categoria3', '0');
$categoria4 = $params->get('categoria4', '0');
$categoria5 = $params->get('categoria5', '0');
$categoria6 = $params->get('categoria6', '0');
$categoria7 = $params->get('categoria7', '0');
$quantidade = $params->get('quantidade', '0');
$anteriores = $params->get('anteriores', '0');

?>

<div id="inforhme" class="scroll-div scroll-green">
	<div class="title-gov-page">
		<!--<h2>info<span>rh</span>me</h2>-->
		<h2>informe</h2>
		<div align="right"><p>&nbsp;</p>
            <a target="_blank" href="<?php echo "$anteriores"; ?>">Anteriores</a>                
        </div>
		<div class="categories">
			<select>
				<option value="<?php echo $categoria7; ?>">CBTU</option>
				<option value="<?php echo $categoria1; ?>">Administração Central</option>
				<option value="<?php echo $categoria2; ?>">Belo Horizonte</option>
				<option value="<?php echo $categoria3; ?>">João Pessoa</option>
				<option value="<?php echo $categoria4; ?>">Maceió</option>
				<option value="<?php echo $categoria5; ?>">Natal</option>
				<option value="<?php echo $categoria6; ?>">Recife</option>
                <!--<option value="116">CBTU</option>
				<option value="81">Administração Central</option>
				<option value="82">Belo Horizonte</option>
				<option value="83">João Pessoa</option>
				<option value="84">Maceió</option>
				<option value="85">Natal</option>
				<option value="86">Recife</option>-->
			</select>
		</div>
	</div>

<!-- .title-gov-page -->
<div class="scroll-content">
											
<div class="inforh-93 item">
	<ul>
		<?php
			$db =& JFactory::getDBO();
			$db->setQuery("SELECT * FROM #__content WHERE (catid=$categoria1 OR catid=$categoria2 OR catid=$categoria3 OR catid=$categoria4 OR catid=$categoria5 OR catid=$categoria6 OR catid=$categoria7) AND state=1 ORDER BY publish_up DESC LIMIT $quantidade");
			$articles = $db->loadAssocList();
            $articles_num = count($articles);
            //$created = date_create($articles[$i]["publish_up"]);
            //$created = $articles[$i]['publish_up'];
            //$dated = date_format($created, 'd/m/Y');
            
			for ($i=0;$i<$articles_num;$i++) { 
		?>
		<li><a href="<?php echo JURI::root(); ?>index.php/intranet2/<?php echo $articles[$i]["id"]; ?>"><?php echo $articles[$i]["title"]; ?><br><?php echo $articles[$i]["publish_up"]; ?></a></li>
		<?php } ?>
													<?php if ($articles_num >= 10) { ?>
			<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=1640" class="more">InfoRHme anteriores</a>
		<?php } ?>
	</ul>
</div>
											
<div class="inforh-81 item">
	<ul>
		<?php
			$db =& JFactory::getDBO();
			$db->setQuery("SELECT * FROM #__content WHERE catid=$categoria1  AND state=1  ORDER BY publish_up DESC LIMIT 10");
			$articles = $db->loadAssocList();
			$articles_num = count($articles);
			for ($i=0;$i<$articles_num;$i++) { 
		?>
		<li><a href="<?php echo JURI::root(); ?>index.php/intranet2/<?php echo $articles[$i]["id"]; ?>"><?php echo $articles[$i]["title"]; ?></a></li>
		<?php } ?>
													<?php if ($articles_num >= 10) { ?>
			<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=1640&catid=81" class="more">InfoRHme anteriores</a>
		<?php } ?>
	</ul>
</div>
											
<div class="inforh-82 item">
	<ul>
		<?php
			$db =& JFactory::getDBO();
			$db->setQuery("SELECT * FROM #__content WHERE catid=$categoria2  AND state=1  ORDER BY publish_up DESC LIMIT 10");
			$articles = $db->loadAssocList();
			$articles_num = count($articles);
			for ($i=0;$i<$articles_num;$i++) { 
		?>
		<li><a href="<?php echo JURI::root(); ?>index.php/intranet2/<?php echo $articles[$i]["id"]; ?>"><?php echo $articles[$i]["title"]; ?></a></li>
		<?php } ?>
													<?php if ($articles_num >= 10) { ?>
			<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=1640&catid=82" class="more">InfoRHme anteriores</a>
		<?php } ?>
	</ul>
</div>
											
											
<div class="inforh-83 item">
	<ul>
		<?php
			$db =& JFactory::getDBO();
			$db->setQuery("SELECT * FROM #__content WHERE catid=$categoria3  AND state=1  ORDER BY publish_up DESC LIMIT 10");
			$articles = $db->loadAssocList();
			$articles_num = count($articles);
			for ($i=0;$i<$articles_num;$i++) { 
		?>
		<li><a href="<?php echo JURI::root(); ?>index.php/intranet2/<?php echo $articles[$i]["id"]; ?>"><?php echo $articles[$i]["title"]; ?></a></li>
		<?php } ?>
													<?php if ($articles_num >= 10) { ?>
			<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=1640&catid=83" class="more">InfoRHme anteriores</a>
		<?php } ?>
	</ul>
</div>
											
<div class="inforh-84 item">
	<ul>
		<?php
			$db =& JFactory::getDBO();
			$db->setQuery("SELECT * FROM #__content WHERE catid=$categoria4  AND state=1  ORDER BY publish_up DESC LIMIT 10");
			$articles = $db->loadAssocList();
			$articles_num = count($articles);
			for ($i=0;$i<$articles_num;$i++) { 
		?>
		<li><a href="<?php echo JURI::root(); ?>index.php/intranet2/<?php echo $articles[$i]["id"]; ?>"><?php echo $articles[$i]["title"]; ?></a></li>
		<?php } ?>
													<?php if ($articles_num >= 10) { ?>
			<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=1640&catid=84" class="more">InfoRHme anteriores</a>
		<?php } ?>
	</ul>
</div>
											
<div class="inforh-85 item">
	<ul>
		<?php
			$db =& JFactory::getDBO();
			$db->setQuery("SELECT * FROM #__content WHERE catid=$categoria5  AND state=1  ORDER BY publish_up DESC LIMIT 10");
			$articles = $db->loadAssocList();
			$articles_num = count($articles);
			for ($i=0;$i<$articles_num;$i++) { 
		?>
		<li><a href="<?php echo JURI::root(); ?>index.php/intranet2/<?php echo $articles[$i]["id"]; ?>"><?php echo $articles[$i]["title"]; ?></a></li>
		<?php } ?>
													<?php if ($articles_num >= 10) { ?>
			<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=1640&catid=85" class="more">InfoRHme anteriores</a>
		<?php } ?>
	</ul>
</div>
											
<div class="inforh-86 item">
	<ul>
		<?php
			$db =& JFactory::getDBO();
			$db->setQuery("SELECT * FROM #__content WHERE catid=$categoria6  AND state=1  ORDER BY publish_up DESC LIMIT 10");
			$articles = $db->loadAssocList();
			$articles_num = count($articles);
			for ($i=0;$i<$articles_num;$i++) { 
		?>
		<li><a href="<?php echo JURI::root(); ?>index.php/intranet2/<?php echo $articles[$i]["id"]; ?>"><?php echo $articles[$i]["title"]; ?></a></li>
		<?php } ?>
													<?php if ($articles_num >= 10) { ?>
			<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=1640&catid=86" class="more">InfoRHme anteriores</a>
		<?php } ?>
	</ul>
</div>
                                            
<div class="inforh-116 item">
	<ul>
		<?php
			$db =& JFactory::getDBO();
			$db->setQuery("SELECT * FROM #__content WHERE catid=$categoria7  AND state=1  ORDER BY publish_up DESC LIMIT 10");
			$articles = $db->loadAssocList();
			$articles_num = count($articles);
			for ($i=0;$i<$articles_num;$i++) { 
		?>
		<li><a href="<?php echo JURI::root(); ?>index.php/intranet2/<?php echo $articles[$i]["id"]; ?>"><?php echo $articles[$i]["title"]; ?></a></li>
		<?php } ?>
		<?php if ($articles_num >= 10) { ?>
			<a href="<?php echo JURI::root(); ?>index.php/intranet2/?option=com_content&view=article&id=1640&catid=116" class="more">InfoRHme anteriores</a>
		<?php } ?>
	</ul>
</div>

	</div>
</div>