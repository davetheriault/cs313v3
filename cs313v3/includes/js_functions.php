<script>
    function showResults(str, user, add) {

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
        if (add !== 0) {
            xmlhttp.open("GET", "includes/results.php?find=" + str + "&user=" + user + "&add=" + add, true);
        } else {
            xmlhttp.open("GET", "includes/results.php?find=" + str + "&user=" + user, true);
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
    
    document.getElementsByClassName('addthing').;

</script>