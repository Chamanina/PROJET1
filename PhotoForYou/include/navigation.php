<body>
	<div id="nav">
		<ul>
			<?php
			
			$rq = "SELECT type_user FROM user WHERE type_user=1";
       		$r = mysqli_query ($dbc, $rq);

       		$rq2 = "SELECT type_user FROM user WHERE type_user=2";
       		$r2 = mysqli_query ($dbc, $rq2);
			
			
				//connexion à la BDD
				if (isset($_SESSION['email_user']))
				{
					if($r)
					{
					
						$q='SELECT * FROM Menu WHERE idMenu = 1
						OR idMenu= 2
						OR idMenu= 3
						OR idMenu= 6
						OR idMenu= 7;';
					}
				}
					
				else
				{
					if (isset($_SESSION['email_user']))
					{
						if ($r2) 
						{
							
							$q='SELECT * FROM Menu WHERE idMenu = 1
							OR idMenu= 2
							OR idMenu= 3
							OR idMenu= 7;';
						}
					}

						else 
					{
						$q='SELECT * FROM Menu
						WHERE idMenu!=1
						AND idMenu!=6
						AND idMenu!=7;';
					}
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