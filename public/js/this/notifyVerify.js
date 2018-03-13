/*
objConten, callback
*/
function getMorf(dna,){
	var dnaStr = dna.split("@dnaSplit");
	var sz = dnaStr.length;
	$http.get('@http', config).then(successCallback, errorCallback);
	var num = 0;
	while (num < dnaStr.length) {
		num++;
	}

}