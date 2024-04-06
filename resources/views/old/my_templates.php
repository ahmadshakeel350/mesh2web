<?php echo view('db_head'); ?>
  <body style="overflow-x:hidden;">
    <?php echo view('db_header'); ?>
    <div class="row">
      <?php 
        $data['page']='templates';
        echo view('db_sidebar',$data);
      ?>
      <div class="col-lg-10">
        <div class="container mt-3 pt-1">
          <div class="d-flex align-items-center mb-4">
            <p class="special-text fw-4 fs-20 mb-0 pe-3">My Templates</p>
            <a href="<?= base_url('/create_template'); ?>">
                <div
                  class="file div-1 btn btn-primary upload-btn-width-temp mx-3"
                  style="border-radius: 50px"
                >
                  Create new template
                </div>
            </a>
            <div class="form-group">
              <select
                class="form-select input-control select-custom-width"
                aria-label="Default select example"
              >
                <option value="#" selected hidden>Filter by...</option>
                <option value="all">All</option>
                <option value="text">Text</option>
                <option value="image">Image</option>
                <option value="video">Video</option>
                <option value="weather">Weather</option>
                <option value="birthday">Birthday</option>
              </select>
            </div>
          </div>
          <div class="d-flex">
            <p class="mb-0 pe-5 text-info-top">
              Showing <?php echo $total; ?> of <?php echo $total; ?> templates
            </p>
          </div>
          <?php if($textCount>0){ ?>
          <br>
          <div class="d-flex">
            <p class="mb-0 pe-5 text-info-top">
                Text Templates
            </p>
          </div>
          <hr class="solid">
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
                        <div class="d-flex align-items-center">
                          <img
                            src="assets/img/clock.svg"
                            class="ico-dym mb-1"
                            alt=""
                          />
                          <p class="mb-1 grey-color">00:30</p>
                        </div>
                      </div>
                      <div class="mb-1">
                        <p class="grey-color fs-13 fw-3 mb-0">Landscape</p>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-3">
                        <img src="assets/img/copy.svg" class="ico-dym" alt="" />
                        <div class="url-link-wrapper">
                          <p class="url-text">
                            <?= base_url('tx/'.$template['id']); ?>
                          </p>
                        </div>
                      </div>
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <div>
                          <a href="#"><img src="assets/img/download-ico.svg" class="ico-dym" alt=""/></a>
                          <a href="<?= base_url('tx/'.$template['id']); ?>" target="_blank"><img src="assets/img/eye.svg" class="ico-dym" alt="" /></a>
                          <a href="<?= base_url('edit_text/'.$template['id']); ?>"><img src="assets/img/edit.svg" class="ico-dym" alt="" /></a>
                        </div>
                        <div>
                          <img src="assets/img/paper-plane.svg" class="ico-dym" alt="" />
                          <a href="<?= base_url('delete_text/'.$template['id']); ?>"><img src="assets/img/bin.svg" class="ico-dym" alt="" /></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
          </div>
          <?php 
            }if($imageCount>0){ 
          ?>
          <br>
          <div class="d-flex">
            <p class="mb-0 pe-5 text-info-top">
                Image Templates
            </p>
          </div>
          <hr class="solid">
          <div class="row">
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
                        <div class="d-flex align-items-center">
                          <img
                            src="assets/img/clock.svg"
                            class="ico-dym mb-1"
                            alt=""
                          />
                          <p class="mb-1 grey-color">00:30</p>
                        </div>
                      </div>
                      <div class="mb-1">
                        <p class="grey-color fs-13 fw-3 mb-0">Landscape</p>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-3">
                        <img src="assets/img/copy.svg" class="ico-dym" alt="" />
                        <div class="url-link-wrapper">
                          <p class="url-text">
                            <?= base_url('img/'.$template['id']); ?>
                          </p>
                        </div>
                      </div>
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <div>
                          <a href="#"><img src="assets/img/download-ico.svg" class="ico-dym" alt=""/></a>
                          <a href="<?= base_url('img/'.$template['id']); ?>" target="_blank"><img src="assets/img/eye.svg" class="ico-dym" alt="" /></a>
                          <a href="<?= base_url('edit_image/'.$template['id']); ?>"><img src="assets/img/edit.svg" class="ico-dym" alt="" /></a>
                        </div>
                        <div>
                          <img
                            src="assets/img/paper-plane.svg"
                            class="ico-dym"
                            alt=""
                          />
                          <a href="<?= base_url('delete_image/'.$template['id']); ?>"><img src="assets/img/bin.svg" class="ico-dym" alt="" /></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
          </div>
          <?php 
            }if($videoCount>0){ 
          ?>
          <br>
          <div class="d-flex">
            <p class="mb-0 pe-5 text-info-top">
                Video Templates
            </p>
          </div>
          <hr class="solid">
          <div class="row">
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
                        <div class="d-flex align-items-center">
                          <img
                            src="assets/img/clock.svg"
                            class="ico-dym mb-1"
                            alt=""
                          />
                          <p class="mb-1 grey-color">00:30</p>
                        </div>
                      </div>
                      <div class="mb-1">
                        <p class="grey-color fs-13 fw-3 mb-0">Landscape</p>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-3">
                        <img src="assets/img/copy.svg" class="ico-dym" alt="" />
                        <div class="url-link-wrapper">
                          <p class="url-text">
                            <?= base_url('vid/'.$template['id']); ?>
                          </p>
                        </div>
                      </div>
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <div>
                          <a href="#"><img src="assets/img/download-ico.svg" class="ico-dym" alt=""/></a>
                          <a href="<?= base_url('vid/'.$template['id']); ?>" target="_blank"><img src="assets/img/eye.svg" class="ico-dym" alt="" /></a>
                          <a href="<?= base_url('edit_video/'.$template['id']); ?>"><img src="assets/img/edit.svg" class="ico-dym" alt="" /></a>
                        </div>
                        <div>
                          <img
                            src="assets/img/paper-plane.svg"
                            class="ico-dym"
                            alt=""
                          />
                          <a href="<?= base_url('delete_video/'.$template['id']); ?>"><img src="assets/img/bin.svg" class="ico-dym" alt="" /></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
          </div>
          <?php 
            }if($weatherCount>0){ 
          ?>
          <br>
          <div class="d-flex">
            <p class="mb-0 pe-5 text-info-top">
                Weather Templates
            </p>
          </div>
          <hr class="solid">
          <div class="row">
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
                        <div class="d-flex align-items-center">
                          <img
                            src="assets/img/clock.svg"
                            class="ico-dym mb-1"
                            alt=""
                          />
                          <p class="mb-1 grey-color">00:30</p>
                        </div>
                      </div>
                      <div class="mb-1">
                        <p class="grey-color fs-13 fw-3 mb-0">Landscape</p>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-3">
                        <img src="assets/img/copy.svg" class="ico-dym" alt="" />
                        <div class="url-link-wrapper">
                          <p class="url-text">
                            <?= base_url('wt/'.$template['id']); ?>
                          </p>
                        </div>
                      </div>
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <div>
                          <a href="#"><img src="assets/img/download-ico.svg" class="ico-dym" alt=""/></a>
                          <a href="<?= base_url('wt/'.$template['id']); ?>" target="_blank"><img src="assets/img/eye.svg" class="ico-dym" alt="" /></a>
                          <a href="<?= base_url('edit_weather/'.$template['id']); ?>"><img src="assets/img/edit.svg" class="ico-dym" alt="" /></a>
                        </div>
                        <div>
                          <img
                            src="assets/img/paper-plane.svg"
                            class="ico-dym"
                            alt=""
                          />
                          <a href="<?= base_url('delete_weather/'.$template['id']); ?>"><img src="assets/img/bin.svg" class="ico-dym" alt="" /></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            
            <?php } ?>
          </div>
          <?php 
            }if($birthdayCount>0){ 
          ?>
          <br>
          <div class="d-flex">
            <p class="mb-0 pe-5 text-info-top">
                Birthday Templates
            </p>
          </div>
          <hr class="solid">
          <div class="row">
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
                        <div class="d-flex align-items-center">
                          <img
                            src="assets/img/clock.svg"
                            class="ico-dym mb-1"
                            alt=""
                          />
                          <p class="mb-1 grey-color">00:30</p>
                        </div>
                      </div>
                      <div class="mb-1">
                        <p class="grey-color fs-13 fw-3 mb-0">Landscape</p>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-3">
                        <img src="assets/img/copy.svg" class="ico-dym" alt="" />
                        <div class="url-link-wrapper">
                          <p class="url-text">
                            <?= base_url('bd/'.$template['id']); ?>
                          </p>
                        </div>
                      </div>
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <div>
                          <a href="#"><img src="assets/img/download-ico.svg" class="ico-dym" alt=""/></a>
                          <a href="<?= base_url('bd/'.$template['id']); ?>" target="_blank"><img src="assets/img/eye.svg" class="ico-dym" alt="" /></a>
                          <a href="<?= base_url('edit_birthday/'.$template['id']); ?>"><img src="assets/img/edit.svg" class="ico-dym" alt="" /></a>
                        </div>
                        <div>
                          <img
                            src="assets/img/paper-plane.svg"
                            class="ico-dym"
                            alt=""
                          />
                          <a href="<?= base_url('delete_birthday/'.$template['id']); ?>"><img src="assets/img/bin.svg" class="ico-dym" alt="" /></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
          </div>
          <?php 
            } 
          ?>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
