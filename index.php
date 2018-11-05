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
						欢迎光临这里是<b>EVERESCO</b>公司。<br>
						欢迎访问我公司<br>
						并予以诚挚的感谢。
					</h1>
				</div>
				<center>
				<div class="p" id="show02">
					<p>EVERESCO将引领第四产业区块链产业与数字货币走向成功并以客户为中心的企业。
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
				<p id="show05">在数字货币及金融市场中，个人投资者独自面临挑战时，会遇到很多困难。与收益相比，投资方由于担心损失，而犹豫不决的情况屡见不鲜。尤其，近来全世界范围内，在备受关注的数字货币金融市场中，出现了大量的有钱人。而另一方面，也有不少损失惨重的投资者。所以，我们EVERESCO将与个人投资者一起分享数字货币的相关信息，为客户提供既丰富又重要的信息，以及适合投资者的投资组合。为了把客户们的收益最大化，我们结合客户的情况，推出了多种多样的产品，优先考虑投资的安全性、收益性、资金的流动性、以及独立性。时刻保障客户最大的利益，是我们公司不断进取的动力。
				</p>
				<p id="show06">此外，EVERESCO在全世界范围内都有产业。使用我们平台最大的优点是在全球各分公司内可以实现独立运营。所以，我们的平台在各国，都可以被灵活运用于投资产业，EVERESCO与全世界紧密相连。</p>
				<div class="space"></div>
				<center>
					<div id="show07">
						<span class="box-01">
							<div class="box-01-space"></div>
							<div class="box-01-space"></div>
							<h2>提供连接全世界的的平台。</h2>
						</span>
						<span class="box-02">
							<div class="box-01-space"></div>
							<h3>全球各国独立运营，并通过各分公司更加稳定地使用平台。</h3>
						</span>
						<span class="box-01">
							<div class="box-01-space"></div>
							<h2>EVERESCO是一个为会员提供安全透明平台的企业。</h2>
						</span>
					</div>
				</center>
			</div>
		</section>
			
		<!--섹션7 블록체인-->
		<section id="section07">
			<div class="container">
				<div class="space"></div>
				<h1 id="show08">金融&middot;区块链的结合</h1>
				<div class="space"></div>
				<p id="show09">
					即使没有任何人的担保，区块链这项技术都能让交易内容变得可信。比特币就是在没有银行交易的保障下，对电子货币进行转账。<br>交易内容会在无数的数据切换点进行复制，因此比特币的使用者根本无需担心交易内容会被删除或伪造。<br>区块链可以为个人间的交易增强信任度。个人为了能够彼此信赖而选择使用区块链，同样，机构间也会为了增强交易及信息分享时的信誉而选择使用区块链。
				</p>
				<div class="space"></div>
				<p id="show10">
					现在，机构在进行业务的过程中，为了赢得彼此的信赖就要耗费过多的费用和时间。例如：金融机构在进行交易时，都需要通过清算机构或中央银行进行交易。<br>
					使用这种方法要耗费一大笔交易保障金，同时，清算机构一般都是定期处理积压的清算工作，并不能及时进行清算。如果各机构组成了区块链，并以此形成了清算系统，那么不仅能够减少手续费，还能在第一时间完成清算。
				</p>
				<div class="space"></div>
				<p id="show11">
					EVERESCO将致力于区块链技术和金融的完美结合。
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
							<h2 style="text-align: left;">使用区块链技术的专属于<br>EVERESCO的全新金融产业。</h2>
						</span>
						<span class="box">
							<img src="../img/img13.png">
							<h2 style="text-align: left;">现有金融届个人交<br>易方法提供全新方案。</h2>
						</span>
					</div>
				</center>
				<div id="show13">
					<p>
					除了金融机构间的交易，其它业务又是什么样的呢？例如个人数字证书，要想检测由其它机构发行的个人数字证书，就要通过CA机构进行检测。<br><br>
					如果是经常要用到其它机构数据的业务又会怎样呢？因为无法公开DB，也就很难共享信息。即使对数据进行了共享，如果因中途数据改变而产生了问题，那么又由谁来承担责任呢？这也是一个不可忽视的大问题。对此，如果使用了区块链，就可以很轻松地共享所需数据，并对其进行检测。<br><br>
					通过区块链系统，就可以在机构间共享所需内容，彼此间存在利益关系的各个机构都可以对相关内容进行验证。而且，验证内容也可以第一时间进行共享。以往在验证过程中要花费大量资金。而区块链不仅能够节约成本，还能提高时效。另外，区块链还能及时发现伪造内容，并因为其对所有环节都存有记录，便可以轻而易举地找到责任人。无需对数据进行复杂的处理，就可以轻松共享，这也是区块链的一大魅力。
					</p>
				</div>
			</div>
		</section>
		
		<!--섹션3 IBC란?-->
		<section id="section03">
			<div class="container">
				<h1 id="show14">EVERESCO BEAUTY COIN</h1>
				<p id="show15">
				EVERESCO将与IBH共同携手，发展国际产业。EVERESCO与国际美容健康联盟携手共同推进可用于日常生活的数字货币，并使其面世。
				</p>
			</div>
		</section>
		
		<!--섹션4 IBC-->
		<section id="section04">
			<div class="container">
				<span class="text">
					<p id="show16">
						国际美容与健康联合会（International Beauty &amp; Health General Union）本部位于首尔。IBH是美容、化妆品及健康管理产业协会的联合协会。联盟1993年创立，至今已拥有二十多年的历史，是在马来西亚、台湾、中国、美国、英国、日本、菲律宾、泰国等108个国家和地区开展业务的联盟。在变化迅速的时代，业界人士不仅可以通过IBH共享业界的最新信息，学习最新的业内知识，还可以引领符合市场要求的变化。
					</p>
					<p id="show17">
						IBH拥有可以对业界专业技术过程进行认证的BHL Korea Beauty Certification Agency。在全球化时代，为了应对国家间美容与健康产业的变化和发展趋势，我们通过人力、机构间的合作和交流，以互利为基础，追求互信。同时，通过信息综合的相互交换，共同对资格认证系统进行训练、研发，以此提高各业界从事者的技术和强项，为美容及健康文化产业的发展贡献一份力量。
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