<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF"
      crossorigin="anonymous"
    />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?= base_url("/assets/js/mqttws31.js"); ?>" type="text/javascript"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&amp;display=swap" rel="stylesheet">
    <title>Weather</title>
    <style>
	  @font-face {
		font-family: 'MyFont';
        src: url('<?= base_url("wt/assets/font/AndadaPro.ttf"); ?>') format('truetype');
      }
      body {
          <?php
            if($templateSettings['bg_type']==="black")
                echo "background: #000000;";
            else if($templateSettings['bg_type']==="white")
                echo "background: #FFFFFF;";
            else if($templateSettings['bg_type']==="dark")
                echo "background: ".$commonSettings['dark_color_code'].";";
            else if($templateSettings['bg_type']==="light")
                echo "background: ".$commonSettings['light_color_code'].";";
            else if($templateSettings['bg_type']==="color")
                echo "background: ".$templateSettings['bg_color'].";";
            else if($templateSettings['bg_type']==="simage")
            {
                echo "
                  background-image: url('".base_url("wt/assets/defaults/sbg.png")."');
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;";
            }
            else if($templateSettings['bg_type']==="waves")
            {
                echo "
                  background-image: url('".base_url("wt/assets/defaults/waves.png")."');
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;";
            }
            else if($templateSettings['bg_type']==="anim")
            {
                echo "
                  background-image: url('".base_url("wt/assets/defaults/anim.webp")."');
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;";
            }
            else if($templateSettings['bg_type']==="image")
            {
                echo "
                  background-image: url('".base_url("wt/assets/defaults/".$tid."bg.png")."');
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;";
            }
          ?>
        color: white;
        overflow:hidden;
      }
	  body,h1,h2,h3,p{
	    font-family: 'PT Sans', sans-serif;
	    color:<?php
            if($templateSettings['bg_type']==="black")
                echo "#FFFFFF;";
            else if($templateSettings['bg_type']==="white")
                echo "#000000;";
            else if($templateSettings['bg_type']==="dark")
                echo $commonSettings['light_color_code'];
            else if($templateSettings['bg_type']==="light")
                echo $commonSettings['dark_color_code'];
            else if($templateSettings['bg_type']==="waves")
                echo "#000000";
            else if($templateSettings['bg_type']==="color")
            {
                $color = $templateSettings['bg_color'];
                $R = hexdec($color[1].$color[2]);
                $G = hexdec($color[3].$color[4]);
                $B = hexdec($color[5].$color[6]);
                
                if(((max($R, $G, $B) + min($R, $G, $B)) / 510.0) > 0.6) {
                    echo $commonSettings['dark_color_code'];
                } else {
                    echo $commonSettings['light_color_code'];
                }
	        }
	        ?>;
	  }
      .wrapper {
        width: 100%;
        padding-right: 10%;
        padding-left: 10%;
        margin-right: auto;
        margin-left: auto;
      }
      .city-name {
	    font-family: 'PT Sans', sans-serif;
	    font-weight: bold;
        font-size: 110px;
        margin-bottom: 0px;
      }
      .temp {
        font-size: 75px;
        margin-bottom: 0px;
      }
      .fs-26 {
        font-size: 26px;
      }
      .fs-28 {
        font-size: 28px;
      }
      .current-date {
        font-size: 56px;
        margin-bottom: 0px;
        font-family: 'PT Sans', sans-serif;
      }
      .divider {
        height: 0px;
        width: 2px;
        border-bottom: 2px solid <?php
            if($templateSettings['bg_type']==="black")
                echo "#FFFFFF;";
            else if($templateSettings['bg_type']==="white")
                echo "#000000;";
            else if($templateSettings['bg_type']==="dark")
                echo $commonSettings['light_color_code'];
            else if($templateSettings['bg_type']==="light")
                echo $commonSettings['dark_color_code'];
            else if($templateSettings['bg_type']==="color")
            {
                $color = $templateSettings['bg_color'];
                $R = hexdec($color[1].$color[2]);
                $G = hexdec($color[3].$color[4]);
                $B = hexdec($color[5].$color[6]);
                
                if(((max($R, $G, $B) + min($R, $G, $B)) / 510.0) > 0.6) {
                    echo $commonSettings['dark_color_code'];
                } else {
                    echo $commonSettings['light_color_code'];
                }
	        }
	        ?>;
        -webkit-animation: increase 3s;
        -moz-animation: increase 3s;
        -o-animation: increase 3s;
        animation: increase 3s;
        animation-fill-mode: forwards;
      }

      @keyframes increase {
        100% {
          width: 100%;
        }
      }
      path {
          fill: none;
          stroke: #646464 !important;
          stroke-width: 1px;
          stroke-dasharray: 2,2;
          stroke-linejoin: round;
      }
    </style>
  </head>
  <body>
    <div
      class="wrapper d-flex flex-column justify-content-center"
      style="height: 100vh"
    >
      <div class="row mb-5">
        <div class="col-sm-6">
          <p
            class="city-name"
            data-aos="fade-left"
            data-aos-easing="linear"
            data-aos-duration="900"
			id="city_name"
          >
          </p>
          <p
            class="current-date"
            data-aos="fade-left"
            data-aos-easing="linear"
            data-aos-duration="950"
			id="today_dayname"
          >
          </p>
          <p
            class="current-date"
            data-aos="fade-left"
            data-aos-easing="linear"
            data-aos-duration="1000"
			id="today_date"
          >
          </p>
        </div>
        <div class="col-sm-6">
          <div class="d-flex flex-row justify-content-end">
              <svg style="width: 300px; height: auto;">
                <img
                  src="<?= base_url("wt/assets/img/sun.svg"); ?>"
                  class="img-fluid"
                  style="width: 300px; height: auto;"
                  alt=""
    			  id="weather_logo"
                  data-aos="fade-left"
                  data-aos-easing="linear"
                  data-aos-duration="500"
                  data-aos-offset="500"
                />
            </svg>
            <p
              class="align-self-end temp"
              data-aos="fade-left"
              data-aos-easing="linear"
              data-aos-duration="400"
              data-aos-offset="300"
			  data-aos-once=false
			  id="current_temp"
            >
            </p>
          </div>
        </div>
      </div>
      <div class="divider my-4"></div>
      <div class="row">
        <div class="col-sm-3" data-aos="fade-up">
          <p class="text-center fs-26" id="todayplus1">Tomorrow</p>
          <img
            src="<?= base_url("wt/"); ?>/assets/img/113_yes.svg"
            class="d-block mx-auto"
            style="width: 100px; height: auto"
            alt=""
            id="tp1logo"
          />
          <p class="text-center fs-28" id="tp1temp">17°</p>
        </div>
        <div
          class="col-sm-3"
          data-aos="fade-up"
          data-aos-easing="linear"
          data-aos-duration="500"
        >
          <p class="text-center fs-26" id="todayplus2">Day after Tommorrow</p>
          <img
            src="<?= base_url("wt/"); ?>/assets/img/176_yes.svg"
            class="d-block mx-auto"
            style="width: 100px; height: auto"
            alt=""
            id="tp2logo"
          />
          <p class="text-center fs-28" id="tp2temp">16°</p>
        </div>
        <div
          class="col-sm-3"
          data-aos="fade-up"
          data-aos-easing="linear"
          data-aos-duration="750"
        >
          <p class="text-center fs-26" id="todayplus3"></p>
          <img
            src="<?= base_url("wt/"); ?>/assets/img/308.svg"
            class="d-block mx-auto"
            style="width: 100px; height: auto"
            alt=""
            id="tp3logo"
          />
          <p class="text-center fs-28" id="tp3temp">15°</p>
        </div>
        <div
          class="col-sm-3"
          data-aos="fade-up"
          data-aos-easing="linear"
          data-aos-duration="1000"
        >
          <p class="text-center fs-26" id="todayplus4"></p>
          <img
            src="<?= base_url("wt/"); ?>/assets/img/119.svg"
            class="d-block mx-auto"
            style="width: 100px; height: auto"
            alt=""
            id="tp4logo"
          />
          <p class="text-center fs-28" id="tp4temp">13°</p>
        </div>
      </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    </script>
	<script>
		var singles = [119, 143, 185, 227, 230, 260, 263, 266, 281, 284, 305, 308, 311];
		var doubles = [113, 116, 122, 176, 179, 182, 200, 248, 293, 296, 299, 302];
		var access_key = "70a4dfd83bc9d8b65b342d11d63e3960";
		var loc = "<?php echo $templateSettings['location']; ?>";
		function update(location){
			$.post('https://api.weatherstack.com/forecast?access_key='+access_key+'&query='+location+"&forecast_days=4&hourly=1&interval=12", function(response) {
				//console.log(JSON.stringify(response))
				var obj = response;
				var forecast_keys = [];
				for (var key in obj.forecast) {
				    forecast_keys.push(key)
                }
                console.log(forecast_keys);
				document.getElementById("city_name").innerHTML = obj['location']['name'];
				document.getElementById("current_temp").innerHTML = obj['current']['temperature']+"°";
				var event = new Date();
				var options = { weekday: 'long' };
				document.getElementById("today_dayname").innerHTML = event.toLocaleDateString('en-US', options);
				options = { month: 'long', day: '2-digit' , year: 'numeric' };
				document.getElementById("today_date").innerHTML = event.toLocaleDateString('en-US', options);
				
				var today = new Date();
				var day = today.getDay();
				var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
				
				document.getElementById("todayplus1").innerHTML = days[((day+1)%6)];
				document.getElementById("todayplus2").innerHTML = days[((day+2)%6)];
				document.getElementById("todayplus3").innerHTML = days[((day+3)%6)];
				document.getElementById("todayplus4").innerHTML = days[((day+4)%6)];
				
				document.getElementById("tp1temp").innerHTML = obj['forecast'][forecast_keys[0]]['hourly'][1]['temperature']+"°";
				document.getElementById("tp2temp").innerHTML = obj['forecast'][forecast_keys[1]]['hourly'][1]['temperature']+"°";
				document.getElementById("tp3temp").innerHTML = obj['forecast'][forecast_keys[2]]['hourly'][1]['temperature']+"°";
				document.getElementById("tp4temp").innerHTML = obj['forecast'][forecast_keys[3]]['hourly'][1]['temperature']+"°";
				if(doubles.includes(obj['current']['weather_code']))
				{
					document.getElementById("weather_logo").src = "<?= base_url("wt/"); ?>/assets/img/"+obj['current']['weather_code']+"_"+obj['current']['is_day']+".svg";
				}else if(singles.includes(obj['current']['weather_code'])){
					document.getElementById("weather_logo").src = "<?= base_url("wt/"); ?>/assets/img/"+obj['current']['weather_code']+".svg";
				}
				for (let i = 0; i < 4; i++) {
				    console.log("Setting "+(i+1)+" to "+obj['forecast'][forecast_keys[i]]['hourly'][1]['weather_code']+".svg");
    				if(doubles.includes(obj['forecast'][forecast_keys[i]]['hourly'][1]['weather_code']))
    				{
    					document.getElementById("tp"+(i+1)+"logo").src = "<?= base_url("wt/"); ?>/assets/img/"+obj['forecast'][forecast_keys[i]]['hourly'][1]['weather_code']+"_yes.svg";
    				}else if(singles.includes(obj['forecast'][forecast_keys[i]]['hourly'][1]['weather_code'])){
    					document.getElementById("tp"+(i+1)+"logo").src = "<?= base_url("wt/"); ?>/assets/img/"+obj['forecast'][forecast_keys[i]]['hourly'][1]['weather_code']+".svg";
    				}
				}
				AOS.init();
			});
		}
		update(loc);
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
            mqtt.subscribe("/signage/weather/<?php echo $tid; ?>");
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
	    echo "here...";
	    if(!empty($isPlaylist)){
	        echo view('playlist');
	    }
	?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
