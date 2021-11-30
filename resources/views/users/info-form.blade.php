<form action="{{route('save-info')}}" method="GET">
    <div>
        <label for="">Họ tên</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="">Tuổi</label>
        <input type="number" name="age">
    </div>
    <div>
        <label for="">Giới tính</label>
        <input type="radio" name="gender" value="1">Nam
        <input type="radio" name="gender" value="2">Nữ
        <input type="radio" name="gender" value="3">Khác
    </div>
    <div>
        <label for="">Tình trạng hôn nhân</label>
        <input type="checkbox" name="tthn">
    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>