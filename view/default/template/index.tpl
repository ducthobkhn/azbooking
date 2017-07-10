<div class="top-page home-page">
    <div class="container">
		<div class="row row-no-padding">
			<div class="book-ticket col-lg-8 col-md-12 col-sm-12">
				<h3 class="title-dat-ve">Đặt vé máy bay</h3>
                <form class="form" action="{SITE-NAME}/tim-kiem-chuyen-bay/" method="post">
                    <div class="fields row">
                        <div class="col-md-12 col-sm-12">
                            <input type="radio" name="RoundTrip" value="true" id="ve-khu-hoi" checked />
                            <label for="ve-khu-hoi"><span></span>Vé khứ hồi</label>
                            <input type="radio" name="RoundTrip" value="false" id="ve-mot-chieu"  />
                            <label for="ve-mot-chieu"><span></span>Vé một chiều</label>
                        </div>
                    </div>
                    <div class="row row-padding-10">
                        <div class="col-md-4 col-sm-12 chon-dia-diem">
                            <p>Điểm đi</p>
                            <input type="text" class="chuyen-bay chieu-di" id="chieu-di" value="{TFromPlace}" name="TFromPlace" />
                            <input id="hide-chieu-di" type="hidden" name="FromPlace" value="{FromPlace}"/>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <p>Điểm đến</p>
                            <input type="text" class="chuyen-bay chieu-ve" id="chieu-ve" value="{TToPlace}" name="TToPlace" />
                            <input id="hide-chieu-ve" type="hidden" name="ToPlace" value="{ToPlace}"/>
                        </div>
                        <div class="col-md-4 col-sm-12 date">
                            <div class="row row-padding-10">
                                <div class="col-md-6 col-sm-12">
                                    <p>Ngày đi</p>
                                    <input type="text" class="chuyen-bay" id="ngay-di" value="{DepartDate}" name="DepartDate" />
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <p>Ngày về</p>
                                    <input type="text" class="chuyen-bay" id="ngay-ve" value="{ReturnDate}" name="ReturnDate" />
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row row-padding-10">
                        <div class="col-md-4 col-sm-12">
                            <p>Class</p>
                            <div class="quy-danh">
                                <label>
                                    <select class="inputselect_box"  name="">
                                        <option value="Economy">Economy</option>

                                    </select>
                                </label>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <p>Người lớn (>12)</p>
                            <div>
                                <a class="sub" href="#">-</a>
                                <select class="nguoi-lon" id="nguoi-lon" name="adult">
                                    <option selected="" value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                </select>
                                <a class="sum" href="#">+</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <p>Trẻ em (2>12)</p>
                            <div>
                                <a class="sub" href="#">-</a>
                                <select class="tre-em" id="tre-em" value="0" name="child">
                                    <option selected="" value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                </select>
                                <a class="sum" href="#">+</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <p>Sơ sinh(0>2)</p>
                            <div>
                                <a class="sub" href="#">-</a>
                                <select class="so-sinh" id="so-sinh" value="0" name="infant">
                                    <option selected="" value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                </select>
                                <a class="sum" href="#">+</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row row-padding-10">
                        <div class="col-md-6 col-sm-12 tim-kiem">
                            <p><input type="submit" value="Tìm chuyến bay" name="bntTimKiem" /></p>
                        </div>
                        <div class="col-md-6 col-sm-12 logo-coarch">
                            <a href="#"><img src="{SITE-NAME}/view/default/theme/images/logo-coach.jpg" alt="" /></a>
                        </div>
                    </div>
                </form>
			</div>
			<div class="advs top-adv col-lg-4">
			   <a class="visible-lg-block" href="{link_qc}"><img src="{img_qc}" alt="{Name_qc}" title="{Name_qc}" /></a>
			</div>
		</div>
    </div>
</div>
</header>
<section class="content-area container">
<div class="cac-tieu-chi">
    <div class="row row-padding-15">
      {tieuchi}
    </div>
