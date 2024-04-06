<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="<?= base_url("bd/"); ?>/js/mqttws31.js" type="text/javascript"></script>
    <title>Hello, world!</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani&display=swap');
		html,body{
		  width:100%;
		}
        body {
          <?php 
            if($templateSettings['bg_type']==='image'){
                echo "background-image: url('".base_url("bd/")."/defaults/".$tid."bg.jpg');
                      background-size: cover;
                      background-repeat: no-repeat;";
            }else if($templateSettings['bg_type']==='dark')
                echo "background-color: #000000;";
            else if($templateSettings['bg_type']==='light')
                echo "background-color: #D9E2AB;";
            else
                echo "background-image: url('".base_url("bd/")."/defaults/".$templateSettings['bg_type'].".jpg');
                      background-size: cover;
                      background-repeat: no-repeat;";
          ?>
        }
        .birthday-text {
            font-family: 'Satisfy', cursive;
            color: white;
            font-size: 150px;
            line-height: 1.15;
            margin-bottom: 0px;
            text-align: center;
        }
        .name-text {
          font-family: 'Rajdhani', sans-serif;
          color: white;
          font-size: 90px;
        }
        .quote-text {
          font-family: 'Varela Round', sans-serif;
          color: white;
          font-size: 40px;
        }
        .logo {
          width: 200px;
          height: auto;
        }
    </style>
  </head>
  <body>
    <div class="container" id="container" style="height: 95vh; max-width:90%; display: flex; flex-direction: row; justify-content: center; align-items: center;">
        <div style="position: absolute; width:100%;">
          <p class="birthday-text">
              <span style="color: <?php echo $commonSettings[$templateSettings['bg_type'].'_happy_text_color']; ?>;">Happy</span>
			  <br>
			  <span style="color: <?php echo $commonSettings[$templateSettings['bg_type'].'_birthday_text_color']; ?>;">Birthday!</span>
			  <br>
			  <span class="name-text" style="color:<?php echo $commonSettings[$templateSettings['bg_type'].'_name_text_color']; ?>;"><?php echo $templateSettings['person_name'];?></span>
			  <br>
			  <span class="quote-text" style="color:<?php echo $commonSettings[$templateSettings['bg_type'].'_name_text_color']; ?>;">Wishing you a birthday that’s just as wonderful as you are!</span>
		  </p>
        </div>
    </div>
	<script src="<?= base_url("bd/"); ?>/fireworks/fireworks.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
	const container = document.getElementById('container')
	const fireworks = new Fireworks(container, {
		  rocketsPoint: 50,
		  hue: { min: 0, max: 360 },
		  delay: { min: 10, max: 15 },
		  speed: 3,
		  acceleration: 1.05,
		  friction: 0.95,
		  gravity: 1,
		  particles: 100,
		  trace: 4,
		  explosion: 6,
		  autoresize: true,
		  brightness: { 
			min: 50, 
			max: 80,
			decay: { min: 0.015, max: 0.03 }
		  },
		  mouse: { 
			click: false, 
			move: false, 
			max: 3 
		  },
		  boundaries: { 
			x: 50, 
			y: 50, 
			width: container.clientWidth, 
			height: container.clientHeight 
		  },
		  sound: {
			enable: false,
		  }
	});
	fireworks.start();
	</script>
	<script>
	    var mqtt;
		var reconnectTimeout = 2000;
		var host="89.40.11.42";
		var port=8883;

		function onFailure(message) {
			console.log("Connection Attempt to Host "+host+"Failed");
			setTimeout(MQTTconnect, reconnectTimeout);
		}

		function onConnect() {
			console.log("Connection Successful!");
            mqtt.subscribe("/signage/birthday/<?php echo $tid; ?>");
		}
		
		function onMessageArrived(msg){
			try{
				var location=msg.payloadString;
				console.log(location);
				window.location.reload();
				//update(location);
			}catch(err) {
			  console.log(err.message);
			}
		}
		
		function MQTTconnect() {
			console.log("connecting to "+ host +" "+ port);
			var x=Math.floor(Math.random() * 10000); 
			var cname="orderform-"+x;
			mqtt = new Paho.MQTT.Client(host,port,cname);
			var options = {
			    useSSL:true,
				timeout: 3,
				onSuccess: onConnect,
				onFailure: onFailure,
				reconnect: true
			};
			mqtt.onMessageArrived = onMessageArrived;
			mqtt.connect(options); //connect
		}
		MQTTconnect();
	</script>
	<?php
	    if(!empty($isPlaylist)){
	        echo view('playlist');
	    }
	?>
  </body>
</html>