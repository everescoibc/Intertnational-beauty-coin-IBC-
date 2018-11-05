//web3 체크
window.addEventListener("load", function () {
    if (typeof web3 !== "undefined") {
        console.log("Web3 Detected! " + web3.currentProvider.constructor.name);
        window.web3 = new Web3(web3.currentProvider);
    } else {
        console.log("No Web3 Detected... using HTTP Provider");
        window.web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/7d4c9067bcac4cf4bf32c2b48680c8c8"));
    }
})

//이더리움 밸런스
async function getBalance() {
    var address, wei, balance, fixBalance;
    address = document.getElementById("address").value;
	innerh = document.getElementById("eth_balance").innerHTML;
	if(address === "") {
		document.getElementById("eth_balance").innerHTML = "주소 없음";
		console.log("no address");
	} else {
		try {
			wei = web3.eth.getBalance(address).then(function (resolvedData) {
				balance = web3.utils.fromWei(resolvedData, 'ether');
				fixBalance = parseFloat(balance).toFixed(5);
				document.getElementById("eth_balance").innerHTML = fixBalance + " ETH";
				console.log("ETH: " + balance);
			});
		} catch (error) {
			document.getElementById("eth_balance").innerHTML = "찾을 수 없는 주소입니다.";
			console.log(error);
		}
	}
}

//토큰 밸런스
async function getERC20Balance() {
    var address, contractAddress, contractABI, tokenWei, tokenContract, tokenBalance;
    address = document.getElementById("address").value;
    contractAddress = document.getElementById("contractAddress").value;
    contractABI = human_standard_token_abi;
    tokenContract = new web3.eth.Contract(contractABI, contractAddress);
	if(address === "") {
		document.getElementById("eth_balance").innerHTML = "주소 없음";
		console.log("no address");
	} else if(contractAddress === "") {
		document.getElementById("ibc_balance").innerHTML = "주소 없음";
		console.log("no contractAddress");
	} else {
		try {
			tokenBalance = tokenContract.methods.balanceOf(address).call(function(err, result) {
				document.getElementById("ibc_balance").innerHTML = result + " IBC";
				console.log("Token: " + result);
			});
		} catch (error) {
			document.getElementById("ibc_balance").innerHTML = "찾을 수 없는 주소입니다.";
			console.log(error);
		}
	}
}
