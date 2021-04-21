function discount() {
    var total = document.getElementById("form").total.value;
    var disc = document.getElementById("form").disc.value;

	// Celsius
	if(disc == "DumbWaysJos" && total >= 50000) {
		var a = total * 21.1/100;
        if(a <= 20000) {
            var diskon = a;
            var payment = total - a;
        } else {
            var diskon = 20000;
            var payment = total - 20000;
        }
	} else if(disc == "DumbWaysMantap" && total >= 80000) {
		var a = total * 30/100;
        if(a <= 40000) {
            var diskon = a;
            var payment = total - a;
        } else {
            var diskon = 40000;
            var payment = total - 40000;
        }
	} 
    
var output = `
<h2>Payment: ${payment}</h2>
<h2>discount: ${diskon}</h2>
<h2>Change: ${total - payment}</h2>

`;

document.getElementById("output").innerHTML = output
}
