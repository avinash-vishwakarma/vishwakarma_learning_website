  <!-- # Sidenav Left -->
  <div class="offcanvas offcanvas-start" id="affanOffcanvas" data-bs-scroll="true" tabindex="-1"
    aria-labelledby="affanOffcanvsLabel">

    <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas"
      aria-label="Close"></button>

    <div class="offcanvas-body p-0">
      <div class="sidenav-wrapper">
        <!-- Sidenav Profile -->
        <div class="sidenav-profile bg-gradient">
          <div class="sidenav-style1"></div>

          <!-- User Thumbnail -->
          <div class="user-profile">
            <img src="{{ asset("/img/user_images/".(auth()?->user()?->profile ?? "user_placeholder.png") ) }}" alt="">
          </div>

          <!-- User Info -->
          <div class="user-info">
            @auth
            <h6 class="user-name mb-0">Welcome {{ explode(' ', auth()->user()->name, 2)[0] }}</h6>
            <span>{{ auth()->user()->number }}</span>
                @else

                <h6 class="user-name mb-0">Welcome to <br/>Portable Pathshala</h6>
            @endauth

          </div>
        </div>

        <!-- Sidenav Nav -->
        <ul class="sidenav-nav ps-0">
          <li>
            <a href="{{ route("home") }}"><i class="bi bi-house-door"></i> Home</a>
          </li>
          @auth
          @else
          <li>
            <a href="{{ route("login") }}"><i class="bi bi-door-open-fill"></i> Login / Signup</a>
          </li>
          @endauth
          <li>
            <div class="night-mode-nav">
              <i class="bi bi-moon"></i> Night Mode
              <div class="form-check form-switch">
                <input class="form-check-input form-check-success" id="darkSwitch" type="checkbox">
              </div>
            </div>
          </li>
          @auth
          <x-nav.links.logout/>
          @endauth
        </ul>

        <!-- Social Info -->
        <div class="social-info-wrap">
          <a href="#">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="#">
            <i class="bi bi-twitter"></i>
          </a>
          <a href="#">
            <i class="bi bi-linkedin"></i>
          </a>
        </div>

      </div>
    </div>
  </div>