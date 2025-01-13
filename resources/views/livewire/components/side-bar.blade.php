<div>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        /* Sidebar styling */
        .sidebar {
            {{--  width: 250px;  --}}
            width: 15%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #212529;
            color: white;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            color: #adb5bd;
            padding: 15px;
            transition: background 0.3s ease, color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
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

        /* Content area */
        .content {
            margin-left: 15%;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        /* Toggle button */
        .toggle-btn {
            position: fixed;
            top: 20px;
            left: 15%;
            background: #212529;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 20px;
            cursor: pointer;
            z-index: 1000;
            border-radius: 0 5px 5px 0;
            transition: left 0.3s ease;
        }

        .collapsed .sidebar {
            left: -15%;
        }

        .collapsed .content {
            margin-left: 0;
        }

        .collapsed .toggle-btn {
            left: 0;
        }

        @media(max-width: 999px){
            .sidebar{
                width: 20%;
            }
            .collapsed .sidebar {
                left: -20%;
            }
            .content {
                margin-left: 20%;
            }
            .toggle-btn{
                left: 20%;
            }
        }
        @media(max-width: 700px){
            .sidebar{
                width: 25%;
            }
            .collapsed .sidebar {
                left: -25%;
            }
            .content {
                margin-left: 25%;
            }
            .toggle-btn{
                left: 25%;
            }
        }
        @media(max-width: 600px){
            .sidebar{
                width:90%;
            }
            .collapsed .sidebar {
                left: -90%;
            }
            .content {
                margin-left: 90%;
            }
            .toggle-btn{
                left: 90%;
            }
        }

        /* Responsive design */
        {{--  @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .toggle-btn {
                left: 200px;
            }

            .collapsed .sidebar {
                left: -200px;
            }

            .collapsed .toggle-btn {
                left: 0;
            }

            .content {
                margin-left: 200px;
            }
        }  --}}

        {{--  @media (max-width: 576px) {
            .sidebar {
                width: 50%;
                height: auto;
                position: static;
            }

            .content {
                margin-left: 0;
            }

            .toggle-btn {
                display: none;
            }
        }  --}}

        /* Navigation link icons */
        .nav a {
            font-size: larger;
            font-weight: bold;
        }
    </style>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">Logo</div>
        <nav class="nav flex-column">
            <a class="nav-link" href="/">
                <i class="bi bi-calendar-plus-fill"></i>
                الصفحة الرئيسية
            </a>
            <a class="nav-link" href="#buy">
                <i class="bi bi-cart-fill"></i>
                الشراء
            </a>
            <a class="nav-link" href="#sales">
                <i class="bi bi-box-arrow-in-up"></i>
                البيع
            </a>
            <a class="nav-link" href="#shipping">
                <i class="bi bi-truck"></i>
                الشحن
            </a>
            <a class="nav-link" href="#expenses">
                <i class="bi bi-wallet-fill"></i>
                الصرفيات
            </a>
            <a class="nav-link" href="#profits">
                <i class="bi bi-bar-chart-fill"></i>
                الارباح
            </a>
        </nav>
    </div>

    <!-- Toggle button -->
    <button class="toggle-btn" id="toggleSidebar">
        <i class="bi bi-arrow-bar-left"></i>
    </button>



    <script>
        const toggleBtn = document.getElementById("toggleSidebar");
      const body = document.body;
      const toggleIcon = toggleBtn.querySelector("i");

      toggleBtn.addEventListener("click", () => {
        body.classList.toggle("collapsed");

        const newIconClass = body.classList.contains("collapsed")
          ? "bi-arrow-bar-right" // عند الطي
          : "bi-arrow-bar-left"; // عند التوسيع
        toggleIcon.className = `bi ${newIconClass}`;
      });
    </script>
</div>
