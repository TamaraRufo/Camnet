<?php
			$idp=$_SESSION['id'];
			$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
			if($conn)
				{         
					mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
						$consulta="select * from usuario where id!=$idp and tipo!='administrador' and activo=1;";
						$resultado=mysql_query($consulta) or die(mysql_error());
						while($rows=mysql_fetch_array($resultado))
						{
							extract($rows);
							$_SESSION['idusu']=$id;
							$_SESSION['nombreusu']=$nombre;
							$_SESSION['apellidosusu']=$apellidos;
							$_SESSION['ciudad']=$ciudad;						
								echo "<tr>";
									echo "<td class='Estilo5' align='left' >";
										echo $_SESSION['nombreusu']." ".$_SESSION['apellidosusu'];
									echo "</td>";
									echo "<td class='Estilo5' align='left'>";
										echo "<input type='submit' name='".$_SESSION['idusu']."' id='eliminar' value='Conectar'/>";
									echo "</td>";
								echo "</tr>";
						}
					//mysql_free_result($result);
					mysql_close($conn); 
				}
		?>
