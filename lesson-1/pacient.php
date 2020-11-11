<?php
	include 'header.php';
?>
<br><br>
<h1>Patient Formular</h1>
<form name="Formular" id="Formular" action="auswertung.php" method="POST">
	<table class="table">
		<tr>
		 <td><label>FirstName</label></td>
		 <td><input type="text" name="Vorname" placeholder="Rodion"></td>
		</tr>
		<tr>
		 <td><label>LastName</label></td>
		 <td><input type="" name="Nachname" placeholder="Ganopolskyy"></td>
		</tr>
		<tr>
		 <td><label>Email</label></td>
		 <td><input type="Email" name="Email"
		 placeholder="me@ornotme.com"></td>
		</tr>
		<tr>
		 <td><label>SVN</label></td>
		 <td><input type="SVN" name="SVN"
		 placeholder="1894" maxlength="4"></td>
		</tr>
		<tr>
		 <td><label>BirthDate</label></td>
		 <td><input type="date" name="Geburtsdatum"
		 placeholder="15.02.2002"></td>	
	    </tr>
		<tr>
		 <td><label>DastolicBloodPressure</label></td>
		 <td><input type="number" name="Blutdruck Diastolisch" value="30"></td>
		</tr> 
		<tr>
		 <td><label>Remarks</label></td>
		 <td><textarea name="Anmerkungen"></textarea></td>
		</tr> 
		<tr>
			<td>
				<input type="submit" >
			</td>
		</tr>
	</table>

	<label>Sex</label><br>
	<input type="radio" id="male" name="gender" value="male">
	<label for="male">Male</label><br>
	<input type="radio" id="female" name="gender" value="female">
	<label for="male">Male</label><br>
	<input type="radio" id="other" name="gender" value="other">
	<label for="other">Other</label><br> 

	<input class="btn btn-default" type="submit">
</form>		

</div>
<?php
	include 'footer.php';
?>