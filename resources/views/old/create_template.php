<?php echo view('db_head'); ?>
    <body>
    <?php echo view('db_header'); ?>
    <div class="row">
      <?php 
        $data['page']='create_template';
        echo view('db_sidebar',$data);
      ?>
      <div class="col-lg-10">
        <div class="container mt-3 pt-1">
          <div class="d-flex align-items-center mb-4">
            <p class="special-text fw-4 mb-0 pe-3">choose a category</p>
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
          <div class="row mb-4">
            <div class="col-sm-4">
              <div class="temp-btn-div">
                <a href="new_text" class="btn temp-btn-styling"> Text </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="temp-btn-div">
                <a href="new_image" class="btn temp-btn-styling"> Image </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="temp-btn-div">
                <a href="new_video" class="btn temp-btn-styling"> Video </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="temp-btn-div">
                <a href="new_weather" class="btn temp-btn-styling"> Weather </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="temp-btn-div">
                <a href="new_birthday" class="btn temp-btn-styling"> Birthday </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="temp-btn-div">
                <a href="#" class="btn temp-btn-styling"> Sports </a>
              </div>
            </div>
          </div>
          <p class="special-text fw-4 mb-0 pe-3">Just added</p>
          <div class="row mb-4">
            <div class="col-sm-4">
              <div class="temp-btn-div">
                <a href="new_video" class="btn temp-btn-styling"> Video </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="temp-btn-div">
                <a href="new_weather" class="btn temp-btn-styling"> Weather </a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="temp-btn-div">
                <a href="new_birthday" class="btn temp-btn-styling"> Birthday </a>
              </div>
            </div>
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
