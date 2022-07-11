<header>
      <nav class="navbar shadow-sm navbar-expand-lg navbar-dark {{ ($title === 'Home') ? '' : 'bg-dark' }} fixed-top" id="mynav">
            <div class="container">
                  <a class="navbar-brand fw-bold" href="#">SR Semarang</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                              <!-- FOR ACTIVE NAV -->
                              <!-- "{{ Request::is('dashboard/posts') ? 'active' : '' }}" -->
                              <a class="nav-link {{ ($active === 'home') ? 'active' : '' }}"          href="/">Home</a>
                              <a class="nav-link {{ ($active === 'posts') ? 'active' : '' }}"         href="/posts">Product</a>
                              <a class="nav-link {{ ($active === 'categories') ? 'active' : '' }}"    href="/categories">Categories</a>
                              <a class="nav-link {{ ($active === 'about') ? 'active' : '' }}"         href="/about">About</a>
                        </div>
                        @auth
                              <div class="btn-group ms-auto">
                                    <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                          Welcome, {{ auth()->user()->name }}
                                    </button>
                                    <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <form action="/logout" method="post">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Logout</button>
                                          </form>
                                    </ul>
                              </div>
                        @else
                              <div class="navbar-nav ms-auto">
                                    <a class="nav-link {{ ($active === 'login') ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                              </div>
                        @endauth
                  </div>
            </div>
      </nav>
</header>

