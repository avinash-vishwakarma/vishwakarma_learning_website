  <div class="header-area bg-theme shadow-sm" id="headerArea">
    <div class="container">
      <!-- # Header Three Layout -->
      <!-- # Copy the code from here ... -->
      <!-- Header Content -->
      <div class="header-content header-style-three position-relative d-flex align-items-center justify-content-between">

        <!-- Navbar Toggler -->
        <div class="navbar--toggler" id="affanNavbarToggler" data-bs-toggle="offcanvas" data-bs-target="#affanOffcanvas"
        aria-controls="affanOffcanvas">
          <div class="span-wrap">
            <span class="d-block"></span>
            <span class="d-block"></span>
            <span class="d-block"></span>
          </div>
        </div>

        <!-- Logo Wrapper -->
        <div class="logo-wrapper">
          <a href="home.html">
            <img src="{{ asset("/img/core-img/logo-dark.png") }}" alt="">
          </a>
        </div>

        <!-- User Profile -->
        <div class="user-profile-wrapper">
          <a class="user-profile-trigger-btn text-light" href="">
            @auth
            <img src="{{ asset("/img/user_images/".auth()->user()->profile) }}" alt="">
            @else
              <i class="bi bi-person-circle"></i>
            @endauth
          </a>
        </div>

      </div>
      <!-- # Header Three Layout End -->
    </div>
  </div>

<x-includes.slider/>