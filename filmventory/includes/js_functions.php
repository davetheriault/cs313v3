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

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.open("GET", "includes/addmovieajax.php?user=" + userid + "&mov=" + movieid, true);

        xmlhttp.send();
        xmlhttp.onreadystatechange = function () {
            showResults(find, userid);
        };
    }

    function confirm_del(user, movie, title) {
        var conf = confirm('Delete ' + title + '? \nAre you sure?');
        if (conf === true) {
            delMov(user, movie);
        }
    }

    function delMov(userid, movieid) {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.open("GET", "includes/my_movies.php?user=" + userid + "&mov=" + movieid, true);

        xmlhttp.send();
        xmlhttp.onreadystatechange = function () {

            var inner = document.getElementById("collection");
            inner.innerHTML = xmlhttp.responseText;

        };
    }


</script>