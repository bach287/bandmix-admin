<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('css/css.css')}}">
    <link rel="stylesheet" type="text/css" href="{{'css/loginCss.css'}}">
    @stack('header')
</head>
<body onload="setBold()">
<div id="menu" data-page="home"></div>
<section class="container-fluid">
    <header class="container-fluid head fixed-top">
        <nav class="navbar  navbar-expand-sm navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand" href="#">BANDMIX</a>
            <!-- Links -->
            <div class="collapse navbar-collapse" id="nav-content">
                <ul class="navbar-nav">
                    <li class="">
                        <a class="nav-link active " href="index.html">TRANG CHỦ</a>
                    </li>
                    <li class="">
                        <a class="nav-link " href="band.html">BAN NHẠC</a>
                    </li>
                    <li class="">
                        <a class="nav-link " href="event.html">SỰ KIỆN</a>
                    </li>
                    <li class="">
                        <a class="nav-link " href="news.html">TIN TỨC</a>
                    </li>
                    <li class="">
                        <a class="nav-link " href="aboutus.html">GIỚI THIỆU</a>
                    </li>
                    <li class="">
                        <div class="search-container">
                            <div class="input-group md-form form-sm form-1 pl-0">
                                <input class="form-control my-0 py-1" type="text" placeholder="Tìm kiếm" aria-label="Search">
                                <div class="input-group-prepend">
										<span class="input-group-text cyan lighten-2" id="basic-text1"><img src="images/icon/iconsearch.png" style="height: 20px">
										</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 main-nav">

                    <a class="nav-link signin " href="#0">Đăng nhập</a>
                    <a class="nav-link signup " href="#0">Đăng Ký</a>
                </form>
            </div>
        </nav>
    </header>
    <section class="body">
        <!-- indicators -->
        <div id="carouselExampleIndicators" class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>

            <!-- carousel content -->
            <div class="carousel-inner">
                <!-- first slide -->
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/slide/slide1.jpg" alt="First slide">
                    <div class="carousel-caption d-md-block">
                        <h3 data-animation="animated bounceInLeft">
                            Đẳng Cấp - Chuyên Nghiệp
                        </h3>
                        <button class="btn btn-primary" data-animation="animated zoomInUp">Button</button>
                    </div>
                </div>

                <!-- second slide -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/slide/slide2.jpg" alt="Second slide">
                    <div class="carousel-caption d-md-block">
                        <h3 data-animation="animated bounceInRight">
                            Nhanh Chóng - Tiện Lợi
                        </h3>
                        <button class="btn btn-primary" data-animation="animated zoomInUp">Button</button>
                    </div>
                    <!-- second slide content -->
                </div>

                <!-- third slide -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/slide/slide3.jpg" alt="Third slide">
                    <div class="carousel-caption d-md-block">
                        <h3 data-animation="animated bounceInDown">
                            Uy Tín - Trách Nhiệm
                        </h3>
                        <button class="btn btn-primary" data-animation="animated zoomInUp">Button</button>
                    </div>
                    <!-- third slide content -->
                </div>
            </div>

            <!-- controls -->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Đăng nhập -->
        <div class="user-modal">
            <div class="user-modal-container">
                <ul class="switcher">
                    <li><a href="#0">Đăng nhập</a></li>
                    <li><a href="#0">Tạo Tài Khoản</a></li>
                </ul>

                <div id="login">
                    <form class="form">
                        <p class="fieldset">
                            <label class="image-replace email" for="signin-email">E-mail</label>
                            <input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
                            <span class="error-message">Tài khoản không tồn tại !</span>
                        </p>

                        <p class="fieldset">
                            <label class="image-replace password" for="signin-password">Password</label>
                            <input class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="Mật khẩu">
                            <a href="#0" class="hide-password">Hiện</a>
                            <span class="error-message">Mật khẩu không chính xác!</span>
                        </p>

                        <p class="fieldset">
                            <input type="checkbox" id="remember-me" checked>
                            <label for="remember-me">Ghi nhớ</label>
                        </p>

                        <p class="fieldset">
                            <input class="full-width" type="submit" value="Đăng nhập">
                        </p>
                    </form>

                    <p class="form-bottom-message"><a href="#0">Quên mật khẩu?</a></p>
                    <!-- <a href="#0" class="close-form">Close</a> -->
                </div>

                <div id="signup">
                    <form class="form">
                        <p class="fieldset">
                            <label class="image-replace username" for="signup-username">Họ và tên đệm:</label>
                            <input class="full-width has-padding has-border" id="signup-firstname" type="text" placeholder="Họ và tên đệm">
                        </p>
                        <p class="fieldset">
                            <label class="image-replace username" for="signup-username">Tên:</label>
                            <input class="full-width has-padding has-border" id="signup-name" type="text" placeholder="Tên">
                        </p>
                        <p class="fieldset">
                            <label class="image-replace username" for="signup-username">Giới tính:</label>
                            <select class="full-width has-padding has-border" id="signup-gender">
                                <option value="0">
                                    Giới tính
                                </option>
                                <option value="1">
                                    Nam
                                </option>
                                <option value="2">
                                    Nữ
                                </option>
                                <option value="3">
                                    Khác
                                </option>
                            </select>
                        </p>
                        <p class="fieldset">
                            <label class="image-replace username" for="signup-username">Ngày sinh</label>
                            <input class="full-width has-padding has-border" id="signup-dateofbirth" type="date" placeholder="Ngày sinh">
                        </p>
                        <p class="fieldset">
                            <label class="image-replace email" for="signup-email">E-mail</label>
                            <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
                            <span class="error-message">Hãy nhập địa chỉ email hợp lệ! </span>
                        </p>
                        <p class="fieldset">
                            <label class="image-replace username" for="signup-username">Số điện thoại</label>
                            <input class="full-width has-padding has-border" id="signup-dateofbirth" type="number" placeholder="Số điện thoại">
                        </p>
                        <p class="fieldset">
                            <label class="image-replace username" for="signup-username">Tài Khoản</label>
                            <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Tài khoản">
                            <span class="error-message">Tên người dùng của bạn chỉ có thể chứa các ký hiệu số và chữ cái!</span>
                        </p>

                        <p class="fieldset">
                            <label class="image-replace password" for="signup-password">Mật khẩu</label>
                            <input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Mật khẩu">
                            <a href="#0" class="hide-password">Hiện</a>
                            <span class="error-message">Mật khẩu của bạn phải dài ít nhất 6 ký tự!</span>
                        </p>
                        <p class="fieldset">
                            <label class="image-replace password" for="signup-password"> Nhập Lại Mật khẩu</label>
                            <input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Nhập Lại Mật khẩu">
                            <a href="#0" class="hide-password">Hiện</a>
                            <span class="error-message">Mật khẩu bạn nhập lại chưa đúng!</span>
                        </p>

                        <p class="fieldset">
                            <input type="checkbox" id="accept-terms">
                            <label for="accept-terms"> Đồng ý với  <a class="accept-terms" href="#0">Điều khoản</a></label>
                        </p>

                        <p class="fieldset">
                            <input class="full-width has-padding" type="submit" value="Tạo tài khoản">
                        </p>
                    </form>

                    <!-- <a href="#0" class="cd-close-form">Close</a> -->
                </div>

                <div id="reset-password">
                    <p class="form-message">Quên mật khẩu? Vui lòng nhập địa chỉ email của bạn.
                        </br>
                        Bạn sẽ nhận được một liên kết để tạo mật khẩu mới.
                    </p>

                    <form class="form">
                        <p class="fieldset">
                            <label class="image-replace email" for="reset-email">E-mail</label>
                            <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                            <span class="error-message">Tài khoản không tồn tại!</span>
                        </p>

                        <p class="fieldset">
                            <input class="full-width has-padding" type="submit" value="Gửi yêu cầu">
                        </p>
                    </form>

                    <p class="form-bottom-message">
                        <a href="#0">Quay lại trang đăng nhập
                        </a>
                    </p>
                </div>
                <a href="#0" class="close-form">Đóng</a>
            </div>
        </div>
    </section>
</section>
</section>
<!-- new -->
@yield('content')
<!-- footer -->

<footer class="page-footer font-small stylish-color-dark pt-4">
    <!-- Social buttons -->
    <section class="footer page-footer font-small special-color-dark pt-4">

        <!-- Footer Elements -->
        <div class="container-fluid">

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a class="btn-floating btn-fb mx-1">
                        <i class="fa fa-facebook"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-tw mx-1">
                        <i class="fa fa-twitter"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1">
                        <i class="fa fa-google-plus"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-li mx-1">
                        <i class="fa fa-linkedin"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-dribbble mx-1">
                        <i class="fa fa-dribbble"> </i>
                    </a>
                </li>
            </ul>
            <!-- Social buttons -->
        </div>
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="https://mdbootstrap.com/bootstrap-tutorial/"> BandMix.com</a>
        </div>
        <!-- Copyright -->
    </section>
    <!-- Footer -->
</footer>
<script type="text/javascript" src="bootstrap/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
</body>
</html>