<div>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background: #212529;
      color: white;
      transition: all 0.3s ease;
    }
    .sidebar .nav-link {
      color: #adb5bd;
      padding: 15px;
      transition: background 0.3s ease, color 0.3s ease;
    }
    .sidebar .nav-link:hover {
      background: #495057;
      color: white;
    }
    .sidebar .logo {
      font-size: 1.5rem;
      font-weight: bold;
      padding: 20px;
      text-align: center;
      background: #343a40;
      margin-bottom: 20px;
    }
    .content {
      margin-left: 250px;
      padding: 20px;
    }
    .toggle-btn {
      position: fixed;
      top: 20px;
      left: 260px;
      background: #212529;
      color: white;
      border: none;
      padding: 10px 15px;
      cursor: pointer;
      z-index: 1000;
      transition: left 0.3s ease;
    }
    .collapsed .sidebar {
      margin-left: -250px;
    }
    .collapsed .content {
      margin-left: 0;
    }
    .collapsed .toggle-btn {
      left: 20px;
    }
    .nav a {
    font-size: larger;
    font-weight: bold;
}
  </style>
  
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">Logo</div>
        <nav class="nav flex-column">
            <a class="nav-link " href="#home">
              <i class="bi bi-calendar-plus-fill me-2"></i>
              الصفحة الرئيسية
            </a>
            <a class="nav-link" href="#home">
              <i class="bi bi-cart-fill me-2"></i>
              الشراء
          </a>
          
          <a class="nav-link" href="#sales">
              <i class="bi bi-box-arrow-in-up me-2"></i>
              البيع
          </a>
          
          <a class="nav-link" href="#shipping">
              <i class="bi bi-truck me-2"></i>
              الشحن
          </a>
          
          <a class="nav-link" href="#expenses">
              <i class="bi bi-wallet-fill me-2"></i>
              الصرفيات
          </a>
          
          <a class="nav-link" href="#profits">
              <i class="bi bi-bar-chart-fill me-2"></i>
              الارباح
          </a>
          
          <a class="nav-link" href="#transfers">
              <i class="bi bi-arrow-up-right-square-fill me-2"></i>
              الحوالات
          </a>
          
          <a class="nav-link" href="#suppliers">
              <i class="bi bi-person-lines-fill me-2"></i>
              الموردين
          </a>
          
          <a class="nav-link" href="#traders">
              <i class="bi bi-person-circle me-2"></i>
              التجار
          </a>
          
          <a class="nav-link" href="#materials">
              <i class="bi bi-boxes me-2"></i>
              المواد
          </a>
          
          
          
            <!-- Accordion Section -->
            {{-- <div class="accordion accordion-flush" id="sidebarAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <i class="bi bi-calendar-plus-fill"></i>
                            Categories
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#sidebarAccordion">
                        <div class="accordion-body">
                            <a class="nav-link" href="#category1">Category 1</a>
                        </div>
                    </div>
                </div>
            </div> --}}

            
        </nav>
    </div>

    <!-- Toggle Button -->
    <button class="toggle-btn" id="toggleSidebar">☰</button>

    <script>
      const toggleBtn = document.getElementById('toggleSidebar');
      const body = document.body;
    
      toggleBtn.addEventListener('click', () => {
        body.classList.toggle('collapsed');
      });
    </script>

</div>


{{-- <div id="sidebar">
    <div class="flex-shrink-0 p-3" style="width: 280px;">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
          <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-5 fw-semibold">Collapsible</span>
        </a>
        <ul class="list-unstyled ps-0">
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
              Home
            </button>
            <div class="collapse" id="home-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
              Dashboard
            </button>
            <div class="collapse" id="dashboard-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Weekly</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Monthly</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Annually</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
              Orders
            </button>
            <div class="collapse" id="orders-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li>
              </ul>
            </div>
          </li>
          <li class="border-top my-3"></li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
              Account
            </button>
            <div class="collapse" id="account-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New...</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Profile</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Settings</a></li>
                <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Sign out</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>

</div> --}}
