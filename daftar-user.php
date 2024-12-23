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
        <div class="card-header bg-primary">
          <h2 class="text-center m-3 text-light">Daftar Pengguna</h2>
        </div>
        <div class="card-body my-3">          
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Role</th>
              </tr>
            </thead>
            <tbody>
            <?php
            include './database/koneksi.php';
            $sql = "SELECT * FROM user";
            $result = $koneksi->query($sql);
            $no = 1;

            if ($result->num_rows > 0) {
                         
              while ($row = $result->fetch_assoc()) {
                // Proses data atau tampilkan dalam tabel HTML                
                echo"<tr>";
                  echo"<th>".$no++."</th>";
                  echo"<td>".$row['username']."</td>";
                  echo"<td>".$row['email']."</td>";
                  echo"<td>".$row['password']."</td>";
                  echo"<td>".$row['phone']."</td>";
                  echo"<td>".$row['role']."</td>";
                echo"</tr>";                  
              }
              echo"</tbody>";
              echo"</table>";
            } else {
              echo "0 hasil";
            }

            // Menutup koneksi
            $koneksi->close();
          ?>                                
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
