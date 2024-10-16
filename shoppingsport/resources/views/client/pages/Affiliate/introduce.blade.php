@extends('client.layouts.master')

@section('content')
    <div class="breadcrumb w-100">
        <div class="container">
            <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="https://thanhloisport.com" style="display: inline;">
                        <span itemprop="name">
                            Trang chủ
                        </span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">
                        Giới thiệu
                    </span>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </div>
    <div class=" post_single  w-100">
        <div class="container">
            <div class="post_single__top w-100 flex">
                <div class="post_single__detail">
                    <div class="post_single__name w-100">
                        <h1 class="color_title">Giới thiệu</h1>
                    </div>
                    <div class="ck ck-reset ck-editor ck-rounded-corners" role="application" dir="ltr">
                        <div class="ck-content" id="single-content" data-title="Mục lục">
                            <h2 style="text-align: left;">GIỚI THIỆU VỀ THÀNH LỢI SPORT</h2>
                            <p>Trải qua hơn 10 năm hình thành và phát triển <strong>THÀNH LỢI SPORT</strong> hiện đang là
                                doanh nghiệp thuộc top đầu trong lĩnh vực sản xuất, nhập khẩu, phân phối thiết bị - dụng cụ
                                thể thao uy tín nhất tại Việt Nam.</p>
                            <p>Công ty có trụ sở chính tại Hà Nội và các chi nhánh tại Hồ Chí Minh với hàng trăm nhân viên
                                cùng với đội ngũ cộng tác viên đông đảo, hoạt động rộng khắp cả nước.</p>
                            <p>Với phương châm “<em><strong>Vì sức khỏe người Việt</strong></em>”, THÀNH LỢI SPORT luôn
                                hướng tới mục đích phục vụ cộng đồng, chăm sóc sức khỏe người Việt.</p>
                            <div class="text-center"><img class="wp-image-362 size-large aligncenter"
                                    src="https://thanhloisport.com/wp-content/uploads/2021/11/vi-suc-khoe-nguoi-viet-1602297566101-800x800.jpg.webp"
                                    alt="vi-suc-khoe-nguoi-viet-1602297566101-800x800" width=800 height=800 loading="lazy">
                            </div>
                            <p>THÀNH LỢI SPORT cung cấp đa dạng các thiết bị thể thao, bao gồm: Ghế massage, Máy tập chạy bộ
                                điện, Xe đạp tập, Phụ kiện tập gym, Giàn tạ thể hình, Thiết bị thể thao ngoài trời, Thiết bị
                                phục hồi chức năng, Giày - bóng<strong>,...</strong> Đặc biệt, tập trung vào các dòng sản
                                phẩm chính: <strong><em>Ghế massage, Máy chạy bộ điện, Giàn tạ, Xà đơn - xà
                                        kép,...</em></strong> Đây đều là những thiết bị chính hãng, giá cả phải chăng và
                                điều quan trọng nhất là phù hợp với đối tượng sử dụng là người Việt Nam.</p>
                            <h2>Lịch sử hình thành và phát triển</h2>
                            <h2><strong>1. Sự ra đời</strong></h2>
                            <p>★ Tháng 08/2020 <strong>THÀNH LỢI SPORT</strong> được thành lập với hoạt động bán online các
                                sản phẩm, dụng cụ thể dục thể thao uy tín - chất lượng cho người Việt.</p>
                            <p>★ Tháng 11/2021, thương hiệu <strong>THÀNH LỢI SPORT</strong> ra đời với mong muốn phát triển
                                hệ thống doanh nghiệp theo hướng công nghiệp hoá, đáp ứng nhu cầu ngày càng cao của thị
                                trường.</p>
                            <p>★ Với phương châm kinh doanh bền vững, tôn vinh những giá trị đích thực "<em><strong>vì sức
                                        khỏe</strong></em>". THÀNH LỢI SPORT luôn không ngừng nỗ lực, khẳng định là đơn vị
                                cung cấp các thiết bị thể thao chính hãng, chăm sóc sức khỏe, xứng đáng với danh hiệu
                                "<em>Người đồng hành tin cậy vì sức khỏe người Việt</em>".</p>
                            <h3><strong>2. Thương hiệu THÀNH LỢI SPORT</strong></h3>
                            <p>Với Slogan "<em><strong>Vì sức khoẻ người Việt</strong></em>", <strong>THÀNH LỢI
                                    SPORT</strong> trung thành với triết lý <strong><em>Sức khoẻ là tài sản vô
                                        giá</em></strong>, chúng tôi luôn luôn cố gắng phát triển, không ngừng đưa ra thị
                                trường những sản phẩm chất lượng, phù hợp với thể trạng, tài chính kinh tế của người Việt
                                Nam - đem lại cho người dùng những trải nghiệm an toàn, hiệu quả và đẳng cấp nhất.</p>
                            <h2><strong>Tầm Nhìn Sứ Mệnh</strong></h2>
                            <h3><b>Sứ mệnh</b></h3>
                            <p><strong>THÀNH LỢI SPORT </strong>mong muốn là trở thành người chăm sóc sức khỏe số 1, hướng
                                đến mục tiêu vì một dân tộc Việt khỏe mạnh và phát triển.</p>
                            <h3><strong>Tầm nhìn</strong></h3>
                            <p>- Trở thành đơn vị thuộc Top đầu trên thị trường sản xuất - phân phối dụng cụ thiết bị thể
                                dục thể thao.</p>
                            <p>- Mong muốn mở rộng thị trường, hợp tác cùng phát triển với các nhà phân phối, đại lý kinh
                                doanh.</p>
                            <p>- Xây dựng văn hóa văn hóa doanh nghiệp lành mạnh, môi trường chuyên nghiệp, tạo điều kiện
                                phát triển tốt nhất cho toàn bộ nhân viên.</p>
                            <h3><strong>Giá trị cốt lõi</strong></h3>
                            <p><img class="size-full wp-image-353 aligncenter"
                                    src="https://thanhloisport.com/wp-content/uploads/2021/11/gia-tri-cot-loi-1602295725809.png.webp"
                                    alt="gia-tri-cot-loi-1602295725809" width=391 height=552 loading="lazy"></p>
                            <p>- <strong>Trung thực</strong>: Trung thực với khách hàng, trung thực với bản thân, trung thực
                                trong mỗi sản phẩm - dịch vụ.</p>
                            <p>- <strong>Chất lượng</strong>: THÀNH LỢI SPORT chỉ cung cấp các sản phẩm chất lượng, đảm bảo
                                an toàn, nâng cao sức khỏe người tiêu dùng.</p>
                            <p>- <strong>Uy tín</strong>: THÀNH LỢI SPORT cam kết thực hiện nghiêm túc mọi ưu đãi đã công bố
                                với khách hàng, mọi khuyến mãi cho đại lý, mọi chế độ đã báo tới nhân viên.</p>
                            <p>- <strong>Khách hàng là trọng tâm</strong>: Lấy khách hàng là mục tiêu của sự phát triển, dựa
                                trên cơ sở cung cấp sản phẩm và dịch vụ phù hợp với khách hàng. Coi sức khỏe của khách hàng
                                là mục đích tồn tại và phát triển của doanh nghiệp.</p>
                            <p>- <strong>Phát triển nhân lực</strong>: Chia sẻ cơ hội, tạo điều kiện thuận lợi để nhân viên
                                trong công ty được học tập và phát triển, hoàn thiện kỹ năng sống.</p>
                            <p>- <strong>Không ngừng học hỏi</strong>: cải tiến kĩ thuật, nâng cao chất lượng sản phẩm -
                                dịch vụ, không ngừng nỗ lực vươn xa.</p>
                            <h2>Hoạt động kinh doanh</h2>
                            <p class="text-center"><img class="size-full wp-image-358 aligncenter"
                                    src="https://thanhloisport.com/wp-content/uploads/2021/11/nganh-hang.jpg.webp"
                                    alt="nganh-hang" width=600 height=403 loading="lazy"></p>
                            <p><em><strong>Chuyên cung cấp:</strong></em></p>
                            <p>+ Sản phẩm chăm sóc sức khỏe: Ghế massage, Thiết bị phục hồi chức năng,...</p>
                            <p>+ Dụng cụ thể thao cho gia đình - phòng tập: Máy chạy bộ điện, Xe đạp tập, Giàn tạ tập thể
                                hình, Phụ kiện thể thao,...</p>
                            <p>+ Thiết bị thể thao ngoài trời cho: trường học, khu dân cư, công viên; khuôn viên gia đình,
                                resort.</p>
                            <p>"<em><strong>Chất lượng đảm bảo</strong></em>" là tôn chỉ kinh doanh của THÀNH LỢI SPORT</p>
                            <p>✦ Các sản phẩm mang thương hiệu “THÀNH LỢI SPORT” đều được người tiêu dùng yêu chuộng và tin
                                tưởng vì có xuất xứ, nguồn gốc rõ ràng, chất lượng uy tín.</p>
                            <p>✦ Sản phẩm mang phong cách hiện đại, trẻ trung năng động nhưng vẫn luôn giữ được tiêu chí đem
                                lại cảm hứng hoạt động thể thao, cải thiện vóc dáng và sức khoẻ người dùng.</p>
                            <p>✦ Vật liệu sử dụng an toàn, quy trình sản xuất khắt khe theo tiêu chuẩn nghiêm ngặt, nguồn
                                hàng được nhập trực tiếp từ những nhà sản xuất uy tín trong và ngoài nước. Được kiểm duyệt
                                kỹ càng đảm bảo hàng chính hãng, chất lượng với mức giá hợp lý nhất.</p>
                        </div>
                    </div>
                </div>
                <div class="post_single__sitebar">
                    <div class="sidebar">
                        <aside class="widget widget-text">
                            <div class="widget-content">
                                <div class="right_subcribe">
                                    <p class="color_title mb-15">THÀNH LỢI SPORT</p>
                                    <span class="fs-14"> THÀNH LỢI SPORT chuyên nhập khẩu, phân phối, bán buôn, bán lẻ dụng
                                        cụ thể dục, thể thao và thể hình uy tín nhất tại Việt Nam. </span>
                                    <div class="right_subcribe__connect flex">Hotline: 0862.525.296</div>
                                    <div class="right_subcribe__connect flex">Địa chỉ: 16/38 Phố Đỗ Xuân Hợp, Phường Mỹ Đình
                                        1, Quận Nam Từ Liêm, Hà Nội</div>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget widget-blog">
                            <p class="widget-title">Bài viết mới nhất</p>
                            <div class="widget-content">
                                <div class="widget-blog__item flex-left">
                                    <div class="thumnail">
                                        <a href="https://thanhloisport.com/ghe-tap-bung-ghe-gap-bung-la-gi-gia-bao-nhieu-mua-o-dau"
                                            aria-label="Ghế tập bụng, ghế gập bụng là gì? Giá bao nhiêu? Mua ở đâu?">
                                            <img loading="lazy"
                                                src="https://thanhloisport.com/thumbnails/posts/tiny/wp-content/uploads/2022/11/ghe-tap-bung-03.jpg.webp"
                                                alt="ghe-tap-bung-03"
                                                title="Ghế tập bụng, ghế gập bụng là gì? Giá bao nhiêu? Mua ở đâu?" width=80
                                                height=80>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="content-title"><a class="title_box color_head"
                                                aria-label="Ghế tập bụng, ghế gập bụng là gì? Giá bao nhiêu? Mua ở đâu?"
                                                href="https://thanhloisport.com/ghe-tap-bung-ghe-gap-bung-la-gi-gia-bao-nhieu-mua-o-dau">Ghế
                                                tập bụng, ghế gập bụng là gì? Giá bao nhiêu? Mua ở đâu?</a></p>
                                        <p class="content-date"> <span
                                                class="fs-14 color_desc text-up date">27/12/2022</span></p>
                                    </div>
                                </div>
                                <div class="widget-blog__item flex-left">
                                    <div class="thumnail">
                                        <a href="https://thanhloisport.com/ta-tay-ta-don-la-gi-cac-loai-ta-tap-the-hinh"
                                            aria-label="Tạ tay tạ đơn là gì? Các loại tạ tập thể hình? Nên mua tạ tập ở đâu?">
                                            <img loading="lazy"
                                                src="https://thanhloisport.com/thumbnails/posts/tiny/wp-content/uploads/2022/11/tay-tay-ta-don-01.jpeg.webp"
                                                alt="tay-tay-ta-don-01"
                                                title="Tạ tay tạ đơn là gì? Các loại tạ tập thể hình? Nên mua tạ tập ở đâu?"
                                                width=80 height=80>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="content-title"><a class="title_box color_head"
                                                aria-label="Tạ tay tạ đơn là gì? Các loại tạ tập thể hình? Nên mua tạ tập ở đâu?"
                                                href="https://thanhloisport.com/ta-tay-ta-don-la-gi-cac-loai-ta-tap-the-hinh">Tạ
                                                tay tạ đơn là gì? Các loại tạ tập thể hình? Nên mua tạ tập ở đâu?</a></p>
                                        <p class="content-date"> <span
                                                class="fs-14 color_desc text-up date">27/12/2022</span></p>
                                    </div>
                                </div>
                                <div class="widget-blog__item flex-left">
                                    <div class="thumnail">
                                        <a href="https://thanhloisport.com/cuoc-vot-cau-long-la-gi"
                                            aria-label="Cước vợt cầu lông là gì? Nên đặt mua cước cầu lông ở đâu?">
                                            <img loading="lazy"
                                                src="https://thanhloisport.com/thumbnails/posts/tiny/wp-content/uploads/2022/11/cuoc-vot-cau-long-03.jpeg.webp"
                                                alt="cuoc-vot-cau-long-03"
                                                title="Cước vợt cầu lông là gì? Nên đặt mua cước cầu lông ở đâu?" width=80
                                                height=80>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="content-title"><a class="title_box color_head"
                                                aria-label="Cước vợt cầu lông là gì? Nên đặt mua cước cầu lông ở đâu?"
                                                href="https://thanhloisport.com/cuoc-vot-cau-long-la-gi">Cước vợt cầu lông
                                                là gì? Nên đặt mua cước cầu lông ở đâu?</a></p>
                                        <p class="content-date"> <span
                                                class="fs-14 color_desc text-up date">27/12/2022</span></p>
                                    </div>
                                </div>
                                <div class="widget-blog__item flex-left">
                                    <div class="thumnail">
                                        <a href="https://thanhloisport.com/luoi-cau-long-la-gi-gia-bao-nhieu"
                                            aria-label="Lưới cầu lông là gì? giá bao nhiêu? Mua lưới chơi cầu lông ở đâu?">
                                            <img loading="lazy"
                                                src="https://thanhloisport.com/thumbnails/posts/tiny/wp-content/uploads/2022/11/luoi-cau-long-01.jpg.webp"
                                                alt="luoi-cau-long-01"
                                                title="Lưới cầu lông là gì? giá bao nhiêu? Mua lưới chơi cầu lông ở đâu?"
                                                width=80 height=80>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="content-title"><a class="title_box color_head"
                                                aria-label="Lưới cầu lông là gì? giá bao nhiêu? Mua lưới chơi cầu lông ở đâu?"
                                                href="https://thanhloisport.com/luoi-cau-long-la-gi-gia-bao-nhieu">Lưới cầu
                                                lông là gì? giá bao nhiêu? Mua lưới chơi cầu lông ở đâu?</a></p>
                                        <p class="content-date"> <span
                                                class="fs-14 color_desc text-up date">27/12/2022</span></p>
                                    </div>
                                </div>
                                <div class="widget-blog__item flex-left">
                                    <div class="thumnail">
                                        <a href="https://thanhloisport.com/giay-cau-long-la-gi"
                                            aria-label="Giày cầu lông là gì? Mua giày chơi cầu lông chính hãng ở đâu?">
                                            <img loading="lazy"
                                                src="https://thanhloisport.com/thumbnails/posts/tiny/wp-content/uploads/2022/11/giay-cau-long-03.jpeg.webp"
                                                alt="giay-cau-long-03"
                                                title="Giày cầu lông là gì? Mua giày chơi cầu lông chính hãng ở đâu?"
                                                width=80 height=80>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="content-title"><a class="title_box color_head"
                                                aria-label="Giày cầu lông là gì? Mua giày chơi cầu lông chính hãng ở đâu?"
                                                href="https://thanhloisport.com/giay-cau-long-la-gi">Giày cầu lông là gì?
                                                Mua giày chơi cầu lông chính hãng ở đâu?</a></p>
                                        <p class="content-date"> <span
                                                class="fs-14 color_desc text-up date">27/12/2022</span></p>
                                    </div>
                                </div>
                            </div>
                        </aside>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .post_single__detail {
            border-right: 1px solid var(--color_border);
            padding-right: 20px;
            width: 75%;
        }

        .post_single__name {
            margin-bottom: 20px;
        }

        .post_single__name h1 {
            font-size: 50px;
        }

        .post_single__sitebar {
            padding-bottom: 30px;
            padding-left: 20px;
            width: 25%;
        }

        @media (max-width: 768px) {
            .post_single__detail {
                border-right: none;
                padding-right: 0;
                width: 100%;
            }
            .post_single__sitebar{
                width: 100%;
            }
        }
    </style>
@endpush
