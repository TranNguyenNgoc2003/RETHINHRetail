@extends('layouts.app')

@section('content_app')
    <div class="about container">
        <div class="about__header">
            <h1 class="about__title">Về Chúng Tôi</h1>
            <p class="about__description">Chào mừng bạn đến với <strong>RETHINK Retail</strong> - nền tảng mua sắm thiết bị
                công nghệ hàng đầu.</p>
        </div>

        <div class="about__section">
            <div class="about__content">
                <h2 class="about__subtitle">Sứ Mệnh Của Chúng Tôi</h2>
                <p class="about__text">
                    <strong>RETHINK Retail</strong> cam kết mang đến những sản phẩm công nghệ chính hãng với mức giá tốt
                    nhất, giúp khách hàng tiếp cận các thiết bị tiên tiến một cách dễ dàng và tiện lợi.
                </p>
            </div>
            <div class="about__image">
                <img src="{{ asset('images/about-1.jpg') }}" alt="Về Chúng Tôi">
            </div>
        </div>

        <div class="about__section about__section--reverse">
            <div class="about__content">
                <h2 class="about__subtitle">Đội Ngũ Của Chúng Tôi</h2>
                <p class="about__text">
                    Với đội ngũ chuyên gia có kinh nghiệm trong ngành bán lẻ và thương mại điện tử, chúng tôi luôn đặt khách
                    hàng lên hàng đầu và không ngừng cải tiến để mang đến trải nghiệm mua sắm tốt nhất.
                </p>
            </div>
            <div class="about__image">
                <img src="{{ asset('images/about-2.jpg') }}" alt="Đội Ngũ Của Chúng Tôi">
            </div>
        </div>

        <div class="about__features">
            <h2 class="about__features-title">Tại Sao Chọn <strong>RETHINK Retail</strong>?</h2>
            <div class="about__features-list">
                <div class="about__feature">
                    <i class="fas fa-shield-alt about__feature-icon"></i>
                    <h4 class="about__feature-title">Chất Lượng Đảm Bảo</h4>
                    <p class="about__feature-text">Sản phẩm chính hãng, bảo hành đầy đủ.</p>
                </div>
                <div class="about__feature">
                    <i class="fas fa-truck about__feature-icon"></i>
                    <h4 class="about__feature-title">Giao Hàng Nhanh</h4>
                    <p class="about__feature-text">Giao hàng toàn quốc, nhanh chóng và tiện lợi.</p>
                </div>
                <div class="about__feature">
                    <i class="fas fa-headset about__feature-icon"></i>
                    <h4 class="about__feature-title">Hỗ Trợ 24/7</h4>
                    <p class="about__feature-text">Đội ngũ CSKH luôn sẵn sàng hỗ trợ bạn.</p>
                </div>
            </div>
        </div>

        <div class="about__support">
            <div class="about__map">
                <h2 class="about__map-title">Địa Chỉ Của Chúng Tôi</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805.9926931557442!2d108.20673204053433!3d16.067099349587817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142184c90c159d7%3A0x54484491e0a0be6f!2zNDU2IMSQLiBMw6ogRHXhuqlu!5e0!3m2!1svi!2s!4v1741595509090!5m2!1svi!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="about__form">
                <h2 class="about__form-title">Liên Hệ Hỗ Trợ</h2>
                <form action="{{ route('customer_service.addQuestion') }}" method="POST" class="about__form-form">
                    @csrf
                    <label for="username">Họ và Tên:</label>
                    <input type="text" id="username" name="username" required>

                    <label for="phone">Số Điện Thoại:</label>
                    <input type="text" id="phone" name="phone" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="service_name">Dịch Vụ:</label>
                    <input type="text" id="service_name" name="service_name" required>

                    <label for="note">Ghi Chú:</label>
                    <textarea id="note" name="note"></textarea>

                    <button type="submit" class="about__form-button">Gửi Yêu Cầu</button>
                </form>


            </div>
        </div>

    </div>
@endsection
