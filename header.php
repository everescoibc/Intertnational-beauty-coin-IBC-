<menu id="menu">
	<div id="menu-ta-pc">
		<center>
			<a href="index.php"><img src="../img/everesco-logo.png" id="logo01"><img src="../img/everesco-logo-wh02.png" id="logo02"></a>
			<div class="menu-row">
				<a href="#section05"><span><h1>Introduction</h1></span></a>
				<a href="#section03"><span><h1>About IBC</h1></span></a>
				<a href="../dashboard/en/main.php" target="_blank"><span><h1>Dashboard</h1></span></a>
				<a href="#"><span><h1>Community</h1></span></a>
				<a href="#"><span><h1>Contact Us</h1></span></a>
				<span>
					<select onchange="window.open(value,'_top');">
						<option value="https://everesco.org/en">English</option>
						<option value="https://everesco.org/cn">中国</option>
						<option value="https://everesco.org/kr">한국어</option>
					</select>
				</span>
			</div>
		</center>
	</div>
	<div id="menu-mo">
		<a href="index.php"><img src="../img/everesco-logo.png"></a>
		<span id="mo-icon"><i class="material-icons" style="font-size:48px">view_headline</i></span>
		<div id="panel">
			<a href="#section05"><div class="mo"><h1>Introduction</h1></div></a>
			<a href="#section03"><div class="mo"><h1>About IBC</h1></div></a>
			<a href="../dashboard/en/main.php" target="_blank"><div class="mo"><h1>Dashboard</h1></div></a>
			<a href="#"><div class="mo"><h1>Community</h1></div></a>
			<a href="#"><div class="mo"><h1>Contact Us</h1></div></a>
			<div class="mo">
				<select onchange="window.open(value,'_top');">
					<option value="https://everesco.org/en">English</option>
					<option value="https://everesco.org/cn">中国</option>
					<option value="https://everesco.org/kr">한국어</option>
				</select>
			</div>
		</div>
	</div>
	<div class="line" id="line01"></div>
	<script>
		$(document).ready(function(){
			$("#logo01").hide();
			$("#logo02").show();
    		$("#mo-icon").click(function(){
        		$("#panel").toggle("drop", {direction: "right"}, "fast")
    		});
		});
	</script>
	<script>
		$(window).scroll(function(){ 
			if($(document).scrollTop() >= 200){
				$("#line01").show("fade", 500);
				$("#logo02").hide();
				$("#logo01").show();
				$("#menu").addClass("bg-w");
			} 
			else{
				$("#line01").hide("fade", 500);
				$("#logo01").hide();
				$("#logo02").show();
				$("#menu").removeClass("bg-w");
			}  
		});
	</script>
</menu>