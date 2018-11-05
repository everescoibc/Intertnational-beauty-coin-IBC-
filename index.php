<!doctype html>
<html>
	
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!--타이틀-->
<link rel="icon" href="../img/everesco-t.png">
<title>EVERESCO</title>
<mete name="keywords" content="EVERESCO" />
<meta name="description" content="안녕하세요. EVERESCO입니다." />
<!--CSS&font&icon-->
<link rel="stylesheet" href="../styles/st-mo(def).ver181025.css">
<link rel="stylesheet" href="../styles/st-ta-pc.ver181025.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--Jquery&script-->
<script src="../script/jquery-3.3.1.min.js"></script>
<script src="../script/jquery-ui.js"></script>
<script src="../script/d-day.js"></script>
<script src="../script/section.js"></script>
</head>
<!-- 영문폰트 -->
<style>
	* {
		font-family: 'Roboto', sans-serif;
	}
</style>

	
	
<body>
	<!--상단메뉴-->
	<header>
		<?php include "./header.php";?>
	</header>
	
	<!--팝업-->
	
	<!--탑bt-->
	<div id="top-bt">
		<span><i class="material-icons">arrow_upward</i></span>
	</div>
	<script>
		$(document).ready(function(){
			$("#top-bt").hide();
    		$("#top-bt").click(function(){
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
    		});
		});
		$(window).scroll(function(){ 
			if($(document).scrollTop() >= 100){
				$("#top-bt").show();
			} 
			else{
				$("#top-bt").hide();
			}  
		});
	</script>
	
	<main>
		
		<!--섹션1 IBC D-day-->
		<section id="section01">
			<div class="container">
				<div class="ibc-d-day">
					<h1>IBC Beauty Coin D-Day</h1>
					<center>
						<div class="time" style="font-family: 'Roboto', 'serif';">
							<span id="d-day-d"></span>
							<span id="d-day-h"></span>
							<span id="d-day-m"></span>
							<span id="d-day-s"></span>
						</div>
						<div class="text">
							<span>Days</span>
							<span>Hours</span>
							<span>Minutes</span>
							<span>Seconds</span>
						</div>
					</center>
				</div>
			</div>
			<div class="bottom-triangle-left-half"></div>
			<div class="bottom-triangle-left"></div>
			<div class="bottom-triangle-right-half"></div>
			<div class="bottom-triangle-right"></div>
		</section>
		
		<!--섹션2 IBC소개 및 영상-->
		<section id="section02">
			<div class="container">
				<div class="ibc-movie-row">
					<span class="ibc-movie-col">
						<h1>BEAUTY COIN (IBC) for that<br>Can be used in all countres<br>In various sectors</h1>
						<p>
						IBC Beauty Token is a cryptocurrency that can actually be used in all affiliate stores worldwide, and we will lead the future of all beauty experts from all over the globe.
						</p>
					</span>
					<span class="ibc-movie-col">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/MQWxMijxT9k" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</span>
				</div>
			</div>
		</section>
		
		<!--섹션5 EVERESCO 소개-->
		<section id="section05">
			<div class="container">
				<div class="h1" id="show01">
					<h1>
						Hello. We are <b>EVERESCO.</b><br>
						Thank you for visiting<br>
						EVERESCO’s website.
					</h1>
				</div>
				<center>
				<div class="p" id="show02">
					<p>EVERESCO is a company which leads and grows along with the customers to succeed in the Blockchain and cryptocurrency industry.
					</p>
				</div>
				</center>
			</div>
		</section>
		
		<!--섹션6 EVERESCO 소개2-->
		<section id="section06">
			<div class="container">
				<div id="show03">
					<center><span class="img-top"><img src="../img/img01.png"></span>
					<span class="img"><img src="../img/img02.png"><img src="../img/img03.png"><img src="../img/img04.png"><img src="../img/img04_.png"></span></center>
				</div>
				<p id="show05">Individual investors face various challenges in investing in the cryptocurrency and financial market. Many would be hesitant to invest in the market due to worries about the loss. Yes, it is true that cryptocurrency financial market is gaining interest globally, and many have become rich, while many have suffered tremendous loss. EVERESCO shares information regarding cryptocurrency, and strive to provide various high quality information. We provide diverse range of portfolios, and make endless efforts to maximize profit by prioritizing stability, profitability, liquidity, and independency.</p>
				<p id="show06">Also, EVERESCO operates business around the world. In fact, the biggest strength of our platform lies in the fact that all branches around the globe are operated individually, enabling the business to be operated in most efficient and flexible ways possible. EVERESCO is connected to the world.</p>
				<div class="space"></div>
				<center>
					<div id="show07">
						<span class="box-01">
							<h2>We provide you with the platform which connects you with the world.</h2>
						</span>
						<span class="box-02">
							<h3>With independent branches operated in each country, a more stable utilization platform is possible.</h3>
						</span>
						<span class="box-01">
							<h2>EVERESCO provides stable and transparent platform for its members.</h2>
						</span>
					</div>
				</center>
			</div>
		</section>
			
		<!--섹션7 블록체인-->
		<section id="section07">
			<div class="container">
				<div class="space"></div>
				<h1 id="show08">Integrating Financial Industry and Blockchain</h1>
				<div class="space"></div>
				<p id="show09">
					Blockchain ensures credibility of transaction without specific guarantee. Bitcoin enables cryptocurrency transfer without the endorsement of banks.<br>
					Bitcoin users do not have to worry about the deletion or falsification of transaction records, as they are duplicated in numerous nodes.<br>
					The Blockchain itself provides credibility in person-to-person transactions. Individuals choose to use Blockchain for mutual trust, and in the same sense, financial institutions use Blockchain for the credibility of transaction and shared information.
				</p>
				<div class="space"></div>
				<p id="show10">
					Businesses requiring credibility between institutions result in tremendous cost and time consumption. For instance, transactions between financial institutions are conducted through central counterparties or central banks,<br>
					through which substantial expenses occur and immediate clearing is impossible, as central counterparty regularly conducts clearing in batches. The establishment of Blockchain-based clearing system for institutions will reduce expenses required for the verification of credibility and enable immediate clearing.
				</p>
				<div class="space"></div>
				<p id="show11">
					EVERESCO will conduct business by combining Blockchain technology with finance.
				</p>
			</div>
		</section>
			
		<!--섹션8 블록체인2-->
		<section id="section08">
			<div class="container">
				<div class="space"></div>
				<center>
					<div id="show12">
						<span class="box">
							<img src="../img/img12.png">
							<h2 style="text-align: left;">New and exclusive financial<br>business using Blockchain</h2>
						</span>
						<span class="box">
							<img src="../img/img13.png">
							<h2 style="text-align: left;">Proposing a new method of<br>transaction to the existing industry</h2>
						</span>
					</div>
				</center>
				<div id="show13">
					<p>
					What about tasks other than transactions between financial institutions? For instance, testing through CA institution is required to verify digital certificate issued by other institutions.<br><br>
					Also, how about tasks which require data of other institutions? It would be difficult to openly share DB, and falsification of data may lead to conflicts on the matter of responsibility.<br><br>
					However, the application of Blockchain technology will enable easy verification of shared data. Once the required system is established through blockchain, all information will be shared with other institutions, among which those concerned will verify the authenticity of the data, which will also be shared immediately with other parties. Through such process, immediate processing of data is enabled without having to worry about costly expenses on verification and guarantee. Also, the central system will be unsusceptible to attacks, and all falsification attempts are recorded to allow clarification of responsibility. Sharing required data through simple processes is another appealing element of the Blockchain technology.
					</p>
				</div>
			</div>
		</section>
		
		<!--섹션3 IBC란?-->
		<section id="section03">
			<div class="container">
				<h1 id="show14">EVERESCO BEAUTY COIN</h1>
				<p id="show15">
				EVERESCO and IBH will cooperate in developing international businesses. With International Beauty &amp; Health General Union, EVERESCO has developed and launched cryptocurrency which can be used in everyday life. EVERESCO Beauty Coin will be used as the key currency of beauty and health industry through business affiliation with IHU and IHO.
				</p>
			</div>
		</section>
		
		<!--섹션4 IBC-->
		<section id="section04">
			<div class="container">
				<span class="text">
					<p id="show16">
						IBH is a Seoul-based general union of beauty, cosmetics and health management industry. Established in 1993, IBH now boasts more than 20 years of history, and operates more than 180 businesses in diverse industries of countries including Malaysia, Taiwan, China, United States, United Kingdom, Japan, Philippines, and Thailand. Through IBH the professionals of the industry exchange latest information and acquire newest knowledges of the ever-changing generation, leading the change that best accord with the needs of the market.
					</p>
					<p id="show17">
						IBH also operates BHL korea Beauty Certification Agency, which issues certifications for professional skills of the industry. In the era of globalization, to respond to the changing and developing trends of universal beauty and health management industry, IBH pursues the standard of trust through mutual benefit, and exchanges between people and organizations.
					</p>
				</span>
				<span class="img"><center><img src="../img/img14.png"></center></span>
			</div>
		</section>
		
	</main>
	
	
	
	<!--하단-->
	<footer>
		<?php include "./footer.php";?>
	</footer>
</body>

	
	
</html>
<script>
	//브라우저 ie 여부
	var agent = navigator.userAgent.toLowerCase();
	if ( (navigator.appName == 'Netscape' && agent.indexOf('trident') != -1) || (agent.indexOf("msie") != -1)) {
		$("#section01").css({"background-attachment": "inherit"});
		$("#section03").css({"background-attachment": "inherit"});
		$("#section07").css({"background-attachment": "inherit"});
	}
</script>