<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="<?= base_url("tx/"); ?>/js/mqttws31.js" type="text/javascript"></script>
    <title>Hello, world!</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
		html,body{
		  width:100%;
		}
        body {
          background-image: url('<?= base_url("tx/"); ?>/defaults/<?php 
            if($templateSettings['bg_type']==='image')
                echo $tid.'bg';
            else
                echo $templateSettings['bg_type']; ?>.jpg');
          background-size: cover;
          background-repeat: no-repeat;
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
          font-family: 'Satisfy', cursive;
          color: white;
          font-size: 90px;
        }
        .quote-text {
          font-family: 'Satisfy', cursive;
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
    <div class="container" id="container" style="height: 95vh; max-width:80%; display: flex; flex-direction: row; justify-content: center; align-items: center;">
        <div style="width:100%;">
          <p class="birthday-text">
              <span style="color: <?php echo $commonSettings[$templateSettings['bg_type'].'_text_color']; ?>;"><?php echo $templateSettings['text']; ?></span>
		  </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
            mqtt.subscribe("/signage/text/<?php echo $tid; ?>");
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
	        $data['pid'] = $pid;
	        $data['ctid'] = $ctid;
	        $data['duration'] = $duration;
	        echo view('playlist',$data);
	    }
	?>
  </body>
</html>