<?php
if (isset($_POST['doimatkhau'])) {
    $username = $_POST['username'];
    $pword_cu = md5($_POST['pword_cu']);
    $pword_moi = md5($_POST['pword_moi']);
    $sql = "SELECT * FROM tbl_dangky WHERE username ='" . $username . "' AND pword='" . $pword_cu . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $sql_update = mysqli_query($mysqli," UPDATE tbl_dangky SET pword='".$pword_moi."' ");
        echo '<p style="color:green">Mật khẩu đã được thay đổi <i class="bi bi-check-circle-fill text-success"></i> </p>';
    } else {
        echo '<p style="color:red">Tài khoản hoặc mật khẩu cũ không đúng, vui lòng nhập lại</p>';
    }
}
?>

<form action="" autocomplete="off" method="POST">
    <h3>Thay Đổi Mật Khẩu. </h3>
    <div class="mb-3">
        <label class="form-label">Tài Khoản</label>
        <input type="text" class="form-control" name="username" placeholder="Username..." required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mật Khẩu Cũ</label>
        <input type="password" class="form-control" name="pword_cu" placeholder="Password Cũ" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mật Khẩu Mới</label>
        <input type="password" class="form-control" name="pword_moi" placeholder="Password Mới" required>
    </div>
    <tr>
        <td><input type="submit" name="doimatkhau" class="btn btn-success" value="Đổi Mật Khẩu"></td>
    </tr>
</form>