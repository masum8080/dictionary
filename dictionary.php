<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/css/css/all.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="" content="">
		<title>Dictionary</title>
	</head>
	<body>
		<style>
			#container{
				width: 100%;
				height: auto;
				position: relative;
			}
			
			#etb{
				position: absolute;
				top: 0;
				padding: 0;
				margin: 0;
				width: 488px;
				height: 400px;
				display: inline-block;
				border: 1px solid #f0f0f0;
			}
			@font-face{
				font-family: myfont;
				src: url(x.otf);
			}
			#heading{
				font-family: myfont;
				text-align: center;
			}
			#bte{
				position: absolute;
				top: 0;
				right: 0;
				padding: 0;
				margin: 0;
				display: inline-block;
				border: 1px solid #f0f0f0;
				width: 488px;
				height: 400px;
			}
			body{
				margin: 0;
				padding: 0;
				background: lightblue;
				width: 980px;
				}
				input[type="text"]{
					font-size: 21px;
					font-family: xfont;
					padding: 5px;
					width: 400px;
					outline: none;
					border: 2px solid #f0f0f0;
					border-radius: ;
				}
				@font-face{
					font-family: xfont;
					src: url(input.ttf);
					
				}
				input::placeholder{
					font-family: xfont;
				}
				#sr{
					position: absolute;
					top: 12px;
					left: calc(284px + 90px);
				}
				i{
					font-size: 26px;
				}
				button{
					background: transparent;
					border: none;
				}
				@font-face{
					font-family: bfont; 
					src: url(b2.ttf);
				}
				#br1{
					text-align: justify;
					overflow: scroll;
					background: #6c757d;
					width: 200px;
					margin-bottom: 8px;
					padding: 6px;
					padding-left: 12px;
					border-radius: 0px 19px 19px 0px;
					font-family: bfont;
					color: white;
				}
				
				
				#br2{
					margin-left: calc(100% - 220px);
					text-align: justify;
					overflow: scroll;
					background: #6c757d;
					width: 200px;
					margin-bottom: 8px;
					padding: 6px;
					padding-left: 12px;
					border-radius: 19px 0px 0px 19px;
					font-family: bfont;
					color: white;
				}
				#result{
					overflow: scroll;
					height: 360px;
				}
		</style>
		<?php
		
		if (isset($_POST['submit'])) {
			$ekey = $_POST['ekey'];
			$con = mysqli_connect('0.0.0.0', 'root', 'root', 'dictionary');
			mysqli_query($con,'SET CHARACTER SET utf8'); 
			mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");
			$sql = "SELECT * FROM dictionary WHERE en = '$ekey'";
			$result = mysqli_query($con, $sql);
			$num = mysqli_num_rows($result);
			//$row = mysqli_fetch_array($result);
			if ($num != 0) {
				$row;
			}else{
				$error = 'No word found';
			}
		}
		?>
		
		
		
		
		
		
		<?php
		
		if (isset($_POST['submit2'])) {
			$i = 0;
			$bkey = $_POST['bkey'];
			$con = mysqli_connect('0.0.0.0', 'root', 'root', 'dictionary');
			mysqli_query($con,'SET CHARACTER SET utf8'); 
			mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");
			$sql2 = "SELECT * FROM dictionary WHERE bn = '$bkey'";
			$result2 = mysqli_query($con, $sql2);
			$num2 = mysqli_num_rows($result2);
			
			if ($num2 != 0) {
				$row2;
			}else{
				$error2 = 'No word found';
			}
		}
		?>
		<form id="form" action="" method="post" accept-charset="utf-8">
	<h1 id="heading">Dictionary</h1>
		<div id="container">
			<div id="etb">
			<input type="text" placeholder="BN to EN" name="ekey" id="ekey" value="<?php echo $ekey;?>" />
			<button id="sr" type="submit" name="submit" id="submit"><i class="fas fa-search"></i></button>   
			<div id="result">
			<?php if(isset($_POST['submit'])){while($row = mysqli_fetch_array($result)){ echo '<p id="br1">'.$row['bn'].'</p>';}; echo $error; }?>      
			</div>
			</div>
				<div id="bte">
				<input type="text" placeholder="BN to EN" name="bkey" id="bkey" value="<?php echo $bkey?>" />
			<button id="sr" type="submit" name="submit2" id="submit"><i class="fas fa-search"></i></button>  
			<div id="result">
			<?php if(isset($_POST['submit2'])){
			while($row2 = mysqli_fetch_array($result2)){ echo '<p id="br2">'.ucfirst($row2['en']).'</p>';}; echo $error2; }?>
			</div>
			</div>
		</div>
		
		
		
		</form>
	
	</body>
</html>