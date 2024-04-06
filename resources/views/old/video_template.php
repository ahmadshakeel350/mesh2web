<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="<?= base_url("vid/"); ?>/js/mqttws31.js" type="text/javascript"></script>
    <title>Hello, world!</title>
    <style>
        html,body,video{
            height:100%;
            width:100%;
            overflow:hidden;
            background:#000000;
        }
        body{
            margin:0;
        }
        video {
            object-fit: contain;
        }
    </style>
  </head>
  <body id="vbody">
    <video id="video" autoplay>
        <source src="<?php echo base_url("vid/")."/".$templateSettings['url'];?>">
    </video>  
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
            mqtt.subscribe("/signage/vid/<?php echo $tid; ?>");
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
		document.getElementById('vbody').onclick = function () {
            document.getElementById('video').play();
        };
	</script>
	<?php
	    if(!empty($isPlaylist)){
	        echo view('playlist');
	    }
	?>
  </body>
</html>