<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Date -->
    <span id="current-date" class="fs-4 lh-0 slide-right"></span>
    <!-- /Date -->

  <ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- Place this tag where you want the button to render. -->

      <!-- User -->
      @auth
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <span class="fw-semibold d-block">Connectis</span>
                  <small class="text-muted">Admin</small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <i class="bx bx-user me-2"></i>
              <span class="align-middle">My Profile</span>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href=" {{ route('logout') }}">
              <i class="bx bx-power-off me-2"></i>
              <span class="align-middle">Log Out</span>
            </a>
          </li>
        </ul>
      </li>
      @else
      <!-- Jika belum login, tampilkan link login
      <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">
              <i class="bx bx-log-in me-2"></i>
              <span class="align-middle">Log In</span>
          </a>
      </li> -->
      @endauth
      <!--/ User -->
    </ul>
  </div>
</nav>
<!-- / Navbar -->

<style>
  @keyframes slideLeft {
    0% {
      transform: translateX(0);
    }
    50% {
      transform: translateX(100%);
    }
    100% {
      transform: translateX(0%);
    } 
  }

  @keyframes slideRight {
    0% {
      transform: translateX(0);
    }
    50% {
      transform: translateX(100%);
    }
    100% {
      transform: translateX(0%);
    }
  }

  #current-date {
    animation: slideLeft 2s linear infinite;
  }

  .slide-right {
    animation: slideRight 2s linear infinite;
  }
</style>
<script>
  // Update current date
  function updateCurrentDate() {
    var currentDate = new Date();
    var options = { year: 'numeric', month: 'long', day: 'numeric' };
    var formattedDate = currentDate.toLocaleDateString('en-US', options);
    document.getElementById('current-date').textContent = formattedDate;
  }

  // Update date every second
  setInterval(updateCurrentDate, 10000); // Update every 10 seconds

  // Initial call to display date
  updateCurrentDate();

  // Change animation direction every 10 seconds
  setInterval(function() {
    var currentDateElement = document.getElementById('current-date');
    if (currentDateElement.classList.contains('slide-right')) {
      currentDateElement.classList.remove('slide-right');
      currentDateElement.style.animation = 'slideLeft 2s linear infinite';
    } else {
      currentDateElement.classList.add('slide-right');
      currentDateElement.style.animation = 'slideRight 2s linear infinite';
    }
  }, 10000); // Change direction every 10 seconds
</script>