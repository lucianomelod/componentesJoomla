<?php 
// No direct access
defined('_JEXEC') or die; ?>

<?php// echo $hello; ?>


					<div class="news-center">
						<ul>
							<?php
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid=46 AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$featured = $db->loadObject();
							?>
							<?php if ($featured) { ?>
							<li>
								
								<div class="news-center-img">
									<?php $images = json_decode($featured->images, true); ?>
									<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $featured->id; ?>"><img src="<?php echo JURI::root() . "img?force_width=170&force_height=120&url="; ?><?php echo JURI::root() . $images["image_intro"]; ?>" /></a>
								</div>
								<div class="news-center-read-more">
									<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $featured->id; ?>">Ver Notícia</a>
								</div>
								<div class="news-center-content">
									<h2><?php echo $featured->title; ?></h2>
									<div class="entry">
									<?php echo substr(strip_tags($featured->introtext), 0, 150); ?>
									</div>
								</div>
							</li>
							<?php } ?>
							<?php
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid=47 AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$featured = $db->loadObject();
								
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid=74 AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$featured3 = $db->loadObject();
							?>
							<?php if ($featured) { ?>
							<li <?php if ($featured3 != true) { ?>class="last"<?php } ?>>
								
								<div class="news-center-img">
									<?php $images = json_decode($featured->images, true); ?>
									<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $featured->id; ?>"><img src="<?php echo JURI::root() . "img?force_width=170&force_height=120&url="; ?><?php echo JURI::root() . $images["image_intro"]; ?>" /></a>
								</div>
								<div class="news-center-read-more">
									<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $featured->id; ?>">Ver Notícia</a>
								</div>
								<div class="news-center-content">
									<h2><?php echo $featured->title; ?></h2>
									<div class="entry">
									<?php echo substr(strip_tags($featured->introtext), 0, 150); ?>
									</div>
								</div>
							</li>
							<?php } ?>

							<?php if ($featured3) { ?>
							<li class="last">
								
								<div class="news-center-img">
									<?php $images = json_decode($featured3->images, true); ?>
									<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $featured3->id; ?>"><img src="<?php echo JURI::root() . "img?force_width=170&force_height=120&url="; ?><?php echo JURI::root() . $images["image_intro"]; ?>" /></a>
								</div>
								<div class="news-center-read-more">
									<a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $featured3->id; ?>">Ver Notícia</a>
								</div>
								<div class="news-center-content">
									<h2><?php echo $featured3->title; ?></h2>
									<div class="entry">
									<?php echo substr(strip_tags($featured3->introtext), 0, 150); ?>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
					<!-- .news-center -->


