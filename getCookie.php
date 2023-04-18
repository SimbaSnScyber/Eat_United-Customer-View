<script>
		var tid = setInterval(function () {
		if (document.readyState !== "complete") return;
		if(<?php echo $_GET['uid'];?>){
         clearInterval(tid);
			document.cookie = "currentUser = <?php echo $_GET['uid'];?>";
		}
	}, 100 );
</script>
<script>
		function getCookie(cname) {
     var name = cname + "=";
     var ca = document.cookie.split(';');
     for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if(c.indexOf(name) == 0)
           return c.substring(name.length,c.length);
     }
     return "";
}
	</script>