<?php
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(isset($_REQUEST['id'])){
		$st_id = $_REQUEST['id'];
	}else{
		header('Location: admin.php');
		exit();
	}
	
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
?>
<?php 
$pageTitle = "Recepción Documentos Detalle";
include "php/headertop_admin.php";
?>
 <script>
    function PreviewImage(upname, prv_id) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementsByName(upname)[0].files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById(prv_id).src = oFREvent.target.result;
        };
    };
  



</script>

<div class="profile">
			<h3 style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Receptar documentos postulante</h3>							
				<?php
						$qry=$user->getuserbyid($st_id);
						$pic=$qry->fetch_assoc();
						$piclocation=$pic['img'];
						
						if(isset($_POST['button1'])) {
							echo "Button 1 is clicked here";
						   }
						   if(isset($_POST['button2'])) {
							echo "Button 2 is clicked here";
						   }

					if($_SERVER['REQUEST_METHOD'] == "POST"){
						//code for img
						function guid() {
								 if (function_exists('com_create_guid')) {
											return com_create_guid();
										} else {
											mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
											$charid = strtoupper(md5(uniqid(rand(), true)));
											$hyphen = chr(45); // "-"
											$uuid = chr(123)// "{"
													. substr($charid, 0, 8) . $hyphen
													. substr($charid, 8, 4) . $hyphen
													. substr($charid, 12, 4) . $hyphen
													. substr($charid, 16, 4) . $hyphen
													. substr($charid, 20, 12)
													. chr(125); // "}"
											return $uuid;
										}
							  }
								if($_FILES["personal_image"]["name"])
								{
									  $path_parts = pathinfo($_FILES["personal_image"]["name"]);
												  $ext = $path_parts['extension'];
												  $fileName = trim(guid(), '{}') . '.' . $ext;
								}
								else{
									$fileName = $piclocation;
								}

							move_uploaded_file($_FILES['personal_image']['tmp_name'], "img/student/$fileName");

													
						//end img 
						$st_name = $_POST['st_name'];
						$st_email = $_POST['st_email'];

						if (isset($_POST['st_marca']) )
						{
						$st_marca = $_POST['st_marca'];
						}

						$st_total_marca =  $user->get_recepcion_documentos_byid($st_id);
						$st_marcados= array();
						$st_no_marcados= array();
						$st_all_items= array();



						while ($row = $st_total_marca->fetch_assoc()) {
							$st_all_items[]=$row['id'];
							if (isset($_POST['st_marca']) ){
								foreach($st_marca as $item){
									if ($item==$row['id'] ){
										$st_marcados[]=$row['id'];
										$updateRegistrar = $user->update_registrar_marcas($row['id']);
									}
								}	
							}
						  }


						  foreach($st_marcados as $item){
						  	if(($key = array_search($item, $st_all_items, TRUE)) !== FALSE) {
							unset($st_all_items[$key]);
							}
						  }

						  foreach($st_all_items as $item){
							$updateQuitar = $user->update_quitar_marcas($item);
						}


						if(isset($updateQuitar) || isset($updateRegistrar)){
								echo "<h4 style='color:green;text-align:center'>Guardado exitosamente</h4>";
						 }
						  

						//   foreach($st_marcados as $item){
						// 	echo $item.',';
						//   }


						// foreach($resultset  as $item){
						// 	echo $item+" -";
						// }

						
						// foreach($st_marca as $item){
						// 	echo $item;
						// }

						//$st_marca_registrar = $_POST['button1'];
						//$st_marca_quitar = $_POST['button2'];

							// $updateRegistrar = $user->update_registrar_marcas($st_marca_registrar);
							// $updateQuitar = $user->update_quitar_marcas($st_marca_quitar);
							// if($updateRegistrar){
							// 	echo "<h4 style='color:green;text-align:center'>Agregado exitosamente</h4>";
							// }else{
							// 	echo "<h4 style='color:red;text-align:center;text-align:center'>Failed to update</h4>";
							// }
							// if($updateQuitar){
							// 	echo "<h4 style='color:green;text-align:center'>Quitado exitosamente</h4>";
							// }else{
							// 	echo "<h4 style='color:red;text-align:center;text-align:center'>Failed to update</h4>";
							// }



						
					}
				?>
			
			<div class="st_update fix">
				<form action="" method="post" enctype="multipart/form-data">
						<?php
						$result = $user->getuserbyid($st_id);

						while($row = $result->fetch_assoc()){
						?>
					<table class="tab_one" >
						<tr>
							<td style="width:250px;"></td>
							<td>Photo</td>
							<td>
							<img id="logo_preview" src="img/student/<?php echo $row['img']?>" style="height:150px; width:150px; border:1px green solid;"><br><br> 
							<input type="file" name="personal_image" id="spic" onchange="PreviewImage('personal_image', 'logo_preview')" />
							</td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Name:</td>
							<td><input type="text" name="st_name" value="<?php echo $row['name'];?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>E-mail:</td>
							<td><input type="email" name="st_email" value="<?php echo $row['email']; ?>"></td>
						</tr>
						
						<tr>
						<td style="width:125px;"></td>
						<td></td>
						<td colspan="2">
							<!-- <input style="background:#3498db;color:#fff;width:168px;border-radius:5px;" type="submit" name="Update" value="Update"> -->
							</td>						
						</tr>
					</table>
					<table class="tab_one" >
						<tr>
						<th>SL</th>
						<th>Marca</th>
						<th>Descripcion</th>					
						</tr>
					<!-- //obtener listado recepcion documentos por id postulante
//						$qryPostulanteDocumentos=$user->getuserbyid($st_id);
//						$picPostulanteDocumentos=$qryPostulanteDocumentos->fetch_assoc();
 -->
						<?php }

						$resultado = $user->get_recepcion_documentos_byid($st_id);
						$i=0;
						while($row = $resultado->fetch_assoc()){
							$checked = "";
							if ($row['marca'] == 1 )  
							{							  
							  $checked = "checked";
							}
							else
							{
								$checked = '';
							}
							$i++;
							?>
					
						<tr>
							<td><?php echo $i; ?></td>
							<td><input type="checkbox" name="st_marca[]" 
							<?php if ($row['marca'] == 1) {  ?> checked <?php } ?>
							value="<?php echo $row['id'];?>"
							>

							<!-- <td><input style="background:#3498db;color:#fff;width:168px;border-radius:5px;" type="submit" name="button1" value="<?php echo $row['id'];?>"/>
							<td><input style="background:#3498db;color:#fff;width:168px;border-radius:5px;" type="submit" name="button2" value="<?php echo $row['id'];?>"/> -->

							</td>
							<td><?php echo $row['descripcion'];?></td>

						
						</tr>
						
							
						
						<!-- //obtener listado recepcion documentos por id postulante
	//						$qryPostulanteDocumentos=$user->getuserbyid($st_id);
	//						$picPostulanteDocumentos=$qryPostulanteDocumentos->fetch_assoc();
	 -->
	
	
	
							<?php }
						
						?>
						</table>
						<div class="back fix">
						<p style="text-align:center"><input style="background:#3498db;color:#fff;width:168px;border-radius:5px;" type="submit" name="Update" value="Actualizar"></p>
                        <p style="text-align:center"><input style="background:#db346e;color:#fff;width:168px;border-radius:5px;" type="submit" name="Aprueba" value="Aprueba"></p>
						</div>
							
				</form>
			</div>
			<div class="back fix">
				<p style="text-align:center"><a href="admin_reg_documentos.php"><button class="editbtn">Regresar a Perfil del aplicante</button></a></p>
			</div>
</div>


<?php include "php/footerbottom.php";?>