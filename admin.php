<?php
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
$pageTitle = "Admin";
include "php/headertop_admin.php";
?>
<div class="admin_profile">
	
	<div class="section">
			<h3>Aplicante</h3>
			<ul>
				<li><a href="admin_all_student.php">Ver todos Aplicantes</a></li>
				<li><a href="admin_reg_documentos.php">Registro Recepción Documentos</a></li>
				<li><a href="st_result.php">Aplicante Resultado</a></li>
				<li><a href="class_att.php">Asistencia</a></li>
				<li><a href="aplicante_list_pdf.php"><button>descargar Lista Aplicantes</button></a></li>
			</ul>
	</div>
	<div class="section">
			<h3>Facultad</h3>
			<ul>
				<li><a href="admin_all_faculty.php">Detalles Facultad</a></li>
				<li><a href="#">Información</a></li>
				<li><a href="#">Buscar Facultad</a></li>
				<li><a href="faculty_list.php"><button>Decargar Lista Facultades</button></a></li>
			</ul>
	</div>
	<!-- <div class="section">
	
			<h3>Registry</h3>
			<ul>
				<li><a href="#">Accounts</a></li>
				<li><a href="#">Salary</a></li>
				<li><a href="#">Student tution fee</a></li>
				<li><a href="#">Other cost</a></li>
			</ul>

	</div> -->

</div>

<?php include "php/footerbottom.php";?>