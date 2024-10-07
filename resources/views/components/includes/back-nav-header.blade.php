@props(['title'])

<!-- Header Area-->
  <div class="header-area bg-theme" id="headerArea">
    <div class="container">
      <!-- Header Content-->
      <div class="header-content header-style-three position-relative d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button ">
            <a href="{{ url()->previous() }}" class="text-light">
              <i class="bi bi-arrow-left-short"></i>
            </a>
        </div>

        <!-- Page Title-->
        <div class="page-heading text-light">
            <h6 class="mb-0 text-light">{{ $title }}</h6>
        </div>

        <!-- Navbar Toggler -->
        <div class="navbar--toggler" id="affanNavbarToggler" data-bs-toggle="offcanvas" data-bs-target="#affanOffcanvas"
        aria-controls="affanOffcanvas">
          <div class="span-wrap">
            <span class="d-block"></span>
            <span class="d-block"></span>
            <span class="d-block"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

<x-includes.slider/>
