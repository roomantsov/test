<div id="reviews" class="reviews">
	<h3>Loading...</h3>
</div>
<script type="text/javascript">
	var http = new XMLHttpRequest();
	http.open('POST', 'API/getReviews.php', true);
	http.send();
	http.onreadystatechange = function() {
		if (http.readyState != 4) return;
		document.getElementById('reviews').innerHTML = '';
		if(http.status == 200){
			reviews = JSON.parse(http.responseText);
			for(key in reviews){
				if(reviews[key].is_changed == 1){
					document.getElementById('reviews').innerHTML += '<blockquote><p>'+reviews[key].content+'</p><footer>'+reviews[key].author_name+'</footer><br><button type="button" class="btn btn-success btn-xs">Changed by admin</button> <span class="badge">'+reviews[key].r_date+'</span></blockquote>';
				} else {
					document.getElementById('reviews').innerHTML += '<blockquote><p>'+reviews[key].content+'</p><footer>'+reviews[key].author_name+'</footer><br> <span class="badge">'+reviews[key].r_date+'</span></blockquote>';
				}
			}
			if(reviews.length == 0){
				document.getElementById('reviews').innerHTML = "<h3>No reviews yet</h3>";
			}
		} else {
			alert(http.error);
		}
	}
</script>