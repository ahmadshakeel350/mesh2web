<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" />
    <title>Login</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"
          ><img src="assets/img/download.svg" class="logo" alt=""
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarScroll"
          aria-controls="navbarScroll"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
    <div class="container">
      <div
        class="row justify-content-center align-items-center"
        style="height: 80vh"
      >
        <div class="col-md-8 col-lg-5">
          <p class="special-text fs-32 mb-0">Login</p>
          <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-warning">
               <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>
          <div class="custom-card">
            <div class="card-body">
              <form action="<?php echo base_url(); ?>/loginAuth" method="post">
                <div class="form-group mb-4">
                  <label for="" class="form-label label-form">Username</label>
                  <input
                    type="username"
                    class="form-control input-control"
                    placeholder="username"
                    name="username"
                    id="username"
                  />
                </div>
                <div class="form-group mb-4">
                  <label for="" class="form-label label-form">Password</label>
                  <input
                    type="password"
                    class="form-control input-control"
                    placeholder="Password"
                    name="password"
                    id="password"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="submit"
                    class="btn btn-outline-primary"
                    value="Submit"
                  />
                </div>
              </form>
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
