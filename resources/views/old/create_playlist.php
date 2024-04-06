<?php echo view('db_head'); ?>
    <body>
    <?php echo view('db_header'); ?>
    <div class="row">
      <?php 
        $data['page']='playlists';
        echo view('db_sidebar',$data);
      ?>
      <div class="col-lg-10 mt-4">
        <div class="container">
          <div class="d-flex align-items-center flex-wrap mb-4">
            <p class="special-text fw-4 fs-20 mb-0 pe-3">Create Playlist</p>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <form class="mb-3" action="add_playlist"  method="POST">
                <div class="form-group mb-4">
				  <label for="" class="form-label label-form">
					Playlist Name
				  </label>
				  <input
					type="text"
					class="form-control input-control"
					placeholder="Playlist Name"
					value=""
					name="pname"
				  />
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <button class="fa fa-save text-primary mx-2" style="cursor:pointer; padding: 0; border: none; background: none;" type="submit"></button>
                </div>
              </form>
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
  </body>
</html>
