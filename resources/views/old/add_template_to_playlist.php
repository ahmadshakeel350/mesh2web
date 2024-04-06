<?php echo view('db_head'); ?>
  <body>
    <?php echo view('db_header'); ?>
    <div class="row">
      <?php 
        $data['page']='playlists';
        echo view('db_sidebar',$data);
      ?>
      <div class="col-lg-10">
        <div class="container mt-3 pt-1">
          <div class="d-flex align-items-center mb-4">
            <p class="special-text fw-4 fs-20 mb-0 pe-3">Add Template to Playlist '<strong><?php echo $playlist['playlist_name']?></strong>'</p>
            <div class="form-group">
              <select
                class="form-select input-control select-custom-width"
                aria-label="Default select example"
              >
                <option value="#" selected hidden>Filter by...</option>
                <option value="1">Weather</option>
                <option value="2">News</option>
                <option value="3">Travel</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group mb-4">
			  <label for="" class="form-label label-form">
				Duration
			  </label>
			  <input
				type="text"
				class="form-control input-control"
				placeholder="Duration in seconds"
				value="30"
				name="temp_duration"
				id="temp_duration"
			  />
            </div>
          </div>
          <div class="d-flex">
            <p class="mb-0 pe-5 text-info-top">
              Showing <?php echo $total; ?> of <?php echo $total; ?> templates
            </p>
          </div>
          <div class="row">
            <?php foreach ($textTemplates as $template) { ?>
                <div class="col-sm-4 my-4">
                  <div class="card border-0">
                    <div class="card-body">
                      <img
                        src="assets/img/temScs/text_<?php echo $template['bg_type']; ?>.png"
                        class="card-img-top mb-3"
                        alt=""
                      />
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <p class="mb-1 grey-color"><?php echo $template['template_name']; ?></p>
                      </div>
                      <div class="d-flex flex-row justify-content-center align-items-center">
                        <div>
                          <form method="POST" action="/add_template_to_playlist" id="form" onsubmit="set_duration();">
                              <input type="hidden" name="playlist_id" value="<?php echo $playlist['id']; ?>">
                              <input type="hidden" name="template_id" value="<?php echo $template['id']; ?>">
                              <input type="hidden" name="duration" class="duration" value="30">
                              <input type="hidden" name="template_type" value="text">
                              <button type="submit" style="border:0px; background-color:white;">
                                  <img
                                    src="assets/img/plus.png"
                                    class="ico-dym"
                                    alt=""
                                  />
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
            
            <?php foreach ($imageTemplates as $template) { ?>
                <div class="col-sm-4 my-4">
                  <div class="card border-0">
                    <div class="card-body">
                      <img
                        src="img/<?php echo $template['url']; ?>"
                        class="card-img-top mb-3"
                        alt=""
                      />
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <p class="mb-1 grey-color"><?php echo $template['template_name']; ?></p>
                      </div>
                      <div class="d-flex flex-row justify-content-center align-items-center">
                        <div>
                          <form method="POST" action="/add_template_to_playlist" id="form" onsubmit="set_duration();">
                              <input type="hidden" name="playlist_id" value="<?php echo $playlist['id']; ?>">
                              <input type="hidden" name="template_id" value="<?php echo $template['id']; ?>">
                              <input type="hidden" name="duration" class="duration" value="30">
                              <input type="hidden" name="template_type" value="image">
                              <button type="submit" style="border:0px; background-color:white;">
                                  <img
                                    src="assets/img/plus.png"
                                    class="ico-dym"
                                    alt=""
                                  />
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
            <?php foreach ($videoTemplates as $template) { ?>
                <div class="col-sm-4 my-4">
                  <div class="card border-0">
                    <div class="card-body">
                      <video
                        class="card-img-top mb-3"
                        alt=""
                        preload="metadata"
                        controls="none"
                      />
                        <source src="vid/<?php echo $template['url']; ?>" type="video/mp4">
                      </video>
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <p class="mb-1 grey-color"><?php echo $template['template_name']; ?></p>
                      </div>
                      <div class="d-flex flex-row justify-content-center align-items-center">
                        <div>
                          <form method="POST" action="/add_template_to_playlist" id="form" onsubmit="set_duration();">
                              <input type="hidden" name="playlist_id" value="<?php echo $playlist['id']; ?>">
                              <input type="hidden" name="template_id" value="<?php echo $template['id']; ?>">
                              <input type="hidden" name="duration" class="duration" value="30">
                              <input type="hidden" name="template_type" value="video">
                              <button type="submit" style="border:0px; background-color:white;">
                                  <img
                                    src="assets/img/plus.png"
                                    class="ico-dym"
                                    alt=""
                                  />
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
            <?php foreach ($weatherTemplates as $template) { ?>
                <div class="col-sm-4 my-4">
                  <div class="card border-0">
                    <div class="card-body">
                      <img
                        src="assets/img/temScs/weather_<?php echo $template['bg_type']; ?>.png"
                        class="card-img-top mb-3"
                        alt=""
                      />
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <p class="mb-1 grey-color"><?php echo $template['template_name']; ?></p>
                      </div>
                      <div class="d-flex flex-row justify-content-center align-items-center">
                        <div>
                          <form method="POST" action="/add_template_to_playlist" id="form" onsubmit="set_duration();">
                              <input type="hidden" name="playlist_id" value="<?php echo $playlist['id']; ?>">
                              <input type="hidden" name="template_id" value="<?php echo $template['id']; ?>">
                              <input type="hidden" name="duration" class="duration" value="30">
                              <input type="hidden" name="template_type" value="weather">
                              <button type="submit" style="border:0px; background-color:white;">
                                  <img
                                    src="assets/img/plus.png"
                                    class="ico-dym"
                                    alt=""
                                  />
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
            <?php foreach ($birthdayTemplates as $template) { ?>
                <div class="col-sm-4 my-4">
                  <div class="card border-0">
                    <div class="card-body">
                      <img
                        src="assets/img/temScs/birthday_<?php echo $template['bg_type']; ?>.png"
                        class="card-img-top mb-3"
                        alt=""
                      />
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <p class="mb-1 grey-color"><?php echo $template['template_name']; ?></p>
                      </div>
                      <div class="d-flex flex-row justify-content-center align-items-center">
                        <div>
                          <form method="POST" action="/add_template_to_playlist" id="form" onsubmit="set_duration();">
                              <input type="hidden" name="playlist_id" value="<?php echo $playlist['id']; ?>">
                              <input type="hidden" name="template_id" value="<?php echo $template['id']; ?>">
                              <input type="hidden" name="duration" class="duration" value="30">
                              <input type="hidden" name="template_type" value="birthday">
                              <button type="submit" style="border:0px; background-color:white;">
                                  <img
                                    src="assets/img/plus.png"
                                    class="ico-dym"
                                    alt=""
                                  />
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
            
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script>
        console.log("here...");
        function set_duration()
        {
            var duration = document.getElementById('temp_duration').value;
            var els = document.getElementsByClassName("duration");
                Array.prototype.forEach.call(els, function(el) {
                    el.value = duration;
                });
            return false;
        }
    </script>
  </body>
</html>
