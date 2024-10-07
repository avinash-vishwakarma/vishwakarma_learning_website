    <!-- Footer Nav -->
    <div class="footer-nav-area" id="footerNav">
        <div class="container px-0">
          <!-- Footer Content -->
          <div class="footer-nav position-relative footer-style-two">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
              <li class="">
                <a href="">
                  <i class="bi bi-house"></i>
                </a>
              </li>
      
              <li>
                <a href="pages.html">
                  <i class="bi bi-collection"></i>
                </a>
              </li>
      
              <li class="">
                <a href="">
                  <iconify-icon icon="carbon:ibm-watson-machine-learning" width="25"></iconify-icon>
                </a>
              </li>
      
              <li>
                <a href="chat-users.html">
                  <i class="bi bi-chat-dots"></i>
                </a>
              </li>
      
              <li class="{{ request()->routeIs("profile.show") ? "active" : "" }}">
                <a href="{{ route("profile.show") }}">
                  <i class="bi bi-person-circle"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
    </div>

