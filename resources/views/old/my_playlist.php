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
            <p class="special-text fw-4 fs-20 mb-0 pe-3">My Playlist:<strong><?php echo $playlist['playlist_name'];?></strong></p>
            <form action="<?= base_url('/add_to_playlist'); ?>" method="POST">
                <input type="hidden" name="playlist_id" value="<?php echo $playlist['id'];?>">
                <button type="submit" style="border:0px; background-color:#ffffff00;">
                    <div
                      class="file div-1 btn btn-primary upload-btn-width-temp mx-3"
                      style="border-radius: 50px"
                    >
                            Add Template to Playlist
                    </div>
                </button>
            </form>
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
          <div class="d-flex">
            <p class="mb-0 pe-5 text-info-top">
              Showing <?php echo $total; ?> of <?php echo $total; ?> templates
            </p>
          </div>
          <div class="row">
              
              
            <?php
                $shorts = array(
                    "text"=>"tx",
                    "image"=>"img",
                    "video"=>"vid",
                    "weather"=>"wt",
                    "birthday"=>"bd"
                    );
                foreach ($templates as $template) {
                    $thisTemplate=$myTemplates[$template['template_type'].'Templates']->find($template['template_id']);
            ?>
                <div class="col-sm-4 my-4">
                  <div class="card border-0">
                    <div class="card-body">
                        <?php if(in_array($template['template_type'], array("text","weather","birthday"))){ ?>
                      <img
                        src="../assets/img/temScs/<?php echo $template['template_type']; ?>_<?php echo $thisTemplate['bg_type']; ?>.png"
                        class="card-img-top mb-3"
                        alt=""
                      />
                      <?php }else if($template['template_type']==="video"){ ?>
                      <video
                        class="card-img-top mb-3"
                        alt=""
                        preload="metadata"
                        controls="none"
                      />
                        <source src="../vid/<?php echo $thisTemplate['url']; ?>" type="video/mp4">
                      </video>
                      <?php } else if($template['template_type']==="image"){ ?>
                      
                      <img
                        src="../img/<?php echo $thisTemplate['url']; ?>"
                        class="card-img-top mb-3"
                        alt=""
                      />
                      <?php } ?>
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <p class="mb-1 grey-color"><?php echo $thisTemplate['template_name']; ?></p>
                        <div class="d-flex align-items-center">
                          <img
                            src="../assets/img/clock.svg"
                            class="ico-dym mb-1"
                            alt=""
                          />
                          <p class="mb-1 grey-color"><?php echo gmdate("H:i:s", $template['duration']);?></p>
                        </div>
                      </div>
                      <div class="mb-1">
                        <p class="grey-color fs-13 fw-3 mb-0">Landscape</p>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-3">
                        <img src="../assets/img/copy.svg" class="ico-dym" alt="" />
                        <div class="url-link-wrapper">
                          <p class="url-text">
                            <?= base_url($shorts[$template['template_type']].'/'.$thisTemplate['id']); ?>
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
                        </div>
                        <div>
                          <img src="../assets/img/bin.svg" class="ico-dym" alt="" />
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
  </body>
</html>
