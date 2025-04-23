@extends('manager.layouts.management')

@section('content-manage')
    <div class="edit-product form-edit">
        <div class="form-edit__header">
            <h1 class="form-edit__title">Thông tin sản phẩm</h1>
        </div>
        <div class="card shadow form-edit__content">
            <a href="{{ route('manager.allProduct') }}" class="form-edit__back">
                <i class="fas fa-arrow-left"></i>
                Trở về
            </a>
            <form action="{{ route('manager.updateProduct', ['id' => $product->id]) }}" method="POST" class="form-edit__form">
                @csrf
                <div class="form-edit__group">
                    <label for="name_product" class="form-edit__label">Tên sản phẩm</label>
                    <input type="text" class="form-edit__input form-control" id="name_product" name="name_product"
                        value="{{ $product->name_product }}" required>
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="price" class="form-edit__label">Giá sản phẩm (VNĐ)</label>
                        <input type="text" class="form-edit__input form-control" id="price" name="price"
                            value="{{ $product->price }}" required>
                    </div>
                    <div class="form-edit__group">
                        <label for="discount" class="form-edit__label">Giảm giá (%)</label>
                        <input type="text" class="form-edit__input form-control" id="discount" name="discount"
                            value="{{ $product->discount }}">
                    </div>
                </div>
                <div class="form-edit__group" style="width: calc(95% / 2);">
                    <label for="rating" class="form-edit__label">Đánh giá</label>
                    <input type="text" class="form-edit__input form-control" id="rating" name="rating"
                        value="{{ $product->rating }}" required>
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="option_cpu" class="form-edit__label">Cấu hình CPU</label>
                        <input type="text" class="form-edit__input form-control" id="option_cpu" name="option_cpu"
                            value="{{ $product->option_cpu }}">
                    </div>
                    <div class="form-edit__group">
                        <label for="option_gpu" class="form-edit__label">Cấu hình GPU</label>
                        <input type="text" class="form-edit__input form-control" id="option_gpu" name="option_gpu"
                            value="{{ $product->option_gpu }}">
                    </div>
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="option_ram" class="form-edit__label">Dung lượng RAM</label>
                        <input type="text" class="form-edit__input form-control" id="option_ram" name="option_ram"
                            value="{{ $product->option_ram }}">
                    </div>
                    <div class="form-edit__group">
                        <label for="option_hard" class="form-edit__label">Dung lượng bộ nhớ </label>
                        <input type="text" class="form-edit__input form-control" id="option_hard" name="option_hard"
                            value="{{ $product->option_hard }}">
                    </div>
                </div>
                <div class="form-edit__group" style="margin-top: 25px;">
                    <label for="image" class="form-edit__label">Hình ảnh sản phẩm</label>
                    <div class="form-edit__image">
                        @foreach ($product->images as $image)
                            <a href="{{ route('manager.deleteImage', ['id' => $image->id]) }}" class="form-edit__link">
                                <img class="form-edit__image--img"
                                    src="{{ asset('images/Product/' . $image->path_img) }}"alt="{{ $product->name_product }}">
                                <span class="form-edit__link--delete">
                                    <i class="far fa-trash-alt"></i>
                                </span>
                            </a>
                        @endforeach
                    </div>
                    <input type="file" class="form-edit__input form-control" id="image" name="image"
                        style="margin-top: 35px;">
                </div>

                <div class="form-edit__group">
                    <label for="description" class="form-edit__label">Mô tả</label>
                    <textarea name="description" id="description" class="form-edit__input form-control" cols="30" rows="4">{{ $product->description }}</textarea>
                </div>
                <div class="form-edit__group">
                    <label for="category" class="form-edit__label">Danh mục</label>
                    <input type="text" class="form-edit__input form-control" id="category" name="category"
                        value="{{ $product->category }}">
                </div>
                <div class="form-edit__group">
                    <label for="screen_size" class="form-edit__label">Kích thước màn hình</label>
                    <input type="text" class="form-edit__input form-control" id="screen_size" name="screen_size"
                        value="{{ $product->Screen_size }}">
                </div>
                <div class="form-edit__group">
                    <label for="panel_material" class="form-edit__label">Chất liệu màn hình</label>
                    <input type="text" class="form-edit__input form-control" id="panel_material"
                        name="panel_material" value="{{ $product->Panel_material }}">
                </div>
                <div class="form-edit__group">
                    <label for="screen_resolution" class="form-edit__label">Độ phân giải màn hình</label>
                    <input type="text" class="form-edit__input form-control" id="screen_resolution"
                        name="screen_resolution" value="{{ $product->Screen_resolution }}">
                </div>
                <div class="form-edit__group">
                    <label for="screen_features" class="form-edit__label">Tính năng màn hình</label>
                    <input type="text" class="form-edit__input form-control" id="screen_features"
                        name="screen_features" value="{{ $product->Screen_features }}">
                </div>
                <div class="form-edit__group">
                    <label for="screen_ratio" class="form-edit__label">Tỉ lệ màn hình</label>
                    <input type="text" class="form-edit__input form-control" id="screen_ratio" name="screen_ratio"
                        value="{{ $product->Screen_ratio }}">
                </div>
                <div class="form-edit__group">
                    <label for="rear_camera" class="form-edit__label">Camera chính</label>
                    <input type="text" class="form-edit__input form-control" id="rear_camera" name="rear_camera"
                        value="{{ $product->Rear_camera }}">
                </div>
                <div class="form-edit__group">
                    <label for="video_recording" class="form-edit__label">Chất lượng quay video</label>
                    <input type="text" class="form-edit__input form-control" id="video_recording"
                        name="video_recording" value="{{ $product->Video_recording }}">
                </div>
                <div class="form-edit__group">
                    <label for="front_camera" class="form-edit__label">Camera trước</label>
                    <input type="text" class="form-edit__input form-control" id="front_camera" name="front_camera"
                        value="{{ $product->Front_camera }}">
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="cpu" class="form-edit__label">CPU</label>
                        <input type="text" class="form-edit__input form-control" id="cpu" name="cpu"
                            value="{{ $product->CPU }}">
                    </div>
                    <div class="form-edit__group">
                        <label for="gpu" class="form-edit__label">GPU</label>
                        <input type="text" class="form-edit__input form-control" id="gpu" name="gpu"
                            value="{{ $product->GPU }}">
                    </div>
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="ram_capacity" class="form-edit__label">Dung lượng RAM</label>
                        <input type="text" class="form-edit__input form-control" id="ram_capacity"
                            name="ram_capacity" value="{{ $product->RAM_capacity }}">
                    </div>
                    <div class="form-edit__group">
                        <label for="hard_capacity" class="form-edit__label"> Dung lượng bộ nhớ</label>
                        <input type="text" class="form-edit__input form-control" id="hard_capacity"
                            name="hard_capacity" value="{{ $product->Hard_capacity }}">
                    </div>
                </div>
                <div class="form-edit__group">
                    <label for="operating_system" class="form-edit__label">Hệ điều hành</label>
                    <input type="text" class="form-edit__input form-control" id="operating_system"
                        name="operating_system" value="{{ $product->Operating_system }}">
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="size" class="form-edit__label">Kích thước</label>
                        <input type="text" class="form-edit__input form-control" id="size" name="size"
                            value="{{ $product->Size }}">
                    </div>
                    <div class="form-edit__group">
                        <label for="weight" class="form-edit__label">Trọng lượng</label>
                        <input type="text" class="form-edit__input form-control" id="weight" name="weight"
                            value="{{ $product->Weight }}">
                    </div>
                </div>
                <div class="form-edit__group">
                    <label for="material" class="form-edit__label">Chất liệu</label>
                    <input type="text" class="form-edit__input form-control" id="material" name="material"
                        value="{{ $product->Material }}">
                </div>
                <div class="form-edit__group">
                    <label for="tech_utilities" class="form-edit__label">Công nghệ đặc biệt</label>
                    <input type="text" class="form-edit__input form-control" id="tech_utilities"
                        name="tech_utilities" value="{{ $product->Tech_Utilities }}">
                </div>
                <div class="form-edit__group">
                    <label for="sound_tech" class="form-edit__label">Công nghệ âm thanh</label>
                    <input type="text" class="form-edit__input form-control" id="sound_tech" name="sound_tech"
                        value="{{ $product->Sound_tech }}">
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="pin" class="form-edit__label">Pin</label>
                        <input type="text" class="form-edit__input form-control" id="pin" name="pin"
                            value="{{ $product->Pin }}">
                    </div>
                    <div class="form-edit__group">
                        <label for="charging_tech" class="form-edit__label">Công nghệ sạc</label>
                        <input type="text" class="form-edit__input form-control" id="charging_tech"
                            name="charging_tech" value="{{ $product->Charging_tech }}">
                    </div>
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="wifi" class="form-edit__label">WiFi</label>
                        <input type="text" class="form-edit__input form-control" id="wifi" name="wifi"
                            value="{{ $product->WiFi }}">
                    </div>
                    <div class="form-edit__group">
                        <label for="bluetooth" class="form-edit__label">Bluetooth</label>
                        <input type="text" class="form-edit__input form-control" id="bluetooth" name="bluetooth"
                            value="{{ $product->Bluetooth }}">
                    </div>
                </div>

                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="release_date" class="form-edit__label">Ngày ra mắt</label>
                        <input type="date" class="form-edit__input form-control" id="release_date"
                            name="release_date" value="{{ $product->Release_date }}">
                    </div>
                    <div class="form-edit__group">
                        <label for="producer" class="form-edit__label">Nhà sản xuất</label>
                        <input type="text" class="form-edit__input form-control" id="producer" name="producer"
                            value="{{ $product->Producer }}">
                    </div>
                </div>

                <button type="submit" class="form-edit__button btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection
