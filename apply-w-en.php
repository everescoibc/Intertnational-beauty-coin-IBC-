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
<!-- 영문폰트 -->
<style>
	* {
		font-family: 'Roboto', sans-serif;
	}
</style>

	
	
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
							<h1>Order BeautyCoin (IBC)</h1>
						</div>
						<div class="line"></div>
						<div>
							<span class="margin-l">Branch</span>
							<span class="col-1">
								<select name="branch" id="branch" required>
									<option value="korea">South-Korea</option>
									<option value="china">China</option>
									<option value="japan">Japan</option>
									<option value="taiwan">Taiwan</option>
									<option value="singapore">Singapore</option>
									<option value="vietnam">Vietnam</option>
								</select>
							</span>
						</div>
						<div>
							<span class="margin-l">Name</span>
							<span class="col-1"><input name="name" id="mame" type="text" placeholder="please enter your name." maxlength="20" required></span>
						</div>
						<div>
							<span class="margin-l">E-mail</span>
							<span class="col-1"><input name="email" id="email" type="email" placeholder="please enter your E-mail." maxlength="40" required></span>
						</div>
						<div>
							<span class="margin-l">Password</span>
							<span class="col-1"><input name="password" id="password" type="password" placeholder="please enter your password." maxlength="20" required></span>
						</div>
						<div>
							<span class="margin-l">Repeat Password</span>
							<span class="col-1"><input name="passwordcf" id="passwordcf" type="password" placeholder="please enter your password again." maxlength="20" required></span>
						</div>
						<div>
							<span class="margin-l">Payment Method</span>
							<span class="col-2">Ethereum (ETH)</span>
						</div>
						<div class="apply-info-a">
							<span class="margin-l">Amount to Pay</span>
							<span class="col-2-2"><input name="amount" type="number" id="amount" placeholder="amount" min="1" max="100" required> ETH</span>
						</div>
						<div>
							<span class="margin-l">Amount to Receive</span>
							<span class="col-2"><output name="receive" id="receive" for="amount"></output> IBC</span>
						</div>
						<div>
							<span class="margin-l">Referral Name (optional)</span>
							<span class="col-1"><input name="recommender" id="recommender" type="text" placeholder="please enter referral name." maxlength="20"></span>
						</div>
						<div class="line"></div>
						<div>
							<h2 class="margin-l">When you apply, we will inform you how to pay by email.<br><br>If the email is duplicated, the application will not be accepted.</h2>
						</div>
						<center><button class="bt-apply" type="submit">Apply payment</button></center>
					</div>
				</form>
			</div>
		</div>
	</main>
	
	
	
	<footer>
	</footer>
</body>
	
	
	
</html>
