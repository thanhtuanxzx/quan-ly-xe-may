<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Xe Máy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css\slidebar.css">
    <link rel="stylesheet" href="css\add_motor.css">
</head>
<body>

<div class="ad-sidebar">
        <a class="ad-index" href="list-motor"><h2>QUẢN LÝ XE MÁY</h2></a>
        <ul>
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu1', this)"><i class="fa-solid fa-motorcycle"></i> Quản lý thông tin xe</a>
                <ul class="ad-submenu" id="submenu1">
                    <li><a class="ad-mini" href="vehicle-lookup">Tra cứu xe</a></li>
                    <li><a class="ad-mini" href="add-motor">Thêm thông tin xe</a></li>
                    <li><a class="ad-mini" href="list-motor">Danh sách thông tin xe</a></li>
                </ul>
            </li>
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu2', this)"><i class="fa-solid fa-address-book"></i> Quản lý chủ xe</a>
                <ul class="ad-submenu" id="submenu2">
                    <li><a class="ad-mini" href="search-vehicle">Tra cứu chủ xe</a></li>
                    <li><a class="ad-mini" href="list-customer">Danh sách thông tin chủ xe</a></li>
                </ul>
            </li>
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu3', this)"><i class="fa-solid fa-store"></i> Quản lý giao dịch</a>
                <ul class="ad-submenu" id="submenu3">
                    <li><a class="ad-mini" href="transaction-list">Mua bán</a></li>
                    <li><a class="ad-mini" href="trade-maintenance">Bảo trì/bảo dưỡng</a></li>
                </ul>
            </li>
          
            <li><a class="ad-tager" href="statistical"><i class="fa-solid fa-chart-pie"></i> Báo cáo thống kê</a></li>
            <li><a class="ad-tager" href="contact"><i class="fa-solid fa-envelope"></i> Tư vấn khách hàng</a></li> 
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu4', this)"><i class="fa-solid fa-store"></i> Quản lý Admin</a>
                <ul class="ad-submenu" id="submenu4">
                    <li><a class="ad-mini" href="add-admin">Tạo mới tài khoản nhân viên</a></li>
                    <li><a class="ad-mini" href="list-admin">Danh sách nhân viên</a></li>
                    <!-- <li><a class="ad-mini" href="edit-admin">Chỉnh sửa thông tin </a></li> -->
                </ul>
            </li>
            <!-- <li><a class="ad-tager" href="account-admin"><i class="fa-solid fa-user"></i> Quản lý tài khoản</a></li> -->
        
            <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="ad-tager" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
            </a>
            </li>
        </ul>
    </div>

    <div class="ad-content">
        <h1 class="ad-title">Thêm Thông Tin Chủ Xe</h1>

        <div class="ad-add-vehicle-container">
            <form action="{{ route('admin.addnguoidung') }}" method="POST">
                @csrf
                <input type="hidden" id="add-name" name="id_xe" value="{{ $sanPham->id_xe }}" placeholder="Nhập họ và tên" required>
                <div class="ad-form-group">
                    <label for="add-name">Họ và tên</label>
                    <input type="text" id="add-name" name="ho_ten" placeholder="Nhập họ và tên" required>
                </div>
            
                <div class="ad-form-group">
                    <label for="add-phone">Số điện thoại</label>
                    <input type="text" id="add-phone" name="so_dien_thoai" placeholder="Nhập số điện thoại" required>
                </div>
            
                <div class="ad-form-group">
                    <label for="add-address">Địa chỉ</label>
                    <input type="text" id="add-address" name="dia_chi" placeholder="Nhập địa chỉ" required>
                </div>   
            
                <div class="ad-form-group">
                    <label for="add-cmnd">Số CMND</label>
                    <input type="text" id="add-cmnd" name="so_cmnd" placeholder="Nhập số CMND" required>
                </div>
                <div class="ad-form-group">
                    <label for="add-cmnd">Biển số</label>
                    <input type="text" id="add-cmnd" name="bien_so" placeholder="Nhập biển số" required>
                    @if ($errors->has('bien_so'))
        <span class="text-danger">{{ $errors->first('bien_so') }}</span>
    @endif
                </div>
                <div class="ad-form-group">
                    <label for="add-cmnd">Số khung</label>
                    <input type="text" id="add-cmnd" name="so_khung" placeholder="Nhập số khung" required>
                </div>
                <div class="ad-form-group">
                    <label for="add-cmnd">Số máy</label>
                    <input type="text" id="add-cmnd" name="so_may" placeholder="Nhập số máy" required>
                </div>
                
                <div class="ad-form-group">
                    <button type="submit" class="ad-btn-submit">Thêm</button>
                </div>
            </form>            
        </div>
    </div>
    
    
    <script src="js\slidebar.js"></script>
</body>
</html>