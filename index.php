<!DOCTYPE html>
<html>
<head>
	<title>Selectize - Demo</title>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css">
</head>
<body>

	<h2>Contoh dengan data lokal</h2>
	<p>Nama Buah-buahan</p>
	<input type="text" id="fruit" />

	<br>

	<h2>Contoh dengan data remote (mengambil dari server dengan ajax)</h2>
	<p>Cari Kota <small>(untuk contoh ketik : ba)</small></p>
	<input type="text" id="city" value="" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js"></script>

	<script>
		
		$(document).ready(function() {
			$('#fruit').selectize({			
				persist: false,		    
			    // valueField: 'value',
			    // labelField: 'value',			    
			    options: [
			        {value: 'Apel', text : 'Apel'},
					{value: 'Durian', text : 'Durian'},
					{value: 'Mangga', text : 'Mangga'},
					{value: 'Pisang', text : 'Pisang'},
					{value: 'Salak', text : 'Salak'},					
			    ],			  		  
			});
	
			$('#city').selectize({
				persist: false,				
			    valueField: 'value',
			    labelField: 'value',
			    options: [],
			    create: false,			    
			    load: function(query, callback) {
			        if (!query.length) return callback([]);
			        $.ajax({
			            url: window.location.href + 'data.php',
			            type: 'GET',		            
			            data: {
			                q: query,		                
			            },
			            dataType: 'json',
			            error: function() {
			                callback();
			            },
			            success: function(res) {
			                callback(res);
			            }
			        });
			    }
			});
		});

	</script>
</body>
</html>