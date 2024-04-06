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
              <form class="mb-3" action="" id="birthday_template_form" enctype="multipart/form-data"  method="POST" autocomplete="off">
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
                    <option value="dark" <?php if($templateSettings['bg_type']=="dark") echo "selected"; ?>>Dark</option>
                    <option value="light" <?php if($templateSettings['bg_type']=="light") echo "selected"; ?>>Light</option>
                    <option value="image" <?php if($templateSettings['bg_type']=="image") echo "selected"; ?>>Custom Image</option>
                  </select>
                </div>
                <div class="form-group mb-4" id="bg_image_div" style="display: none;">
				  <label for="" class="form-label label-form">
					Background Image
				  </label><br>
				  <input type="file" id="bg_image" name="bg_image" accept="image/*">
                </div>
                <div class="form-group mb-4">
                  <div class="d-flex flex-row justify-content-between">
                    <label for="" class="form-label label-form">Text</label>
                  </div>
                  <div class="search-input">
                    <input
                      type="text"
                      class="form-control input-control"
                      placeholder="Text"
					  id="text"
					  name="text"
					  value="<?php echo $templateSettings['text'];?>"
                    />
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
                  src="<?= base_url("/tx/".$tid); ?>"
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
    </script>
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
		function sendUpdate(pname)
		{
			console.log("Sending Text Update:"+pname);
			message = new Paho.MQTT.Message(pname);
			message.destinationName = "/signage/text/"+tid;
			mqtt.send(message);
		}
		
		$("#birthday_template_form").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
              type: "POST",
              processData: false,
              contentType: false,
              cache: false,
              url: "<?= base_url(); ?>/add_text",
              data: formData,
              success: function (data) {
                  if(tid==='none')
                  {
                      tid = data;
                      document.getElementById('tid').value = tid;
                      document.getElementById('display_screen').src = "<?= base_url(); ?>/tx/"+tid;
        		  }
        		  template = document.getElementById('text').value;
        		  sendUpdate(template);
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
