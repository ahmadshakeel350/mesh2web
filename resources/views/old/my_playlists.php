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
          <div class="d-flex align-items-center flex-wrap mb-4">
            <p class="special-text fw-4 fs-20 mb-0 pe-3">Playlist</p>
            <a href="<?= base_url('/create_playlist'); ?>">
              <div
                class="file div-1 btn btn-primary upload-btn-width-temp mx-3"
                style="border-radius: 50px"
              >
                Create Playlist
              </div>
            </a>
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
              Showing <?php echo $total; ?> of <?php echo $total; ?> playlists
            </p>
          </div>
          <div class="row mx-0">
              
            
            <?php 
                foreach ($playlists as $playlist) {
                    $templates = $playlistTemplatesModel->where('playlist_id',$playlist['id'])->limit(3)->findAll();
                    $img1="assets/img/temScs/none.png";
                    $img2="assets/img/temScs/none.png";
                    $img3="assets/img/temScs/none.png";
                    if(count($templates)>0){
                        $t3 = $myTemplates[$templates[0]['template_type'].'Templates']->find($templates[0]['template_id']);
                        $img3="assets/img/temScs/".$templates[0]['template_type']."_".$t3['bg_type'].".png";
                    }
                    if(count($templates)>1){
                        $t2 = $myTemplates[$templates[1]['template_type'].'Templates']->find($templates[1]['template_id']);
                        $img2 = "assets/img/temScs/".$templates[1]['template_type']."_".$t2['bg_type'].".png";
                    }
                    if(count($templates)>2){
                        $t1 = $myTemplates[$templates[2]['template_type'].'Templates']->find($templates[2]['template_id']);
                        $img1 = "assets/img/temScs/".$templates[2]['template_type']."_".$t1['bg_type'].".png";
                    }
            ?>
                <div class="col-sm-4 my-4">
                  <div class="card border-0">
                    <a href="<?= base_url('/my_playlist/'.$playlist['id']); ?>">
                        <div style="width: 100%; height: 200px">
                          <img
                            src="<?php echo $img1; ?>"
                            class="mb-3 first-img"
                            alt=""
                            style="border: 2px solid #555;border-radius: 15px;"
                          />
                          <img
                            src="<?php echo $img2; ?>"
                            class="mb-3 second-img"
                            alt=""
                            style="border: 2px solid #555;border-radius: 15px;"
                          />
                          <img
                            src="<?php echo $img3; ?>"
                            class="mb-3 third-img"
                            alt=""
                            style="border: 2px solid #555;border-radius: 15px;"
                          />
                        </div>
                      </a>
                    <div class="card-body mt-2">
                      <div
                        class="
                          d-flex
                          flex-row
                          justify-content-between
                          align-items-center
                        "
                      >
                        <a class="mb-1 grey-color" href="<?= base_url('/my_playlist/'.$playlist['id']); ?>"><?php echo $playlist['playlist_name']; ?></a>
                        <div class="d-flex align-items-center">
                          <img
                            src="assets/img/clock.svg"
                            class="ico-dym mb-1"
                            alt=""
                          />
                          <p class="mb-1 grey-color"><?php echo gmdate("H:i:s", $playlist['play_time']); ?></p>
                        </div>
                      </div>
                      <div class="mb-1">
                        <p class="grey-color fs-13 fw-3 mb-0">Landscape</p>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-3">
                        <img src="assets/img/copy.svg" class="ico-dym" alt="" />
                        <div class="url-link-wrapper">
                          <p class="url-text">
                            <?= base_url("/playlist/".$playlist['id']); ?>
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
                          <img
                            src="assets/img/download-ico.svg"
                            class="ico-dym"
                            alt=""
                          />
                          <a class="mb-1 grey-color" href="<?= base_url('/playlist/'.$playlist['id']); ?>" target="_blank"><img src="assets/img/eye.svg" class="ico-dym" alt="" /></a>
                          <a class="mb-1 grey-color" href="<?= base_url('/my_playlist/'.$playlist['id']); ?>"><img src="assets/img/edit.svg" class="ico-dym" alt="" /></a>
                        </div>
                        <div>
                          <img
                            src="assets/img/paper-plane.svg"
                            class="ico-dym"
                            alt=""
                          />
                          <img src="assets/img/bin.svg" class="ico-dym" alt="" />
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
