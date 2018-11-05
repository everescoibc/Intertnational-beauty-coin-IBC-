<?php include "../dbonline.php";?>
<!doctype html>
<html>
	
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--타이틀-->
<link rel="icon" href="../../img/everesco-t.png">
<title>IBC BeautyCoin</title>
<mete name="keywords" content="EVERESCO" />
<meta name="description" content="안녕하세요. EVERESCO입니다." />
<!--CSS&font&icon-->
<link rel="stylesheet" href="../styles/ibc-st-mo(def).css">
<link rel="stylesheet" href="../styles/ibc-st-ta-pc.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--Jquery&script-->
<script src="../../script/jquery-3.3.1.min.js"></script>
<script src="../../script/jquery-ui.js"></script>
</head>

	
	
<body>
	<header>
	</header>
	
	
	
	<script>
	</script>
	<main>
		<div id="apply-w">
			<div class="container">
				<form action="apply-ac.php" method="post" oninput="receive.value=parseInt(amount.value)*50000">
					<div class="apply-info">
						<div>
							<h1>Order BeautyCoin(IBC)</h1>
						</div>
						<div class="line"></div>
						<div>
							<span class="margin-l">分社</span>
							<span class="col-1">
								<select name="branch" id="branch" required>
									<option value="china">中国</option>
									<option value="korea">韩国</option>
									<option value="japan">日本</option>
									<option value="taiwan">台湾</option>
									<option value="singapore">新加坡</option>
									<option value="vietnam">越南</option>
								</select>
							</span>
						</div>
						<div>
							<span class="margin-l">名字</span>
							<span class="col-1"><input name="name" id="mame" type="text" placeholder="请输入名字" maxlength="20" required></span>
						</div>
						<div>
							<span class="margin-l">邮箱</span>
							<span class="col-1"><input name="email" id="email" type="email" placeholder="请输入邮箱" maxlength="40" required></span>
						</div>
						<div>
							<span class="margin-l">密码</span>
							<span class="col-1"><input name="password" id="password" type="password" placeholder="请输入密码" maxlength="20" required></span>
						</div>
						<div>
							<span class="margin-l">确认密码</span>
							<span class="col-1"><input name="passwordcf" id="passwordcf" type="password" placeholder="确认密码" maxlength="20" required></span>
						</div>
						<div>
							<span class="margin-l">结算方式</span>
							<span class="col-2">以太坊（ETH)</span>
						</div>
						<div class="apply-info-a">
							<span class="margin-l">结算金额</span>
							<span class="col-2-2"><input name="amount" type="number" id="amount" placeholder="数量" min="1" max="100" required> ETH</span>
						</div>
						<div>
							<span class="margin-l">IBC 数量</span>
							<span class="col-2"><output name="receive" id="receive" for="amount"></output> IBC</span>
						</div>
						<div>
							<span class="margin-l">推荐人</span>
							<span class="col-1"><input name="recommender" id="recommender" type="text" placeholder="请输入推荐人" maxlength="20"></span>
						</div>
						<div class="line"></div>
						<div>
							<h2 class="margin-l">付款方式将通过邮箱通知<br><br>邮箱地址不可重复使用</h2>
						</div>
						<center><button class="bt-apply" type="submit">申请</button></center>
					</div>
				</form>
			</div>
		</div>
	</main>
	
	
	
	<footer>
	</footer>
</body>
	
	
	
</html>

