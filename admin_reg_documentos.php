<?php
	ob_start ();
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
	
?>
<?php 
$pageTitle = "Recepción Documentos";
include "php/headertop_admin.php";
?>
<div class="all_student">
	<div class="search_st">
		<div class="hdinfo"><h3>Lista de Postulantes Registrados</h3></div>
		
		<div class="search">
		<form action="admin_search_student.php" method="GET">
			<input type="text" name="src_student" placeholder="buscar postulante" />
			<input type="submit" value="Buscar" />
		</form>
		</div>
	</div>
		<?php
			if(isset($_REQUEST['res'])){
				if($_REQUEST['res']==1){
					echo "<h3 style='color:green;text-align:center;margin:0;padding:10px;'>Data deleted successfully</h3>";
				}
			}
			
		?>
		<table class="tab_one">
			<tr>
				<th>SL</th>
				<th>Nombre</th>
				<th>ID</th>
				<th>Ver Perfil</th>
				<th>Editar</th>
				<th>Borrar</th>
				<th>Documentos</th>
				<th>Photo</th>
			</tr>
			<?php 
			$i=0;
				$alluser = $user->get_all_student();
				
				while($rows = $alluser->fetch_assoc()){

				$total_documentos=$user->get_count_total_documentos($rows['st_id']);		
				$documentos_entregados=$user->get_count_total_documentos_entregados($rows['st_id']);		

				$tot_doc=0;
				$tot_doc_rec=0;
                if(isset($total_documentos)){
					while ($row = $total_documentos->fetch_assoc()) {
						//$total_documentos=$row['c'];
						$tot_doc= $row['c'];
					}
					//echo $total_documentos;	
				}else{
					$tot_doc_rec=0;
				}
				if(isset($documentos_entregados)){
					while ($row = $documentos_entregados->fetch_assoc()) {
						//$documentos_entregados=$row['c'];
						//echo $row['c']."<br>";
						$tot_doc_rec= $row['c'];
					}
					//echo $documentos_entregados;	
				}else{
					$tot_doc_rec=0;
				}
				$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td><a href="admin_single_student.php?id=<?php echo $rows['st_id'];?>">Ver Detalles</a></td>
				<td><a href="admin_single_postulante_recepcion_documentos_update.php?id=<?php echo $rows['st_id'];?>">Editar</a></td>
				<td><a href="admin_delete_student.php?id=<?php echo $rows['st_id'];?>">Borrar</a></td>
				<td><?php echo $tot_doc_rec;?> de <?php echo $tot_doc;?></td>
				<td><img src="img/student/<?php echo $rows['img'];?>" width="50px" height="50px" title="<?php echo $rows['name'];?>" /></td>
			</tr>
			<?php } ?>
		</table>
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>