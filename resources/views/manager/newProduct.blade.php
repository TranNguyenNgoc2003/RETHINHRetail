@extends('manager.layouts.management')

@section('content-manage')
    <div class="edit-product form-edit">
        <div class="form-edit__header">
            <h1 class="form-edit__title">Thêm sản phẩm mới</h1>
        </div>
        <div class="card shadow form-edit__content">
            <form action="{{ route('manager.addProduct') }}" method="POST" class="form-edit__form">
                @csrf
                <div class="form-edit__group">
                    <label for="name_product" class="form-edit__label">Tên sản phẩm</label>
                    <input type="text" class="form-edit__input form-control" id="name_product" name="name_product"
                        placeholder="Nhập tên sản phẩm" required>
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="price" class="form-edit__label">Giá sản phẩm (VNĐ)</label>
                        <input type="text" class="form-edit__input form-control" id="price" name="price"
                            placeholder="Nhập giá sản phẩm" required>
                    </div>
                    <div class="form-edit__group">
                        <label for="discount" class="form-edit__label">Giảm giá (%)</label>
                        <input type="text" class="form-edit__input form-control" id="discount" name="discount"
                            placeholder="Nhập tỉ lệ giảm giá">
                    </div>
                </div>
                <div class="form-edit__group" style="width: calc(95% / 2);">
                    <label for="rating" class="form-edit__label">Đánh giá</label>
                    <input type="text" class="form-edit__input form-control" id="rating" name="rating"
                        placeholder="Nhập đánh giá" required>
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="option_cpu" class="form-edit__label">Cấu hình CPU</label>
                        <input type="text" class="form-edit__input form-control" id="option_cpu" name="option_cpu"
                            placeholder="Nhập cấu hình CPU">
                    </div>
                    <div class="form-edit__group">
                        <label for="option_gpu" class="form-edit__label">Cấu hình GPU</label>
                        <input type="text" class="form-edit__input form-control" id="option_gpu" name="option_gpu"
                            placeholder="Nhập cấu hình GPU">
                    </div>
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="option_ram" class="form-edit__label">Dung lượng RAM</label>
                        <input type="text" class="form-edit__input form-control" id="option_ram" name="option_ram"
                            placeholder="Nhập dung lượng RAM">
                    </div>
                    <div class="form-edit__group">
                        <label for="option_hard" class="form-edit__label">Dung lượng bộ nhớ </label>
                        <input type="text" class="form-edit__input form-control" id="option_hard" name="option_hard"
                            placeholder="Nhập dung lượng bộ nhớ">
                    </div>
                </div>
                <div class="form-edit__group" style="margin-top: 25px;">
                    <label for="image" class="form-edit__label">Hình ảnh sản phẩm</label>
                    <input type="file" class="form-edit__input form-control" id="image" name="image"
                        placeholder="Thêm hình ảnh" required>
                </div>
                <div class="form-edit__group">
                    <label for="description" class="form-edit__label">Mô tả</label>
                    <textarea name="description" id="description" class="form-edit__input form-control" cols="30" rows="4"
                        placeholder="Nhập mô tả"></textarea>
                </div>
                <div class="form-edit__group">
                    <label for="category" class="form-edit__label">Danh mục</label>
                    <input type="text" class="form-edit__input form-control" id="category" name="category"
                        placeholder="Nhập danh mục">
                </div>
                <div class="form-edit__group">
                    <label for="screen_size" class="form-edit__label">Kích thước màn hình</label>
                    <input type="text" class="form-edit__input form-control" id="screen_size" name="screen_size"
                        placeholder="Nhập kích thước màn hình">
                </div>
                <div class="form-edit__group">
                    <label for="panel_material" class="form-edit__label">Chất liệu màn hình</label>
                    <input type="text" class="form-edit__input form-control" id="panel_material"
                        name="panel_material" placeholder="Nhập chất liệu màn hình">
                </div>
                <div class="form-edit__group">
                    <label for="screen_resolution" class="form-edit__label">Độ phân giải màn hình</label>
                    <input type="text" class="form-edit__input form-control" id="screen_resolution"
                        name="screen_resolution" placeholder="Nhập độ phân giải màn hình">
                </div>
                <div class="form-edit__group">
                    <label for="screen_features" class="form-edit__label">Tính năng màn hình</label>
                    <input type="text" class="form-edit__input form-control" id="screen_features"
                        name="screen_features" placeholder="Nhập tính năng màn hình">
                </div>
                <div class="form-edit__group">
                    <label for="screen_ratio" class="form-edit__label">Tỉ lệ màn hình</label>
                    <input type="text" class="form-edit__input form-control" id="screen_ratio" name="screen_ratio"
                        placeholder="Nhập tỉ lệ màn hình">
                </div>
                <div class="form-edit__group">
                    <label for="rear_camera" class="form-edit__label">Camera chính</label>
                    <input type="text" class="form-edit__input form-control" id="rear_camera" name="rear_camera"
                        placeholder="Nhập chất lượng camera chính">
                </div>
                <div class="form-edit__group">
                    <label for="video_recording" class="form-edit__label">Chất lượng quay video</label>
                    <input type="text" class="form-edit__input form-control" id="video_recording"
                        name="video_recording" placeholder="Nhập chất lượng quay video">
                </div>
                <div class="form-edit__group">
                    <label for="front_camera" class="form-edit__label">Camera trước</label>
                    <input type="text" class="form-edit__input form-control" id="front_camera" name="front_camera"
                        placeholder="Nhập chất lượng camera trước">
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="cpu" class="form-edit__label">CPU</label>
                        <input type="text" class="form-edit__input form-control" id="cpu" name="cpu"
                            placeholder="Nhập cấu hình CPU">
                    </div>
                    <div class="form-edit__group">
                        <label for="gpu" class="form-edit__label">GPU</label>
                        <input type="text" class="form-edit__input form-control" id="gpu" name="gpu"
                            placeholder="Nhập cấu hình GPU">
                    </div>
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="ram_capacity" class="form-edit__label">Dung lượng RAM</label>
                        <input type="text" class="form-edit__input form-control" id="ram_capacity"
                            name="ram_capacity" placeholder="Nhập dung lượng RAM">
                    </div>
                    <div class="form-edit__group">
                        <label for="hard_capacity" class="form-edit__label"> Dung lượng bộ nhớ</label>
                        <input type="text" class="form-edit__input form-control" id="hard_capacity"
                            name="hard_capacity" placeholder="Nhập dung lượng bộ nhớ">
                    </div>
                </div>
                <div class="form-edit__group">
                    <label for="operating_system" class="form-edit__label">Hệ điều hành</label>
                    <input type="text" class="form-edit__input form-control" id="operating_system"
                        name="operating_system" placeholder="Nhập hệ điều hành">
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="size" class="form-edit__label">Kích thước</label>
                        <input type="text" class="form-edit__input form-control" id="size" name="size"
                            placeholder="Nhập kích thước sản phẩm">
                    </div>
                    <div class="form-edit__group">
                        <label for="weight" class="form-edit__label">Trọng lượng</label>
                        <input type="text" class="form-edit__input form-control" id="weight" name="weight"
                            placeholder="Nhập trọng lượng sản phẩm">
                    </div>
                </div>
                <div class="form-edit__group">
                    <label for="material" class="form-edit__label">Chất liệu</label>
                    <input type="text" class="form-edit__input form-control" id="material" name="material"
                        placeholder="Nhập chất liệu">
                </div>
                <div class="form-edit__group">
                    <label for="tech_utilities" class="form-edit__label">Công nghệ đặc biệt</label>
                    <input type="text" class="form-edit__input form-control" id="tech_utilities"
                        name="tech_utilities" placeholder="Nhập công nghệ đặc biệt">
                </div>
                <div class="form-edit__group">
                    <label for="sound_tech" class="form-edit__label">Công nghệ âm thanh</label>
                    <input type="text" class="form-edit__input form-control" id="sound_tech" name="sound_tech"
                        placeholder="Nhập công nghệ âm thanh">
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="pin" class="form-edit__label">Pin</label>
                        <input type="text" class="form-edit__input form-control" id="pin" name="pin"
                            placeholder="Nhập dung lượng pin">
                    </div>
                    <div class="form-edit__group">
                        <label for="charging_tech" class="form-edit__label">Công nghệ sạc</label>
                        <input type="text" class="form-edit__input form-control" id="charging_tech"
                            name="charging_tech" placeholder="Nhập công nghệ sạc">
                    </div>
                </div>
                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="wifi" class="form-edit__label">WiFi</label>
                        <input type="text" class="form-edit__input form-control" id="wifi" name="wifi"
                            placeholder="Nhập công nghệ WiFi">
                    </div>
                    <div class="form-edit__group">
                        <label for="bluetooth" class="form-edit__label">Bluetooth</label>
                        <input type="text" class="form-edit__input form-control" id="bluetooth" name="bluetooth"
                            placeholder="Nhập công nghệ Bluetooth">
                    </div>
                </div>

                <div class="form-edit__row">
                    <div class="form-edit__group">
                        <label for="release_date" class="form-edit__label">Ngày ra mắt</label>
                        <input type="date" class="form-edit__input form-control" id="release_date"
                            name="release_date" placeholder="Chọn ngày ra mắt">
                    </div>
                    <div class="form-edit__group">
                        <label for="producer" class="form-edit__label">Nhà sản xuất</label>
                        <input type="text" class="form-edit__input form-control" id="producer" name="producer"
                            placeholder="Nhập nhà sản xuất">
                    </div>
                </div>

                <button type="submit" class="form-edit__button btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection
