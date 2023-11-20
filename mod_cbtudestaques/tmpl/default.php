<?php 
// No direct access
defined('_JEXEC') or die; 

$categoria1 = $params->get('categoria1', '0');
$itemid_menu = $params->get('itemid_menu', '0');
$categoria2 = $params->get('categoria2', '0');
$categoria3 = $params->get('categoria3', '0');
$img_default = $params->get('img_default', '');
$caracter = $params->get('caracter', '');


?>



<?php// echo $hello; ?>


					<div class="news-center">
						<ul>
							<?php
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid='.$categoria1.' AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$featured = $db->loadObject();
							?>
							<?php if ($featured) { ?>
							<li>
								
								<div class="news-center-img">
									<?php $images = json_decode($featured->images, true); ?>
									<a href="<?php echo JURI::root(); ?>index.php/pt/a-cbtu?option=com_content&view=article&id=<?php echo $featured->id; ?>&itemid=<?php echo $itemid_menu; ?>"><?php if ($images["image_intro"] != null) { ?><img src="<?php echo JURI::root() . $images["image_intro"]; ?>"><?php } else { ?><img src="<?php echo JURI::root() . $img_default ?>"><?php } ?></a>
								</div>
								<div class="news-center-read-more">
									<a href="<?php echo JURI::root(); ?>index.php/pt/a-cbtu?option=com_content&view=article&id=<?php echo $featured->id; ?>&itemid=<?php echo $itemid_menu; ?>">Ver Notícia</a>
								</div>
								<div class="news-center-content">
									<h2><?php echo $featured->title; ?></h2>
									<div class="entry">
									<?php echo substr(strip_tags($featured->introtext), 0, $caracter); ?>
									</div>
								</div>
							</li>
							<?php } ?>

							<?php
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid='.$categoria2.' AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$featured2 = $db->loadObject();
							?>

							<?php if ($featured2) { ?>
							<li <?php if ($featured2 != true) { ?>class="last"<?php } ?>>
								
								<div class="news-center-img">
									<?php $images = json_decode($featured2->images, true); ?>
									<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $featured2->id; ?>&itemid=<?php echo $itemid_menu; ?>"><?php if ($images["image_intro"] != null) { ?><img src="<?php echo JURI::root() . $images["image_intro"]; ?>"><?php } else { ?><img src="<?php echo JURI::root() . $img_default ?>"><?php } ?></a>
								</div>
								<div class="news-center-read-more">
									<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $featured2->id; ?>&itemid=<?php echo $itemid_menu; ?>">Ver Notícia</a>
								</div>
								<div class="news-center-content">
									<h2><?php echo $featured2->title; ?></h2>
									<div class="entry">
									<?php echo substr(strip_tags($featured2->introtext), 0, $caracter); ?>
									</div>
								</div>
							</li>
							<?php } ?>

							<?php
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid='.$categoria3.' AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$featured3 = $db->loadObject();
							?>

							<?php if ($featured3) { ?>
							<li class="last">
								
								<div class="news-center-img">
									<?php $images = json_decode($featured3->images, true); ?>
									<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $featured3->id; ?>&itemid=<?php echo $itemid_menu; ?>"><?php if ($images["image_intro"] != null) { ?><img src="<?php echo JURI::root() . $images["image_intro"]; ?>"><?php } else { ?><img src="<?php echo JURI::root() . $img_default ?>"><?php } ?></a>
								</div>
								<div class="news-center-read-more">
									<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $featured3->id; ?>&itemid=<?php echo $itemid_menu; ?>">Ver Notícia</a>
								</div>
								<div class="news-center-content">
									<h2><?php echo $featured3->title; ?></h2>
									<div class="entry">
									<?php echo substr(strip_tags($featured3->introtext), 0, $caracter); ?>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
					<!-- .news-center -->


