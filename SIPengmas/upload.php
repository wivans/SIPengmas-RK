<?php
						include('connect.php');
						if (isset($_POST['upload'])){
							$allowed_ext	= array('jpg', 'jpeg', 'png', 'bmp', 'gif', 'tiff');

							$file_name		= $_FILES['file']['name'];
							$file_ext		= pathinfo ($file_name, PATHINFO_EXTENSION);
							$file_size		= $_FILES['file']['size'];
							$file_tmp		= $_FILES['file']['tmp_name'];
							$nama			= $_POST['nama'];
							$satker			= $_POST['satker'];
							$tanggal			= date("Y-m-d");
							if(in_array($file_ext, $allowed_ext) === true){
								if($file_size < 2044070){
									$open = fopen ($_FILES['file']['tmp_name'], 'r');
			                        $read = fread ($open, $_FILES['file']['size']);
			                        $data = addslashes ($read);
			                        $location ='files/'.$file_name.'.'.$file_ext;
			                        move_uploaded_file($file_tmp, $location);
			                        $in = mysqli_query($con, "INSERT INTO berkas VALUES(NULL,'$tanggal', '$nama','$satker', '$file_ext', '$file_size', '$location', default)");
									if($in){
										echo '<div class="ok" style=" text-align: center; color: green;">SUCCESS: File berhasil di Upload!</div>';
									}else{
										echo '<div class="ok" style=" text-align: center; color: red;">ERROR: Gagal upload file!</div>';
									}
								}else{
									echo '<div class="ok" style=" text-align: center; color: red;">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
								}
							}else{
								echo '<div class="ok" style=" text-align: center; color: red;">ERROR: Ekstensi file tidak di izinkan!</div>';
							}
						}
						?>
