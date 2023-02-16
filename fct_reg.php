<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
	header('Location: fct_profile.php');
}
?>
<?php 
$pageTitle = "Faculty Registration";
include "header.php";
?>
	<div class="st_reg fix">
		<h2 style="color:#ddd;background:#3498db">Registrar Facultad</h2>
		<p class="msg">
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_name = $_POST['st_name'];
						$uname = $_POST['uname'];
						$st_pass = $_POST['st_pass'];
						$st_email = $_POST['st_email'];
						
						$BirthMonth = $_POST['BirthMonth'];
						$BirthDay	 = $_POST['BirthDay'];
						$BirthYear	 = $_POST['BirthYear'];
						$bday = "{$BirthYear}-{$BirthMonth}-{$BirthDay}";
						$st_gender  = $_POST['gender'];
						
						$degree = $_POST['degree'];
						$subject = $_POST['subject'];
						$inst = $_POST['inst'];
						$edu = "{$degree} in {$subject} from {$inst}";
						$st_contact  = $_POST['st_contact'];
						$st_add  = $_POST['st_add'];
						
						if(empty($st_name) or empty($uname) or empty($st_pass ) or empty($st_email) or empty($BirthMonth) or empty($BirthDay) or empty($BirthYear)or empty($degree) or empty($subject) or empty($inst) or empty($st_contact) or empty($st_gender) or empty($st_add)){
							echo "<p style='color:red;text-align:center'>**Field must not be empty**</p>";
						}else{
							$st_pass = md5($st_pass);
							$fct_register = $user->fct_registration($st_name,$uname,$st_pass,$st_email,$bday,$st_gender,$edu,$st_contact,$st_add);
							if($fct_register){
								echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Registro Completo !! <a style='font-size:20px;color:#8e44ad' href='facultylogin.php'>Login</a></h3>";
							}else{
								echo "<p style='color:red;text-align:center'>Error..username ya existe</p>";
							}
						}
					}
				?>
			
			</p>
		<form action="" method="post" id="st_form">
			<table>
				<tr>
					<th>Nombre: </th>
					<td><input type="text" name="st_name" placeholder="Nombre Completo" required /></td>
				</tr>
				<tr>
				<tr>
					<th>Username: </th>
					<td><input type="text" name="uname" placeholder="username" required /></td>
				</tr>
				<tr>
					<th>Password: </th>
					<td><input type="password" name="st_pass" placeholder="password" required /></td>
				</tr>
				<tr>
					<th>E-mail: </th>
					<td><input type="email" name="st_email" placeholder="example@email.com" required /></td>
				</tr>
				<tr>
					<th>Fecha Nace:</th>
					<td>
						<fieldset>

						  <select class="select-style" name="BirthMonth">
						  <option  value="01">Ene</option>

						<option value="02">Feb</option>

						 <option value="03" >Marzo</option>

						  <option value="04">Abril</option>

						  <option value="05">May</option>

						  <option value="06">Junio</option>

						  <option value="07">Julio</option>

						 <option value="08">Ago</option>

						  <option value="09">Sep</option>

							<option value="10">Oct</option>

						 <option value="11">Nov</option>
						  <option value="12" >Dic</option>
						  </label>

						</select>   

						<label><input class="birthday" maxlength="2" name="BirthDay"  placeholder="Día" required=""></label>

						<label><input class="birthyear" maxlength="4" name="BirthYear" placeholder="Año" required=""></label>

					  </fieldset>
					</td>
				</tr>
				
				<tr>
					<th>Género:</th>
					<td><label><input type="radio" name="gender" value="Male" checked/> Hombre</label>
					<label><input type="radio" name="gender" value="Female"/> Mujer</label>
					</td>
				</tr>
				<tr>
				<th>Educación: </th>
					<td>
						<fieldset>
						  <select class="select-style" name="degree">
							<option value="BSc">BSc</option>
							 <option value="MSc">MSc</option>
							  <option value="Phd" >Phd</option>
						  </select>   
							<label><input class="birthyear" name="subject" placeholder="Subject" required=""></label>
							<label><input class="birthyear" name="inst" placeholder="Institute" required=""></label>

						</fieldset>
					</td>
				</tr>
				<tr>
					<th>Contacto:</th>
					<td><input type="text" name="st_contact" placeholder="teléfono" required /></td>
				</tr>
				<tr>
					<th>Dirección:</th>
					<td><input type="text" name="st_add" placeholder="Dirección" required /></td>
				</tr>
				<tr>
					<td colspan="2"><input style="color:#ddd;background:#3498db" type="submit" name="sub" value="Registrar" /></td>
				</tr>
			</table>
		</form>

	</div>

<?php include "footer.php"; ?>
