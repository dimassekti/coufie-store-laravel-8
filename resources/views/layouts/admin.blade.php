<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />
  <meta
    name="description"
    content=""
  />
  <meta
    name="author"
    content=""
  />

  <title>@yield('title')</title>

  @stack('prepend-style')

  <link
    href="https://unpkg.com/aos@2.3.1/dist/aos.css"
    rel="stylesheet"
  />
  <link
    href="/style/main.css"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"
  />

  @stack('addon-style')
</head>

<body>
  <!-- dashboard -->
  <div class="page-dashboard">
    <div
      id="wrapper"
      class="d-flex"
      data-aos="fade-right"
    >
      <!-- sidebar -->
      <div
        id="sidebar-wrapper"
        class="border-right"
      >

        <div class="list-group list-group-flush">
          <div class="sidebar-heading text-center">
            <img
              src="/images/admin.png"
              alt=""
              class="my-4 w-50"
            />
          </div>
          <a
            href="{{ route('admin-dashboard') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin') ? 'active' : '' }}"
          >
            Dashboard
          </a>
          <!--  -->
          <a
            href="{{ route('product.index') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/product') ? 'active' : '' }}"
          >
            Products
          </a>
          <!--  -->
          <a
            href="{{ route('product-gallery.index') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/product-gallery') ? 'active' : '' }}"
          >
            Galleries
          </a>
          <!--  -->
          <a
            href="{{ route('category.index') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/category*') ? 'active' : '' }}"
          >
            Categories
          </a>
          <!--  -->
          <a
            href="{{ route('transaction.index') }}"
            class="list-group-item list-group-item-action"
          >
            Transactions
          </a>
          <!--  -->
          <a
            href="{{ route('user.index') }}"
            class="list-group-item list-group-item-action {{ request()->is('admin/user*') ? 'active' : '' }} "
          >
            Users
          </a>
          <!--  -->
          <a
            href="/index.html"
            class="list-group-item list-group-item-action"
          >
            Sign Out
          </a>
          <!--  -->
        </div>
      </div>

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <nav
          class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
          data-aos="fade-down"
        >
          <div class="container-fluid">
            <button
              id="menu-toggle"
              class="btn btn-secondary d-md-none mr-auto mr-2"
            >
              <!-- tulisan button di menu -->
              &laquo; Menu
            </button>
            <!--  -->
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div
              id="navbarSupportedContent"
              class="collapse navbar-collapse"
            >
              <!-- Desktop Menu -->
              <ul class="navbar-nav d-none d-lg-flex ml-auto">
                <li class="nav-item dropdown">
                  <a
                    id="navbarDropdown"
                    href="#"
                    class="nav-link"
                    role="button"
                    data-toggle="dropdown"
                  >
                    <img
                      src="/images/icon_user_pc.png"
                      alt=""
                      class="rounded-circle mr-2 profile-picture"
                    />
                    Hi, Dimas
                  </a>
                  <div class="dropdown-menu">

                    <a
                      href="/"
                      class="dropdown-item"
                    >Logout</a>
                  </div>
                </li>

              </ul>

              <!-- Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                  <a
                    href="#"
                    class="nav-link"
                  > Hi, Dimas </a>
                </li>
                <li class="nav-item">
                  <a
                    href="#"
                    class="nav-link d-inline-block"
                  > Cart </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <!-- content -->
        @yield('content')

      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  @stack('prepend-script')

  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script
    type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"
  ></script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  @stack('addon-script')

</body>

</html>
