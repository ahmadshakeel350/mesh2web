var scaling = 0;
var months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];
var weekdays = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
];

function futureDay(numberOfDays) {
  var futureWeekDay = weekday + numberOfDays;
  if (futureWeekDay >= 7) {
    futureWeekDay -= 7;
  }
  return weekdays[futureWeekDay];
}
var singles = [119, 143, 185, 227, 230, 260, 263, 266, 281, 284, 305, 308, 311];
var doubles = [113, 116, 122, 176, 179, 182, 200, 248, 293, 296, 299, 302];
var access_key = "70a4dfd83bc9d8b65b342d11d63e3960";
function update(location){
    console.log("Updating");
	$.post('https://api.weatherstack.com/forecast?access_key='+access_key+'&query='+location+"&forecast_days=4&hourly=1&interval=12", function(response) {
		//console.log(JSON.stringify(response))
		var obj = response;
		var forecast_keys = [];
		for (var key in obj.forecast) {
		    forecast_keys.push(key)
        }
        console.log(forecast_keys);
		$("#city span").text(obj['location']['name']);
		$("#temp").html(obj['current']['temperature']+"°");
		
        $("body").attr("intro-state", "active");
        if(doubles.includes(obj['current']['weather_code']))
		{
			document.getElementById("current_icon").src = "./images/"+obj['current']['weather_code']+"_"+obj['current']['is_day']+".svg";
		}else if(singles.includes(obj['current']['weather_code'])){
			document.getElementById("current_icon").src = "./images/"+obj['current']['weather_code']+".svg";
		}
        var today = new Date();
        var weekday = today.getDay();
        
        var day = today.getDate();
        var month = months[today.getMonth()];
        var year = today.getFullYear();
        
        $("#weekday").html(weekdays[weekday]);
        $("#main>div").show();
        $("#main>div").addClass("box");
        $("#date").html(month + " " + day + ", " + year);
		for (let i = 0; i < 4; i++) {
            $("#day" + (i+1)).html(futureDay(i));
            $(".day" + (i+1)).html(`${obj['forecast'][forecast_keys[i]]['hourly'][1]['temperature']}&deg;`);
            console.log("w2:"+obj['forecast'][forecast_keys[i]]['hourly'][1]['weather_code']);
            if(doubles.includes(obj['forecast'][forecast_keys[i]]['hourly'][1]['weather_code']))
			{
				$("#day" + (i+1)).next().attr("style","background-image: url('./images/"+obj['forecast'][forecast_keys[i]]['hourly'][1]['weather_code']+"_yes.svg');");
			}else if(singles.includes(obj['forecast'][forecast_keys[i]]['hourly'][1]['weather_code'])){
				$("#day" + (i+1)).next().css("background-image",": url('./images/"+obj['forecast'][forecast_keys[i]]['hourly'][1]['weather_code']+".svg');");
			}
		}
	});
}
function loadInit() {
  $("body").attr("intro-state", "inactive");
  $("#main>div").removeClass("box");
  $("#main>div").hide();
  update(loc);
  scaleBody();
  window.addEventListener("resize", scaleBody);
}

function scaleBody() {
  var maxScaleHorizontal = 0;
  var maxScaleVertical = 0;

  if (window.innerWidth > window.innerHeight) {
    maxScaleHorizontal = window.innerWidth / 1920;
    maxScaleVertical = window.innerHeight / 1080;
  } else {
    maxScaleHorizontal = window.innerWidth / 1080;
    maxScaleVertical = window.innerHeight / 1920;
  }
  if (maxScaleHorizontal < maxScaleVertical) {
    scaling = maxScaleHorizontal;
  } else {
    scaling = maxScaleVertical;
  }

  // error alternative
  if (scaling <= 0) {
    if (window.screen.availWidth > window.screen.availHeight) {
      maxScaleHorizontal = window.screen.availWidth / 1920;
      maxScaleVertical = window.screen.availHeight / 1080;
    } else {
      maxScaleHorizontal = window.screen.availWidth / 1080;
      maxScaleVertical = window.screen.availHeight / 1920;
    }
    if (maxScaleHorizontal < maxScaleVertical) {
      scaling = maxScaleHorizontal;
    } else {
      scaling = maxScaleVertical;
    }
  }

  // last error fix
  if (scaling <= 0) {
    scaling = 1;
  }
  $("body").attr(
    "style",
    "-webkit-transform: translate(-50%, -50%) scale(" +
      scaling +
      "); transform: translate(-50%, -50%) scale(" +
      scaling +
      ");"
  );
}

window.setInterval(function () {
  loadInit();
}, 3600000);

loadInit();
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
    mqtt.subscribe("/signage/weather");
}

function onMessageArrived(msg){
	try{
		var location=msg.payloadString;
		console.log(location);
		loc=location;
		loadInit();
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
