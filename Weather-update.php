
<!doctype html>
<html>
	<head>
	    <title>Weather Update</title>
	    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	    <meta charset="utf-8" />
	    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1" />
	    <script type="text/javascript" src="jquery-ui.min.js"></script>
	    <script type="text/javascript" src="jquery-1.11.2.min.js"></script>
	    <style>
	    	body{
	    		 background: url(Bg/1.jpg) no-repeat center center fixed; 
				 -webkit-background-size: cover;
				 -moz-background-size: cover;
			     -o-background-size: cover;
			     background-size: cover;
	    	}

	    	#heading{
	    		font-family: 'Lucida Sans', Arial, sans-serif;
	    		color: white;	
	    		text-align: center;
	    		opacity: 0.9;
	    	}

	    	.centre{
	    		text-align: center;
	    	}

	    	.city-label{
	    		color: white;
	    		opacity: 0.8;	
	    		font-size: 1.6em;
	    		text-align: center;
	    	}

	    	.update-btn{
	    		margin-top: 20px;
	    	}
            
            #forecast{
                display:none;
            }
            
            #forecast-failure{
                display:none;
            }
	    </style>   
	</head>
		
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-offset-1">
                    <h1 id="heading">Fun with the Wind</h1>
					<br /><br />
					<div class="form centre">
						<p class="city-label centre">Enter Your City to get a Weather Update</p>
						<div class="form-group">	
							<input type="text" class="form-control" name="city" id="city" style="margin-top:20px;"></input>							
						</div>
						<button class="btn btn-success btn-lg update-btn">Get update</button>
                        <br /><br />
						<div class="alert alert-success" id="forecast"></div>
                    	<div class="alert alert-danger" id="forecast-failure"></div>
                    
					</div>
					
				</div>
			</div>
		</div>
		
	</body>
    <script>
        $(" button").click(function(event){
            event.preventDefault();
            if($("#city").val()==""){
                $("#forecast").fadeOut();
                $("#forecast-failure").html("Please enter a valid city").fadeIn();
            }
            else{
                $.get("scraper.php?city="+$("#city").val(),function(data){
                    if(data=="false"){
                        $("#forecast").fadeOut();
                        $("#forecast-failure").html("Please enter a valid city").fadeIn();
                    }
                    else{
                        $("#forecast").html(data).fadeIn();
                        $("#forecast-failure").fadeOut();   
                    }
                    
                });
            }
            
            
        }); 
    </script>
</html>