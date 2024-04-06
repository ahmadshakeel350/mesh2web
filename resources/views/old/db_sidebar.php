    <div class="col-lg-2">
        <ul
          class="nav flex-column flex-center mt-3 pt-1 mb-4"
          style="padding-left: 2rem; border-right: 1px solid #b0b1b2"
        >
          <li class="nav-item">
            <p class="nav-link fw-4 m-0"><strong>Navigation</strong></p>
          </li>
          <li class="nav-item">
            <a class="nav-link<?php if($page==='create_template'){echo " active";} ?>" href="<?= base_url('/create_template'); ?>"
              ><i class="fa fa-edit me-2"></i>Create Template</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link<?php if($page==='templates'){echo " active";} ?>" href="<?= base_url('/my_templates'); ?>"
              ><i class="fa fa-image me-2"></i>My Templates</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link<?php if($page==='playlists'){echo " active";} ?>" href="<?= base_url('/my_playlists'); ?>"
              ><i class="fa fa-music me-2"></i>Playlists</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link<?php if($page==='screens'){echo " active";} ?>" href="<?= base_url('/my_screens'); ?>"
              ><i class="fa fa-desktop me-2"></i>Screens</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link<?php if($page==='media'){echo " active";} ?>" href="<?= base_url('/my_media'); ?>"
              ><i class="fa fa-image me-2"></i>Media</a
            >
          </li>
        </ul>
      </div>