<?php 
// No direct access
defined('_JEXEC') or die; 

$quantidade = $params->get('quantidade', '0');

?>

<div class="whereiam">
	<div class="title-gov-page">
		<h2>onde <span>estou</span></h2>
	</div>
	<!-- .title-gov-page -->
	<?php if (count($_POST)>0) {
		unset($_POST["option"], $_POST["view"], $_POST["language"]);
		foreach($_POST as $key=>$val) {
			if ($val == null) {
				$error = true;
			}
			if ($where != null) {
				$where .= ", ";
			}
			$where .= $key."='".$val."'";
		}
		
		$checker_sql = mysqli_query ("SELECT * FROM cbtucatalogoempregados_content WHERE nome LIKE '".$_POST["nome"]."'");
		$checker = mysqli_num_rows($checker_sql);
		if ($checker>0) {
			$data = mysqli_fetch_assoc($checker_sql);
			if (!$error) { 
				$sql = mysqli_query ("UPDATE cbtucatalogoempregados_content SET ".$where." WHERE id=".$data["id"]) or die (mysqli_error());
				$success =true;
			}
		} else {
			if (!$error) { 
				$sql = mysqli_query ("INSERT INTO cbtucatalogoempregados_content SET ".$where) or die (mysqli_error());
				$success =true;
			}
		}
	}?>
	<?php if ($success) { ?>
	<p>Cadastrado com sucesso!</p>
	<?php } else { ?>
	<?php $user =& JFactory::getUser(); ?>
	<form class="where-i-am" method="post">
		<?php if ($error) { ?><p class="error">Todos os campos são obrigatórios.</p><?php } ?>
		<input name="nome" type="text" id="nome" value="<?php echo $user->name; ?>" readonly="readonly" placeholder="Nome completo:" />
		<input type="text" id="apelido" name="apelido" placeholder="Nome de guerra:" onKeyUp="this.value=this.value.toUpperCase()"/>
		<input type="email" id="email" name="email" value="<?php echo $user->email; ?>" readonly="readonly" placeholder="E-mail:" />
		<input type="text" id="ramal" name="ramal" placeholder="Ramal:" class="double-col" />
		<input type="text" id="sala" name="sala" placeholder="Sala:" class="double-col last-in-row" />
		<input type="text" id="orgao" name="orgao" placeholder="Orgão:" maxlength="5" onKeyUp="this.value=this.value.toUpperCase()" class="double-col" />
		<input type="text" id="aniversario" name="aniversario" placeholder="Aniversário:" class="double-col last-in-row" />
		<select name="operadora" class="double-col" >
			<option value="81">AC</option>
			<option value="82">BH</option>
			<option value="83">JP</option>
			<option value="84">MAC</option>
			<option value="85">NAT</option>
			<option value="86">REC</option>
		</select>
		<div class="submit">
		<input type="reset" value="limpar">
		<input type="submit" value="enviar" />
		
		
	</form>
	
	<?php } ?>
	
</div>




