@include('extras.header')
  <body>
    @include('extras.navbar')
    <div class="row">
      @include('extras.sidebar')
      <div class="col-lg-10">
        <div class="container mt-3 pt-1">
          <div class="d-flex align-items-center mb-4">
            <p class="special-text fw-4 fs-20 mb-0 pe-3">My Screens</p>
            <a href="/create_screen">
              <div
                class="file div-1 btn btn-primary upload-btn-width-temp mx-3"
                style="border-radius: 50px"
              >
                New Screen
              </div>
            </a>
          </div>
          <div class="d-flex">
            <p class="mb-0 pe-5 text-info-top">
              Showing <?php $total = 0;echo $total; ?> of <?php echo $total; ?> screens
            </p>
            <p class="mb-0 text-info-top">3.58 GB of storage space used</p>
          </div>
          <div class="row mx-0">
            <div class="col-sm-4 my-4">
              <div class="card border-primary">
                <div class="card-body">
                  <div class="position-relative">
                    <div class="mb-3 iframe-frame">
                      <img
                        src="assets/img/temScs/text_dark.png"
                        class="card-img-top"
                        alt=""
                        style="object-fit:cover; height:100%;"
                      />
                      <span class="red-light"></span>
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
                    <p class="mb-1 grey-color">Promotional poster</p>
                    <p class="mb-1 grey-color">Sep 27th</p>
                  </div>
                  <div class="mb-1">
                    <p class="grey-color fs-13 fw-3 mb-0">
                      Landscape - 3 Playlists
                    </p>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-3">
                    <img src="assets/img/copy.svg" class="ico-dym" alt="" />
                    <div class="url-link-wrapper">
                      <p class="url-text">
                        https://troudigital.com/sale-example-temple-url.html
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
                      <img src="assets/img/eye.svg" class="ico-dym" alt="" />
                      <img src="assets/img/edit.svg" class="ico-dym" alt="" />
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
          </div>
        </div>
      </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
