<?php
if(isset($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $pword = md5($_POST['pword']);
    $sql = "SELECT * FROM tbl_dangky WHERE username='" . $username . "' AND pword='" . $pword . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $row_data = mysqli_fetch_array($row);

        $_SESSION['dangky'] = $row_data['username'];
        $_SESSION['id_username'] = $row_data['id_dangky'];
        $_SESSION['role_account'] = $row_data['role_account'];
        header("Location: index.php");
        
    } else {
        echo '<p style="color:red">wrong password or email</p>';
    }
}
?>

<form action="" autocomplete="off" method="POST">
    <h3>Đăng Nhập Khách Hàng</h3>
    <div class="mb-3">
        <label class="form-label">Tài Khoản</label>
        <input type="text" class="form-control" name="username" placeholder="Username..." required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mật Khẩu</label>
        <input type="password" class="form-control" name="pword" placeholder="Password..." required>
    </div>
    <tr>
        <td><input type="submit" name="dangnhap" class="btn btn-success" value="Đăng Nhập"></td>
    </tr>
    <td><a href= "index.php?tocontrol=dangky">Đăng ký nếu chưa có tài khoản.</a></td>
</form>