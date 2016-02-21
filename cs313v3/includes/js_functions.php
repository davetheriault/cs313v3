<script>
    function showResults(str, add) {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            
            if (xmlhttp.readyState == 4) {
                var inner = document.getElementById("results");
                inner.innerHTML = xmlhttp.responseText;
            } 
        };
        if (add === undefined) {
            xmlhttp.open("GET", "includes/results.php?find=" + str, true);
        } else {
            xmlhttp.open("GET", "includes/results.php?find=" + str + "&add=" + add, true);
        }
        xmlhttp.send();
    }
    
    function search() {
        var noadd;
        var find = document.getElementById('find').value;
        if (find == undefined) {
            find = '';
        }
        showResults(find, noadd);
    }

</script>