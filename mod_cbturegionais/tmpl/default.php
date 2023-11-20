<?php 
// No direct access
defined('_JEXEC') or die; 

$tipo = $params->get('tipo');
$categoria_regional = $params->get('categoria_regional', '0');
$item_id_menu = $params->get('item_id_menu', '0');

$img_default = $params->get('img_default', '0');

$titulo_Custom1 = $params->get('titulo_Custom1');
$titulo_Custom2 = $params->get('titulo_Custom2');


$titulo_bloco1 = $params->get('titulo_bloco1');
$titulo_bloco2 = $params->get('titulo_bloco2');
$titulo_bloco3 = $params->get('titulo_bloco3');
$titulo_bloco4 = $params->get('titulo_bloco4');
$titulo_bloco5 = $params->get('titulo_bloco5');

$categoria_bh = $params->get('categoria_bh', '0');
$categoria_jp = $params->get('categoria_jp', '0');
$categoria_mc = $params->get('categoria_mc', '0');
$categoria_nt = $params->get('categoria_nt', '0');
$categoria_rc = $params->get('categoria_rc', '0');

$img_bh = $params->get('img_bh', '0');
$img_jp = $params->get('img_jp', '0');
$img_mc = $params->get('img_mc', '0');
$img_nt = $params->get('img_nt', '0');
$img_rc = $params->get('img_rc', '0');



$db =& JFactory::getDBO();
$db->setQuery('SELECT con.id, con.alias, con.images, con.publish_up, con.title, cat.alias AS catalias FROM #__content AS con, #__categories AS cat WHERE catid='.$categoria_regional.' AND state=1 AND con.catid = cat.id ORDER BY publish_up DESC LIMIT 5');

$the_article = $db->loadAssocList();

$images = json_decode($the_article->images, true);



?>






<?php// echo $hello; ?>



<h2><span style="color: #087ccd;"> <?php echo $titulo_Custom1 ?> <span><?php echo $titulo_Custom2 ?></span> </span>
</h2>
<!--<div class="min-cid-gov-fed"><img src="https://www.cbtu.gov.br/templates/cbtu/images/site/gov-logos.png" alt="" usemap="#cidades_e_brasil" />
	<map id="cidades_e_brasil" name="cidades_e_brasil"><area shape="rect" coords="0,8,63,32" href="https://www.cidades.gov.br" alt="ministerio" target="_blank" /><area shape="rect" coords="80,0,209,40" href="https://www.brasil.gov.br" alt="brasil" target="_blank" /> </map>
</div>-->


