
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=306238306156204";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-525b53f205641cd4" async="async"></script>

<div id="sign_up" style="background: url('{bg_dangnhap}'); background-size: 100%;display: none;height: 57%; margin-left: -223px; z-index: 1002; position: absolute; top: 355px; margin-top: 0px; ">


           <p style="width: 70%; font-size: 12px; height: 35px">Đăng nhập để nhận được nhiều ưu đãi cùng các chương trình
               khuyến mãi của MIXTOURIST</p>

        <div class="inputdn">
            <input type="email" id="email_dn" placeholder="Email" style="color: #555;padding: 0px 10px" name="">
            <span class="add-on"><i class="fa fa-envelope"></i></span>

            <input type="password" id="pass_dn" placeholder="Password" name="" style="color: #555;padding: 0px 10px">
            <span class="add-on2"><i class="fa fa-lock"></i></span>
            <span style="width: 120px; float: left; font-size: 12px; margin-top: 10px;  margin-right: 20px;">
              {dangky-td}
            </span>
            <input style="width: 116px; margin-right: 0px;margin-top: 10px;margin-bottom: 10px" type="submit" class="register" id="dangnha_aj" name="dangkytv" value="{dangnhap_td}">

            <p style="text-align: center; padding-top: 20px; padding-bottom: 10px">{hoac_td}</p>
            <a style="margin-right: 16px" href="{SITE-NAME}/dang-nhap-facebook/"><img src="{SITE-NAME}/view/default/theme/images/face.png" title="Facebook" alt="Facebook"></a>
            <a href=""><img src="{SITE-NAME}/view/default/theme/images/google.png" title="Google" alt="Google"></a>
        </div>

    <script>

        $(document).ready(function () {
            $("#dangnha_aj").click(function () {

            })

            $("#pass_dn").keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == "13"){
                    var email=$('#email_dn').val();
                    var pass=$('#pass_dn').val();
                    $.ajax(
                            {
                                type: "get",
                                url: "{SITE-NAME}/controller/default/dangnhap.php",
                                data:"email="+email+"&pass="+pass,
                                success: function (love) {

                                    $('.dangnhap_act').html(love)

                                }
                            }
                    )
                }
            });
        });

    </script>
<div class="dangnhap_act">

</div>


</div>

<header id="header">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-lg-4 col-sm-12">
					<marquee behavior="scroll" direction="left"><h2>Vé máy bay, đặt mua vé máy bay tại đại lý vé máy bay
                            Mixtourist cam kết giá rẻ nhất</h2></marquee>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <ul class="menu-right">
                        <li><a href="{SITE-NAME}/gioi-thieu.html"><i class="fa fa-user"></i> Về chúng tôi</a></li>
                        <li><a href="{SITE-NAME}/lien-he.html"><i class="fa fa-envelope"></i>Liên hệ </a></li>
                        <li><a href="{SITE-NAME}/hoi-dap.html"><i class="fa fa-comment"></i> Hỏi đáp</a></li>
                        <li><a href="javascript:void()" id="try-1"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                        <li><a href="http://localhost/pi_maybay/dang-ky.html"><i class="fa fa-pencil-square-o"></i> Đăng ký</a></li>
                        <script type="text/javascript" charset="utf-8">
                            $(function() {
                                function launch() {
                                    $('#sign_up').lightbox_me({centered: true, onLoad: function() { $('#sign_up').find('input:first').focus()}});
                            }

                            $('#try-1').click(function(e) {
                                $("#sign_up").lightbox_me({centered: true, preventScroll: true, onLoad: function() {
                                    $("#sign_up").find("input:first").focus();
                            }});

                            e.preventDefault();
                            });


                            $('table tr:nth-child(even)').addClass('stripe');
                            });
                        </script>


                        <div  class="hien">
                            </div>
                    </ul>
                    <div class="top-search">
                        <form action="{SITE-NAME}/tim-kiem" method="post">
                            <input type="text" class="text-search" name="giatri" value="" placeholder="Tìm kiếm..." />
                            <input type="button" class="bnt-search" value="Tìm kiếm" />
                        </form>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="top-header">
        <div class="container">
            <div class="toogle-menu">
                Menu
                <a href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <div class="logo">
                <a href="{SITE-NAME}"><img src="{logo}" alt="{ten}" title="{ten}" /> </a>
            </div>
            <div class="hot-line">
                <p>HOTLINE ĐẶT VÉ 24/7<span>043-2222-143</span></p>
            </div>
            <div class="main-menu">
                <ul>
                    <li class="{trangchu_mn}"><a href="{SITE-NAME}">Trang chủ</a></li>
                    <li class="{gioithieu_mn}"><a href="{SITE-NAME}/gioi-thieu.html">Giới thiệu</a></li>
                    <li class="{venoidia_mn}"><a href="{SITE-NAME}/ve-noi-dia/">Vé nội địa</a></li>
                    <li class="{vequocte_mn}"><a href="{SITE-NAME}/ve-quoc-te/">Vé quốc tế</a></li>
                    <li class="{dichvu_mn}"><a href="{SITE-NAME}/dich-vu/">Dịch vụ</a></li>
                    <li class="{tinkhuyenmai_mn}"><a href="{SITE-NAME}/tin-khuyen-mai/">Tin khuyến mại</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
