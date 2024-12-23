<?php
session_start();

if (!isset($_SESSION["login"])) {
    if (!($_SESSION["role"] === "admin")) {
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tiket Konser</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="./css/admin.css"
    />
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
  </head>
  <body>
    <!-- Side bar start -->
    <div>      
      <div class="sidebar p-4 bg-primary" id="sidebar">
        <h4 class="mb-5 text-white">Tiket Konser</h4>
        <li>
          <a class="text-white" href="admin.php">
            <i class="bi bi-house mr-2"></i>
            Dashboard
          </a>
        </li>
        <li>
          <a class="text-white" href="penjualan-tiket.php">
            <i class="bi bi-ticket mr-2"></i>
            Penjualan Tiket
          </a>
        </li>        
        <li>
          <a class="text-white" href="daftar-user.php">
            <i class="bi bi-person mr-2"></i>
            Users
          </a>
        </li>
        <li>
          <a class="text-white" href="logout.php">
            <i class="bi bi-box-arrow-in-up-right mr-2"></i>
            Logout
          </a>
        </li>
      </div>
    </div>       
    <!-- End of Side bar -->

    <!-- Start of Main Content -->
    <section class="p-4" id="main-content">
      <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
      </button>
      <div class="card mt-5">
        <div class="card-body">
          <h4>Dashboard</h4>
          <h6>
            Selamat Datang di Dashboard Tiket Konser             
          </h6>
          <p>Dasboard ini memiliki 2 halaman yang membantu admin dalam memantau dan memonitoring penjualan tiket serta daftar user yang ada di dalam website ini.</p>
        </div>
      </div>
    </section>
    <!-- End of Main Content -->



    <script>
        // event will be executed when the toggle-button is clicked
        document.getElementById("button-toggle").addEventListener("click", () => {
    
            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");
    
            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
