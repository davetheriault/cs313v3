<script>
    function showResults(str, add) {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            window.alert('window.XMLHttpRequest');
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            window.alert('onReadyStateChange called');
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.alert('ready state 4 status 200');
                document.getElementById("results").innerHTML = xmlhttp.responseText;
            }
        };
        if (add === undefined) {
            window.alert('add undefined')
            xmlhttp.open("GET", "results.php?find=" + str, true);
        } else {
            xmlhttp.open("GET", "results.php?find=" + str + "&add=" + add, true);
        }
        xmlhttp.send();
    }
    
    function search() {
        var noadd;
        var find = document.getElementsByName('find').value;
        if (find == undefined) {
            find = '';
        }
        window.alert(find);
        showResults(find, noadd);
    }

</script>