<script>
    function showResults(str, user) {

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

        xmlhttp.open("GET", "includes/results.php?find=" + str + "&user=" + user, true);

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

    function addMov(userid, movieid, find) {
        
        window.alert('addMov called');

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            showResults(find, userid);
            window.alert('onreadystatechange called');
        };

        xmlhttp.open("GET", "includes/addmovieajax.php?user=" + userid + "&mov=" + movieid, true);

        xmlhttp.send();
    }
    


</script>