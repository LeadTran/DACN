<?php
  $sql_petlist = "SELECT * FROM tbl_petlist ORDER BY id DESC";
  $query_petlist = mysqli_query($mysqli,$sql_petlist) or die( mysqli_error($mysqli));
?>

<?php
  if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
    unset($_SESSION['dangky']);
  }

?>


<nav class="navbar" style="background-color: #FAE8E0;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php?tocontrol=petlist&id=1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pet list
          </a>
          <ul class="dropdown-menu" style="background-color: #DBA175;">
            <?php
            while($row_petlist = mysqli_fetch_array($query_petlist)){  
            ?>
            <li><a class="dropdown-item" href="index.php?tocontrol=petlist&id=<?php echo $row_petlist['id']?>"><?php echo $row_petlist['namepetlist']?></a></li>
            <?php
            }
            ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?tocontrol=cart">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?tocontrol=contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?tocontrol=new">New</a>
        </li>
        
        <!-- role_account -->
        <?php
        if(isset($_SESSION['dangky'])){
          if(isset($_SESSION['role_account'])){
            $role_account = $_SESSION['role_account'];
            if($role_account == 1){
              ?>
              <a class="nav-link" href="index.php?dangxuat=1">Đăng Xuất</a>
              <a class="nav-link" href="admincp/index.php">Go to AdminCP</a>
              <a class="nav-link">
                <p>Hello :
                  <?php
                  if(isset($_SESSION['dangky'])){
                      echo '<span style="color:red">'. $_SESSION['dangky'].'</span>';
                  }
                  ?>
                </p>
              </a>      
              <?php
            }else{
            ?>
            <a class="nav-link" href="index.php?dangxuat=1">Đăng Xuất</a>
            <a class="nav-link" href="index.php?tocontrol=thaydoimatkhau">Thay Đổi Mật Khẩu</a>
            <a class="nav-link">
                <p>Hello :
                  <?php
                  if(isset($_SESSION['dangky'])){
                      echo '<span style="color:red">'. $_SESSION['dangky'].'</span>';
                  }
                  ?>
                </p>
              </a> 
            <?php
            }
          }
        }else{
        ?>
        <a class="nav-link" href="index.php?tocontrol=dangky">Đăng Ký</a>
        <?php
        }   
        ?>
      </ul>
      <form class="d-flex" role="search" action="index.php?tocontrol=search" method="POST">
        <input class="form-control me-2" type="text" placeholder="Search Here" name="key_word" aria-label="Search">
        <button class="btn btn-dark" type="submit" style="background-color: #DBA175;" name="search">Search</button>
      </form>
    </div>
  </div>
</nav>