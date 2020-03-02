//Write your javascript here, or roll your own. It's up to you.
//Make your ajax call to http://localhost:8765/api/index.php here


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
            // as user type, gives the information
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
// try to get info when user clicks search, but it goes to next page. Have tried with innerHTML and loop through JSON file to
// display text