<?php if ($tipo == 'regional') {

//print_r($the_article);

?>


<div class="news-op">

	<ul>

        <?php foreach ($the_article as $k => $value) {

            $images = json_decode($value[images], true);

            //print_r($value);

        ?>
		<li class="rg1">
			<div class="news-op-images">
				<a href="<?php echo JURI::root(); ?>index.php/pt/<?php echo $value[catalias]; ?>/<?php echo $value[id]; ?>-<?php echo $value[alias]; ?>"><?php if ($images["image_intro"] != null) { ?><img src="<?php echo JURI::root() . $images["image_intro"]; ?>"><?php } else { ?><img src="<?php echo JURI::root() . $img_default ?>"><?php } ?></a>
			</div>

			
			<div class="news-op-text">
				<span><?php echo date("d/m/Y", strtotime($value[publish_up])); ?></span>
				<!--<a href="<?php// echo JURI::root(); ?>index.php/pt/<?php// echo $value[catalias]; ?>/<?php// echo $value[id]; ?>-<?php echo $value[alias]; ?>" class="title"><font color="#FFFFFF"><?php// echo $value[title]; ?></font></a>-->

                <a href="<?php echo JURI::root(); ?>index.php?option=com_content&view=article&id=<?php echo $value[id]; ?>&Itemid=<?php echo $item_id_menu; ?>&lang=pt" class="title"><font color="#FFFFFF"><?php echo $value[title]; ?></font></a>




            </div>
		</li>

        <?php } ?>


	</ul>

</div>

    <?php if($value[catalias] == "belo-horizonte"){ ?>

        <a href="<?php echo JURI::root(); ?>index.php/pt/mais-destaques?s=&catid=11" class="more-news-caller">Mais destaques</a>

    <?php } ?>
    <?php if($value[catalias] == "joao-pessoa"){ ?>

        <a href="<?php echo JURI::root(); ?>index.php/pt/mais-destaques?s=&catid=12" class="more-news-caller">Mais destaques</a>

    <?php } ?>
    <?php if($value[catalias] == "maceio"){ ?>

        <a href="<?php echo JURI::root(); ?>index.php/pt/mais-destaques?s=&catid=14" class="more-news-caller">Mais destaques</a>

    <?php } ?>
    <?php if($value[catalias] == "natal"){ ?>

        <a href="<?php echo JURI::root(); ?>index.php/pt/mais-destaques?s=&catid=15" class="more-news-caller">Mais destaques</a>

    <?php } ?>
    <?php if($value[catalias] == "recife"){ ?>

        <a href="<?php echo JURI::root(); ?>index.php/pt/mais-destaques?s=&catid=16" class="more-news-caller">Mais destaques</a>

    <?php } ?>





<?php } else { ?>

				<div class="news-op">
					<ul>

						<li class="rg1">
							<?php
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid='.$categoria_bh.' AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$the_article = $db->loadObject();
								$images = json_decode($the_article->images, true);
							?>
							<div class="news-op-images">
								<a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/belo-horizonte/"><?php if ($images["image_intro"] != null) { ?><img src="<?php echo JURI::root() . $images["image_intro"]; ?>"><?php } else { ?><img src="<?php echo JURI::root() . $img_bh ?>"><?php } ?></a>
							</div>
							<div class="news-op-title">
								<h2><a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/belo-horizonte/"><font color="#FFFFFF"><?php echo $titulo_bloco1 ?></font></a></h2>
							</div>
							
							<div class="news-op-text">
								<span><?php echo date("d/m/Y", strtotime($the_article->publish_up)); ?></span>
								<a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/belo-horizonte/" class="title"><font color="#FFFFFF"><?php echo $the_article->title; ?></font></a>
							</div>
						</li>
						
						<li class="rg2">
							<?php
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid='.$categoria_jp.' AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$the_article = $db->loadObject();
								$images = json_decode($the_article->images, true);
							?>
							<div class="news-op-images">
								<a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/joao-pessoa/"><?php if ($images["image_intro"] != null) { ?><img src="<?php echo JURI::root() . $images["image_intro"]; ?>"><?php } else { ?><img src="<?php echo JURI::root() . $img_jp ?>"><?php } ?></a>
							</div>
							<div class="news-op-title">
								<h2><a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/joao-pessoa/"><font color="#FFFFFF"><?php echo $titulo_bloco2 ?></font></a></h2>
							</div>
							
							<div class="news-op-text">
								<span><?php echo date("d/m/Y", strtotime($the_article->publish_up)); ?></span>
								<a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/joao-pessoa/" class="title"><font color="#FFFFFF"><?php echo $the_article->title; ?></font></a>
							</div>
						</li>
						
						<li class="rg3">
							<?php
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid='.$categoria_mc.' AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$the_article = $db->loadObject();
								$images = json_decode($the_article->images, true);
							?>
							<div class="news-op-images">
								<a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/maceio/"><?php if ($images["image_intro"] != null) { ?><img src="<?php echo JURI::root() . $images["image_intro"]; ?>"><?php } else { ?><img src="<?php echo JURI::root() . $img_mc ?>"><?php } ?></a>
							</div>
							<div class="news-op-title">
								<h2><a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/maceio/"><font color="#FFFFFF"><?php echo $titulo_bloco3 ?></font></a></h2>
							</div>

							<div class="news-op-text">
								<span><?php echo date("d/m/Y", strtotime($the_article->publish_up)); ?></span>
								<a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/maceio/" class="title"><font color="#FFFFFF"><?php echo $the_article->title; ?></font></a>
							</div>
						</li>
						
						<li class="rg4">
							<?php
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid='.$categoria_nt.' AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$the_article = $db->loadObject();
								$images = json_decode($the_article->images, true);
							?>
							<div class="news-op-images">
								<a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/natal/"><?php if ($images["image_intro"] != null) { ?><img src="<?php echo JURI::root() . $images["image_intro"]; ?>"><?php } else { ?><img src="<?php echo JURI::root() . $img_nt ?>"><?php } ?></a>
							</div>
							<div class="news-op-title">
								<h2><a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/natal/"><font color="#FFFFFF"><?php echo $titulo_bloco4 ?></font></a></h2>
							</div>
							
							<div class="news-op-text">
								<span><?php echo date("d/m/Y", strtotime($the_article->publish_up)); ?></span>
								<a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/natal/" class="title"><font color="#FFFFFF"><?php echo $the_article->title; ?></font></a>
							</div>
						</li>
						
						<li class="rg5">
							<?php
								$db =& JFactory::getDBO();
								$db->setQuery('SELECT * FROM #__content WHERE catid='.$categoria_rc.' AND state=1 ORDER BY publish_up DESC LIMIT 1');
								$the_article = $db->loadObject();
								$images = json_decode($the_article->images, true);
							?>
							<div class="news-op-images">
								<a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/recife/"><?php if ($images["image_intro"] != null) { ?><img src="<?php echo JURI::root() . $images["image_intro"]; ?>"><?php } else { ?><img src="<?php echo JURI::root() . $img_rc ?>"><?php } ?></a>
							</div>
							<div class="news-op-title">
								<h2><a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/recife/"><font color="#FFFFFF"><?php echo $titulo_bloco5 ?></font></a></h2>
							</div>

							<div class="news-op-text">
								<span><?php echo date("d/m/Y", strtotime($the_article->publish_up)); ?></span>
								<a target="_blank" href="<?php echo JURI::root(); ?>index.php/pt/recife/" class="title"><font color="#FFFFFF"><?php echo $the_article->title; ?></font></a>
							</div>
						</li>
							
					</ul>
					
				</div>





				<a href="<?php echo JURI::root(); ?>index.php/pt/mais-destaques" class="more-news-caller">Mais destaques</a>

<?php } ?>


