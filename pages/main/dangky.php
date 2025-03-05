<?php
if (isset($_POST['dangky'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $pword = md5($_POST['pword']);
    $dienthoai = $_POST['dienthoai'];
    $role_account = $_POST['role_account'];

    $role_account = 0;

    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky (username, email, diachi, pword, dienthoai, role_account)
    VALUE ('".$username."','".$email."','".$diachi."','".$pword."','".$dienthoai."','".$role_account."')");
    if ($sql_dangky) {
      
      $_SESSION['dangky'] = $username;
      $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
      echo '<p style="color:green">Bạn đã đăng ký thành công <i class="bi bi-check-circle-fill text-success"></i></p>';
        
        
      header('index.php?tocontrol=dangky');
        
    } else {
      header('index.php?tocontrol=dangky');
      echo '<p style="color:red">Đăng kí thất bại.</p>';

    }
}
?>

<form action="" method="post">
    <h3>Đăng Ký Tài Khoản.</h3>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="text" class="form-control" name="email" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Điện Thoại</label>
    <input type="text" class="form-control" name="dienthoai" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Địa Chỉ</label>
    <input type="text" class="form-control" name="diachi" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Mật khẩu</label>
    <input type="password" class="form-control" name="pword" required>
  </div>
  <input type="hidden" name="role_account" value="0">
 
  <tr>
     <td><input type="submit" name="dangky" class="btn btn-success" value="Đăng ký"></td>
     <td><a href= "index.php?tocontrol=dangnhap">Đăng Nhập Nếu Đã Có Tài Khoản.</a></td>
 </tr>
</form>