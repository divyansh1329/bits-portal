<?php 

	$pre_user = array("divyansh","arnav","ranit");
	$pre_pass = array("sister","1995","simona");
?>
<pre>
	<?php print_r($_FILES); ?>
</pre>
<?php

	if (isset($_POST['pass'])) {
		$pass = $_POST['pass'];
		$user = $_POST['user'];
		

		if (in_array($user, $pre_user)>0 && in_array($pass, $pre_pass)) {
			$num = count($_FILES["upload"]["tmp_name"]);
			$target_dir = "uploads/" . $_POST['branch']  . "/";

			for ($i=0; $i < $num; $i++) { 
				$taget_file = $target_dir . basename($_FILES["upload"]["name"][$i]);
				$uploadOK = 1;
				$fileType = pathinfo($taget_file,PATHINFO_EXTENSION);

	// IF FILE ALREADY EXISTS 
				if (file_exists($taget_file)) {
					echo " sorry, file already exist !! <br/>";
					$uploadOK = 0;
				}

	// limit on file type
				if ($fileType != "pdf") {
					echo "  sorry, only pdf can be uploaded !! <br/>";
					$uploadOK = 0;
				}

	// CHECKING IF FILE UPLOADED PROPERLY
				if ($uploadOK == 0 ) {
					echo "  File not uploaded !! <br/>";

				}
			else{ // TRYING TO MOVE UPLOADED FILES TO TARGET

				if (move_uploaded_file($_FILES["upload"]["tmp_name"][$i], $taget_file)) {
					echo "  The file " . basename($_FILES["upload"]["name"][$i]) . "  has been uploaded. <br/>";		
				}

				else {
					echo " There is some error in uploding. Try again. <br/>";
				}
			}
		}
	}

	else {
		echo "unauthorized user !! <br/>";
	}
}
?>