<?php 

	$tools = [
		'fist' => ['dmg' => 1, 'img' => 'tools/rsz_fist.png'],
		'rock' => ['dmg' => 3, 'img' => 'tools/rsz_stone.png'],
		'baseball' => ['dmg' => 15, 'img' => 'tools/rsz_baseball-bat.png'],
		'gun' => ['dmg' => 50, 'img' => 'tools/rsz_gun.png']
	];

	$monsters = [
		'bear' => 'monsters/bear.png',
		'chicken' => 'monsters/chicken.gif',
		'fly' => 'monsters/fly.gif',
		'frog' => 'monsters/frog.gif'
	];

	count($monsters);
	sizeof($monsters);


	if(isset($_GET['tool'])){
		$tool = $_GET['tool'];
	}else{
		$tool = 'fist';
	}

isset($_GET['hp']);


	if(isset($_GET['hp'])){

		$hp = $_GET['hp'];
		$hp = $hp - $tools[$tool]['dmg'];
	}else{
		$hp = 100;
	}
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Fight the monster!!</title>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.monster-pic{
			cursor: url(<?php echo $tools[$tool]['img']; ?>), auto;
			width:100%;
		}
		.monster{
			width:300px;
			height:auto;
			overflow: auto;
			margin:30px auto;
			position: relative;
		}
		.toolset{
			margin-top:20px;
		}
		.monster-box{
			position: relative;
		}
		.monster-dead{
			top:0;
			width:100%;
			height:100%;
			position:absolute;
			background-color: rgba(255,0,0,0.4);
		}
		.monster-dead p{
			font-size: 70px;
			font-weight: bold;
			text-align: center;
			color:red;
			margin-top:100px;
			text-shadow: 3px 3px 3px black;
		}

	</style>

</head>
<body>
	<div class="container">
		<div class="monster">
			<div class="monster-box">
				<a href="?hp=<?php echo $hp; ?>&tool=<?php echo $tool; ?>">
					<img class="monster-pic"  src="<?php echo $monsters['bear']; ?>">
				</a>
				<div style="display: <?php if($hp < 1){ echo "block";  }else{ echo "none"; } ?>" class="monster-dead">
					<p>DEAD</p>
				</div>
				<div class="progress">
				  <div class="progress-bar" role="progressbar" style="width: <?php echo $hp . "%"; ?>" aria-valuenow="<?php echo $hp; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $hp . "%"; ?></div>
				</div>
			</div>
			<div class="button-group toolset" >
				<a class="btn <?php if($tool =='fist'){ echo 'btn-primary'; }else{ echo 'btn-secondary';} ?>" href="?hp=<?php echo $hp + $tools['fist']['dmg']; ?>&tool=fist">Fist</a>
				<a class="btn <?php if($tool =='rock'){ echo 'btn-primary'; }else{ echo 'btn-secondary';} ?>" href="?hp=<?php echo $hp + $tools['rock']['dmg']; ?>&tool=rock">Rock</a>
				<a class="btn <?php if($tool =='baseball'){ echo 'btn-primary'; }else{ echo 'btn-secondary';} ?>" href="?hp=<?php echo $hp + $tools['baseball']['dmg']; ?>&tool=baseball">Baseball</a>
				<a class="btn <?php if($tool =='gun'){ echo 'btn-primary'; }else{ echo 'btn-secondary';} ?>" href="?hp=<?php echo $hp + $tools['gun']['dmg']; ?>&tool=gun">Gun</a>	

				<?php 
					if($hp < 1){
						echo '<a class="btn btn-success" href="fight.php"> Play again</a>';
					}
				?>
			</div>
		</div>
	</div>
	
</body>
</html>