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
		<h2 class="four">informe</h2>
		<div align="right"><p>&nbsp;</p>
            <a target="_blank" href="<?php echo "$anteriores"; ?>">Informes Anteriores</a>                
        </div>
	</div>


<!-- .title-gov-page -->
<div class="scroll-content">

	<ul>
		<?php
			$db =& JFactory::getDBO();
			$db->setQuery("SELECT * FROM #__content WHERE (catid=$categoria1 OR catid=$categoria2 OR catid=$categoria3 OR catid=$categoria4 OR catid=$categoria5 OR catid=$categoria6 OR catid=$categoria7) AND state=1 ORDER BY publish_up DESC LIMIT $quantidade");
			$articles = $db->loadAssocList();
            $articles_num = count($articles);
            
			for ($i=0;$i<$articles_num;$i++) { 
				switch ($articles[$i]["catid"]) {
                case 81:
                    $diretoria = "AC";
                    break;
                case 82:
                    $diretoria = "BH";
                    break;
                case 83:
                    $diretoria = "JOP";
                    break;
                case 84:
                    $diretoria = "MAC";
                    break;
                case 85:
                    $diretoria = "NAT";
                    break;
                case 86:
                    $diretoria = "REC";
                    break;
                case 116:
                    $diretoria = "CBTU";
                    break;
            }
		?>

		<li><a href="<?php echo JURI::root(); ?>index.php/intranet2/<?php echo $articles[$i]["id"]; ?>"><?php echo $articles[$i]["title"]."<br>".date_format(date_create($articles[$i]['publish_up']), 'd/m/Y')." - ".$diretoria; ?></a></li>

		<?php } ?>
													
	</ul>

</div></div>