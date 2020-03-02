//Write your javascript here, or roll your own. It's up to you.
//Make your ajax call to http://localhost:8765/api/index.php here


/*function callCountryInfo(str) {
    var xhttp;
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "api/index.php?country="+str, true);
    xhttp.send();*/


function callCountryInfo(str) {
    //var data, x, txt = "";
    var xhttp;
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
            // loop through JSON file
            /*data = JSON.parse(this.responseText);
            print(data);
            for (x in data) {
                txt += data[x] + "<br>";
            }
            document.getElementById("txtHint").innerHTML = txt;*/
        }
    };
    xhttp.open("GET", "api/index.php?country="+str, true);
    xhttp.send();
}