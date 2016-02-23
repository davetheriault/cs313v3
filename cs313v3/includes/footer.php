    

</div>
<footer class="w3-container w3-teal w3-center" onload="fixedfooter()">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>

    </ul>
</footer>
<script>

    function fixedfooter() {
        var sh = $(window).height();
        var dh = $(document.body).height();
        if (dh < sh) {
            var foot = document.getElementsByTagName("footer");
            foot.style.position = "fixed";
            foot.style.bottom = 0;
        }
    }
</script>
</body>
</html>