</div>
<div class="group-mb">
    <div class="row">
        <div class="col-md-7 col-sm-12 col-xs-12 ve-hot">
            <div class="tab-group">
                <ul>
                    <li rel="ve-noi-dia" class="active"><a href="#">Vé nội địa</a></li>
                    <li rel="ve-quoc-te"><a href="#">Vé quốc tế</a></li>
                </ul>
                <div class="ve-hot-icon"></div>
            </div>
            <div class="clearfix"></div>
            <div class="group-content">
                <table class="list-ve ve-noi-dia">
                    {venoidia_index}
                </table>
                <table class="list-ve ve-quoc-te">
                   {vequocte_index}
                </table>
            </div>
        </div>
        <div class="col-md-5 col-sm-12 col-xs-12 support box">
            <h2 class="title">Hỗ trợ đặt vé trực tuyến</h2>
            <div class="support-panel call">
                <h3>Gọi điện thoại cho MixTourist</h3>
                <div class="hotline-support">
                    <p>Hotline hỗ trợ 24/7<span>{Hotline_datve}</span></p>
                </div>
            </div>
            <div class="support-panel chat">
                <h3>Chát với đội ngũ chăm sóc của Mixtourist<span>Tư vấn hỗ trợ khách hàng về dịch vụ của Mixtourist</span></h3>
                {danhmuchotro}
            </div>
            <div class="support-panel connect-social">
                <h3>Hoặc kết nối với Mixtourist qua mạng xã hội</h3>
                <ul class="social-list">
                    <li class="facebook"><a href="http://www.facebook.com/{Face}"></a></li>
                    <li class="twitter"><a href="http://www.twitter.com/{Twitter}"></a></li>
                    <li class="googleplus"><a href="https://plus.google.com/{Google}"></a></li>
                    <li class="youtube"><a href="https://www.youtube.com/{Youtube}"></a></li>
                    <li class="linkedin"><a href="http://feeds.feedburner.com/{Feed}"></a></li>
                    <li class="kakaostory"><a href="#"></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="services-tourcouch box">
    <h2 class="title">DỊCH VỤ CỦA MixTourist</h2>
    <div class="servies-us row">
        <div class="col-md-3 col-sm-4 col-xs-12 img-thumb">
            <img src="{img_gt}" alt="Giới thiệu về Mixtourist" title="Giới thiệu về Mixtourist" />
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12 service-content">
            <h3>Giới thiệu về Mixtourist</h3>
            <p>{gioithieu}<a href="{SITE-NAME}/gioi-thieu.html">xem chi tiết »</a></p>
            <h4>Tại sao bạn nên chọn MixTourist?</h4>
            <ul class="cam-ket row">
                <li class="col-md-4 col-sm-6 col-xs-6"><a href="{SITE-NAME}/gioi-thieu.html"><i class="fa fa-usd"></i>{gia_td}</a></li>
                <li class="col-md-4 col-sm-6 col-xs-6"><a href="{SITE-NAME}/gioi-thieu.html"><i class="fa fa-check"></i>{km_td}</a></li>
                <li class="col-md-4 col-sm-6 col-xs-6"><a href="{SITE-NAME}/gioi-thieu.html"><i class="fa fa-hand-o-right"></i>{thanhtoan_td}</a></li>
                <li class="col-md-4 col-sm-6 col-xs-6"><a href="{SITE-NAME}/gioi-thieu.html"><i class="fa fa-search"></i>{tk_td}</a></li>
                <li class="col-md-4 col-sm-6 col-xs-6"><a href="{SITE-NAME}/gioi-thieu.html"><i class="fa fa-hand-o-right"></i>{dichvu_td}</a></li>
                <li class="col-md-4 col-sm-6 col-xs-6"><a href="{SITE-NAME}/gioi-thieu.html"><i class="fa fa-user"></i>{tantinh_td}</a></li>
            </ul>
        </div>
    </div>
    <div class="service-slider">
        <div class="row wow">
            <div class="owl-carousel owl-theme service-owl-carousel">
                {dichvu}
            </div>
        </div>
    </div>
</div>
<div class="khuyen-mai box">
    <h2 class="title">{tinkm_td}</h2>
    <div class="row">
        <div class="owl-carousel owl-theme khuyen-mai-slider" id="khuyen-mai-slider">
           {tinkhuyenmai}
        </div>
    </div>
</div>
<div class="thanh-toan box">
    <h2 class="title">{httt_td}</h2>
    <ul class="list-thanh-toan">
       {hinhthucthanhtoan}
    </ul>
</div>
