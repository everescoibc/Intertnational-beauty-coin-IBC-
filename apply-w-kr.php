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
							<h1>IBC 구매신청</h1>
						</div>
						<div class="line"></div>
						<div>
							<span class="margin-l">국가</span>
							<span class="col-1">
								<select name="branch" id="branch" required>
									<option value="korea">한국</option>
									<option value="china">중국</option>
									<option value="japan">일본</option>
									<option value="taiwan">대만</option>
									<option value="singapore">싱가포르</option>
									<option value="vietnam">베트남</option>
								</select>
							</span>
						</div>
						<div>
							<span class="margin-l">이름</span>
							<span class="col-1"><input name="name" id="mame" type="text" placeholder="이름을 입력하세요." maxlength="20" required></span>
						</div>
						<div>
							<span class="margin-l">E-mail</span>
							<span class="col-1"><input name="email" id="email" type="email" placeholder="이메일을 입력하세요." maxlength="40" required></span>
						</div>
						<div>
							<span class="margin-l">비밀번호</span>
							<span class="col-1"><input name="password" id="password" type="password" placeholder="비밀번호" maxlength="20" required></span>
						</div>
						<div>
							<span class="margin-l">비밀번호 확인</span>
							<span class="col-1"><input name="passwordcf" id="passwordcf" type="password" placeholder="비밀번호 확인" maxlength="20" required></span>
						</div>
						<div>
							<span class="margin-l">결제 방법</span>
							<span class="col-2">이더리움 (ETH)</span>
						</div>
						<div class="apply-info-a">
							<span class="margin-l">결제 금액</span>
							<span class="col-2-2"><input name="amount" type="number" id="amount" placeholder="수량" min="1" max="100" required> ETH</span>
						</div>
						<div>
							<span class="margin-l">IBC 개수</span>
							<span class="col-2"><output name="receive" id="receive" for="amount"></output> IBC</span>
						</div>
						<div>
							<span class="margin-l">추천인</span>
							<span class="col-1"><input name="recommender" id="recommender" type="text" placeholder="추천인을 입력하세요." maxlength="20"></span>
						</div>
						<div class="line"></div>
						<div>
							<h2 class="margin-l">결제방법은 접수되면 이메일을 통해 별도로 알려드립니다.<br><br>신청된 이메일이 중복될 경우 접수가 정상적으로 되지 않습니다.</h2>
						</div>
						<center><button class="bt-apply" type="submit">신청하기</button></center>
					</div>
				</form>
			</div>
		</div>
	</main>
	
	
	
	<footer>
	</footer>
</body>
	
	
	
</html>
