  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>Dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>DataPengguna">
          <i class="bi bi-people"></i>
          <span>Data Pengguna</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php
      if($hakAkses == 1){?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-list-task"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>MasterStatus">
              <i class="bi bi-circle"></i><span>Status</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>User">
              <i class="bi bi-circle"></i><span>User</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <?php
      }
      ?>
    </ul>
  </aside><!-- End Sidebar-->
