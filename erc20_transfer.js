async function tokenTransfer() {
	
	document.getElementById("tx_info").innerHTML = "토큰 전송 시작..<br>";
	console.log("token transfer start");
	
	//변수 선언
	var address, toAddress, contractAddress, contractABI, tokenContract, count, rawTx, gasPriceGwei, gasLimit, value, data , prKey, privateKey;
	address = document.getElementById("sendAddr").value;
	toAddress = document.getElementById("receiveAddr").value;
    contractAddress = document.getElementById("contractAddress").value;
    contractABI = human_standard_token_abi;
    tokenContract = new web3.eth.Contract(contractABI, contractAddress);
	count = await web3.eth.getTransactionCount(address);
	gasPriceGwei = document.getElementById("gasValue").value;
    gasLimit = document.getElementById("gasLimit").value;
	value = document.getElementById("tokenAmount").value;
	data = tokenContract.methods.transfer(toAddress, value).encodeABI();
	prKey = document.getElementById("prKey").value;
	privateKey = new EthJS.Buffer.Buffer(prKey, "hex");
	
	//조건문
	if(address === "") {
		console.log("no address");
	} else if(contractAddress === "") {
		console.log("no contractAddress");
	} else if(contractABI === "") {
		console.log("no contractABI");
	} else if(gasPriceGwei === "") {
		console.log("no gasPriceGwei");
	} else if(gasLimit === "") {
		console.log("no gasLimit");
	} else if(toAddress === "") {
		console.log("no toAddress");
	} else if(value === "") {
		console.log("no value");
	} else if(prKey === "") {
		console.log("no prKey");
	
	//트랜잭션 실행
	} else {
		try {
			//트랜잭션 작성
			let rawTx = {
				"from": address,
				"nonce": "0x" + count.toString(16),
				"gasPrice": web3.utils.toHex(gasPriceGwei * 1e9),
				"gasLimit": web3.utils.toHex(gasLimit),
				"to": contractAddress,
				"value": "0x0",
				"data": data,
				"chainId": 1
			}; console.log(rawTx);
			//트랜잭션 생성
			const tx = new EthJS.Tx(rawTx);
			tx.sign(privateKey);
			let serializedTx = "0x" + tx.serialize().toString("hex");
			web3.eth.sendSignedTransaction(serializedTx).on('transactionHash', function (txHash) {
				document.getElementById("tx_info").innerHTML += "트랜잭션이 생성 되었습니다.<br>" + "트랜잭션 ID: <a href='https://etherscan.io/tx/" + txHash + "' target='_blank'>" + txHash + "</a><br>";
				console.log("txHash: " + txHash);
			}).on("receipt", function (receipt) {
				document.getElementById("tx_info").innerHTML += "거래 영수증이 생성 되었습니다.";
				console.log("receipt: " + receipt);
			}).on("confirmation", function (confirmationNumber, receipt) {
				document.getElementById("confirm_info").innerHTML = "승인: " + confirmationNumber;
				console.log("confirmation: " + confirmationNumber + "receipt: " + receipt);
			}).on("error", function (error) {
				console.log(error);
			});
		//에러 발생	
		} catch (error) {
			document.getElementById("tx_info").innerHTML += error;
			console.log(error);
		}
	}
}
