<?php
require 'config.php';
if(isset($_SESSION['login'])) {
  exit(header('Location: index.php'));
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $cek_user = mysqli_query($koneksi, "SELECT * FROM tabel_akun WHERE username = '$username'");
  $data_user = mysqli_fetch_assoc($cek_user);

  if( mysqli_num_rows($cek_user) == 0 ) {
    echo "<script>alert('Username salah!');</script>";
  } else if( !password_verify($password, $data_user['password']) ) {
    echo "<script>alert('Password Salah');</script>";

  } else {
    $_SESSION['login'] = [
      'id' => $data_user['id'],
    ];

    header('Location: index.php');
    die;
  }
}

include 'template/header.php';
?>

<div class="container pt-5">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-md-6 col-md-6">
            <div class="card-body p-1 mt-5 shadow">
              <!-- Nested Row within Card Body -->
              <div class="row justify-content-center">
                <div class="col-lg-10">
                  <div class="p-3">
                    <div class="text-center">
                      <h1 class="h4 font-weight-bold text-gray-900 mb-4">Login</h1>
                    </div>
                    <form class="user" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user font-weight-bold" name="username" placeholder="Username" required />
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user font-weight-bold mt-3" name="password" placeholder="Password" required />
                      </div>
                      <button type="submit" class="mt-4 btn btn-primary btn-user btn-block font-weight-bold shadow-sm mb-2"> Login </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

<?php include 'template/footer.php';