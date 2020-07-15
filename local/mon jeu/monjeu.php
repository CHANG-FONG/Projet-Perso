<!DOCTYPE html>
<html>
<head>
	<title>King of Sea</title>
	<link rel="stylesheet" type="text/css" href="monjeu.css">
</head>
<style type="text/css">

#corp #inscr {
	color: yellow;
	transition: 0.5s;
}

#corp #inscr:hover {
	color: blue;
	cursor: pointer;
}

#conn {
	color: yellow;
	transition: 0.5s;
}
#corp #conn:hover {
	color: red;
	cursor: pointer;
}


	#uni {
display: none;
}

#actu {
display: none;
}
#encyclo {
display: none;
}

#hoveruni:hover + #uni {
display: flex;
0.5
}

#hoveractu:hover + #actu {
display: flex;
}

#hoverency:hover + #encyclo {
display: flex;
}
</style>


<body>

	<header class="entête">
		<div id="corp">
			<label id="name">FrenchGaming</label>
			<a href="Connection.php">
				<label id="conn">Connection</label></a>
			<a href="Inscription.php">
				<label id="inscr">Inscription</label></a>
		</div>
	</header>
	<header>
		<div id="text" class="titre">
			<span>KingSea</span>
			<div>
				<header>
					<ul>
						<div id="tete">
							
								<li id="hoveruni"><a href="">L'univer</a></li>
									<div id="uni">
										<ul>
											<li>aq</li>
											<li>aa</li>
										</ul>
									</div>
								<li id="hoveractu"><a href="">Actualité</a></li>
									<div id="actu">
										<ul>
											<li>aq</li>
											<li>aa</li>
										</ul>
									</div>
								<li id="hoverency"><a href="">Encyclopédie</a></li>
									<div id="encyclo">
										<ul>
											<li>aq</li>
											<li>aa</li>
										</ul>
									</div>
						</div>
					</ul>
				</header>
			</div>
		</div>
	</header>
</body>
</html>