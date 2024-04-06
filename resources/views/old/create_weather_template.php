<?php echo view('db_head'); ?>
    <body>
    <?php echo view('db_header'); ?>
    <div class="row">
      <?php 
        $data['page']='create_template';
        echo view('db_sidebar',$data);
      ?>
      <div class="col-lg-10 mt-4">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <form class="mb-3" action="" id="weather_template_form" enctype="multipart/form-data"  method="POST" autocomplete="off">
                <div class="form-group mb-4">
				  <label for="" class="form-label label-form">
					Template Name
				  </label>
				  <input
					type="text"
					class="form-control input-control"
					placeholder="Template Name"
					value="<?php echo $templateSettings['template_name']; ?>"
					name="tname"
				  />
                </div>
				<input type="hidden" id="tid" name="tid" value="<?php echo $tid; ?>"/>
                <div class="form-group mb-4">
                  <div class="d-flex flex-row justify-content-between">
                    <label for="" class="form-label label-form">Theme</label>
                  </div>
                  <select
                    class="form-select input-control"
                    aria-label="Default select example"
                    id="bg_type"
                    name="bg_type"
                  >
                    <option value="black" <?php if($templateSettings['bg_type']=="dark") echo "selected"; ?>>Dark</option>
                    <option value="white" <?php if($templateSettings['bg_type']=="light") echo "selected"; ?>>Light</option>
                    <option value="simage" <?php if($templateSettings['bg_type']=="simage") echo "selected"; ?>>KAWS Black</option>
                    <option value="waves" <?php if($templateSettings['bg_type']=="waves") echo "selected"; ?>>Waves</option>
                    <option value="anim" <?php if($templateSettings['bg_type']=="anim") echo "selected"; ?>>Animated</option>
                    <option value="color" <?php if($templateSettings['bg_type']=="color") echo "selected"; ?>>Custom Color</option>
                    <option value="image" <?php if($templateSettings['bg_type']=="image") echo "selected"; ?>>Custom Image</option>
                  </select>
                </div>
                <div class="form-group mb-4" id="bg_color_div" style="display: none;">
				  <label for="" class="form-label label-form">
					Background Color
				  </label><br>
				  <input type="color" id="bg_color" name="bg_color" value="<?php echo $templateSettings['bg_color'];?>">
                </div>
                <div class="form-group mb-4" id="bg_image_div" style="display: none;">
				  <label for="" class="form-label label-form">
					Background Image
				  </label><br>
				  <input type="file" id="bg_image" name="bg_image" accept="image/*">
                </div>
                <div class="form-group mb-4">
                  <div class="d-flex flex-row justify-content-between">
                    <label for="" class="form-label label-form">Location</label>
                    <button class="btn" type="button">
                      <i class="fa fa-edit grey-color"></i>
                    </button>
                  </div>
                  <div class="search-input">
                    <a href="" target="_blank" hidden></a>
                    <input
                      type="text"
                      class="form-control input-control"
                      placeholder="City"
					  id="city_name"
					  name="city_name"
					  value="<?php echo $templateSettings['location'];?>"
                    />
                    <div class="autocom-box">
                      <!-- here list are inserted from javascript -->
                    </div>
                  </div>
                </div>
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button
                        class="accordion-button grey-color collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne"
                      >
                        <span class="ps-5"> Time and Date </span>
                      </button>
                    </h2>
                    <div
                      id="collapseOne"
                      class="accordion-collapse collapse"
                      aria-labelledby="headingOne"
                      data-bs-parent="#accordionExample"
                    >
                      <div class="accordion-body">
                        <button
                          type="button"
                          class="btn grey-color"
                          data-bs-toggle="modal"
                          data-bs-target="#exampleModal"
                        >
                          Time<i class="fa fa-edit ms-3"></i>
                        </button>
                        <div
                          class="modal fade"
                          id="exampleModal"
                          tabindex="-1"
                          aria-labelledby="exampleModalLabel"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                  Time
                                </h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="" class="form-label label-form"
                                      >Time</label
                                    >
                                    <input
                                      type="datetime-local"
                                      class="form-control input-control"
                                      placeholder="Air Quality"
                                      name=""
                                      id=""
                                    />
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button
                                  type="button"
                                  class="btn btn-secondary"
                                  data-bs-dismiss="modal"
                                >
                                  Close
                                </button>
                                <button type="button" class="btn btn-primary">
                                  Save changes
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button
                        class="accordion-button grey-color collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseThree"
                        aria-expanded="false"
                        aria-controls="collapseThree"
                      >
                        <span class="ps-5"> DAQI </span>
                      </button>
                    </h2>
                    <div
                      id="collapseThree"
                      class="accordion-collapse collapse"
                      aria-labelledby="headingThree"
                      data-bs-parent="#accordionExample"
                    >
                      <div class="accordion-body">
                        <strong
                          >Just Sample!</strong
                        >
                        For future reference
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <button class="fa fa-save text-primary mx-2" style="cursor:pointer;padding: 0; border: none; background: none;" id="save_btn"></button>
                  <i class="fa fa-trash text-danger mx-2"></i>
                </div>
              </form>
            </div>
            <div class="col-sm-8">
              <div class="template-canvas"  id="dynamicheight">
                <iframe
                  src="<?= base_url("/wt/".$tid); ?>"
                  style="width: 200%; height: 200%; transform: scale(0.5); transform-origin: 0 0; border-radius: 10px; background-color:#000000;"
                  frameborder="0"
                  id="display_screen"
                ></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
      crossorigin="anonymous"
    >
    </script>    <script src="<?= base_url(); ?>/assets/js/suggestions.js"></script>
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>
	<script>
	    function reset_lcd_size()
	    {
    		var div = $('#dynamicheight');
    		var height = div.width()*0.5794;//0.5625;
    		div.css('height', height);
	    }
	    reset_lcd_size();
		var mqtt;
		var reconnectTimeout = 2000;
		var host="89.40.11.42";
		var port=8883;

		function onFailure(message) {
			console.log("Connection Attempt to Host "+host+"Failed");
			console.log(message);
			setTimeout(MQTTconnect, reconnectTimeout);
		}

		function onConnect() {
			console.log("Connection Successful!");
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
			mqtt.connect(options); //connect
		}
		MQTTconnect();
		var tid = "<?php echo $tid; ?>";
		function sendUpdate(location)
		{
			console.log("Sending Location:"+location);
			message = new Paho.MQTT.Message(location);
			message.destinationName = "/signage/weather/"+tid;
			mqtt.send(message);
		}
		
		$("#weather_template_form").on("submit", function(e) {
            e.preventDefault();
            //var dataString = $(this).serialize();
            //let photo = document.getElementById("bg_image").files[0];
            var formData = new FormData(this);
            //dataString.append("bg_image", photo);
            $.ajax({
              type: "POST",
              processData: false,
              contentType: false,
              cache: false,
              url: "<?= base_url(); ?>/add_weather",
              data: formData,
              success: function (data) {
                  var location = document.getElementById('city_name').value;
                  if(tid==='none')
                  {
                      tid = data;
                      document.getElementById('tid').value = tid;
                      document.getElementById('display_screen').src = "<?= base_url(); ?>/wt/"+tid;
        		  }
        		  sendUpdate(location);
                  console.log(data);
              },
              error: function (data) {
                  console.log(data);
              }
            });
        });
        function show_hide(){
            var style = document.getElementById('bg_type').value === 'image' ? 'block' : 'none';
            document.getElementById('bg_image_div').style.display = style;
            var style = document.getElementById('bg_type').value === 'color' ? 'block' : 'none';
            document.getElementById('bg_color_div').style.display = style;
        }
        document.getElementById('bg_type').addEventListener('change', function () {
            show_hide();
        });
        show_hide();
        $(window).resize(function(){
          reset_lcd_size();
        });
	</script>
  </body>
</html>
