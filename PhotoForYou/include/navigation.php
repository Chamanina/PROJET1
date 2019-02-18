<body>
	<div id="nav">
		<ul>
			<?php
				//connexion à la BDD
				if (isset($_SESSION['email_user']) && ($_SESSION['type_user']) == 1)
				{
						$q='SELECT * FROM Menu WHERE idMenu = 1
						OR idMenu= 2
						OR idMenu= 3
						OR idMenu= 6
						OR idMenu= 7
						OR idMenu= 8;';
				}
				elseif (isset($_SESSION['email_user']) && ($_SESSION['type_user']) == 2)
				{
					
						$q='SELECT * FROM Menu WHERE idMenu = 1
						OR idMenu= 2
						OR idMenu= 3
						OR idMenu= 7
						OR idMenu= 8;';
					
				}
					
				else
				{
						$q='SELECT * FROM Menu
						WHERE idMenu!=1
						AND idMenu!=6
						AND idMenu!=7
						AND idMenu!=8;';
				}

				
				// if (isset($_SESSION['email_user']) && $_SESSION['type_user']==2)
				// {
				// 	$q='SELECT * FROM Menu WHERE idMenu = 1
				// 	OR idMenu= 2
				// 	OR idMenu= 3
				// 	OR idMenu= 7;';
				// }
			
				
		
				$r=mysqli_query($dbc,$q);
				$pageactive=basename($_SERVER['PHP_SELF']);

				while(list($id,$nom,$url)=mysqli_fetch_array($r,MYSQLI_NUM))
				{
					echo '<li ';
					if ($pageactive==$url){
						echo 'class="selected"';
					}
					echo '><a href='.$url.'>'.$nom.'</a></li>';
				}
			?>
		</ul>
	</div>

	<div id="body">
		<div id="content"></div>