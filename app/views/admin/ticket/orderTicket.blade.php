<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ml-auto text-right">
                    <form action="" method="post" class="d-flex">
                        <input type="search" placeholder="Tìm Mã Vé" name="kyw" class="form-control mr-3">
                        <input type="submit" value="Search" name="btnSearch" class="btn btn-primary ">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="float-right">
            <button class="btn btn-danger " onclick="exportToExcel()">Export Excel <i class="fa-solid fa-file-export"></i></button>
        </div>
        <div class="mx-3 mt-5 ">
            <table class="table shadow p-3 mb-5 bg-body-tertiary rounded table-striped text-center ">
                <thead>
                    <tr class="">
                        <th style="vertical-align: middle;">Tên Người Dùng</th>
                        <th style="vertical-align: middle;">Tên Phim</th>
                        <th style="vertical-align: middle;">Phòng Chiếu</th>
                        <th style="vertical-align: middle;">Rạp Chiếu</th>
                        <th style="vertical-align: middle;">Ngày Chiếu</th>
                        <th style="vertical-align: middle;">Khung Giờ Chiếu</th>
                        <th style="vertical-align: middle;">Ghế Ngồi</th>
                        <th style="vertical-align: middle;">Ngày Đặt</th>
                        <th style="vertical-align: middle;">Số Lượng Vé</th>
                        <th style="vertical-align: middle;">Trạng Thái</th>
                        <th style="vertical-align: middle;">Mã vé</th>
                        <th style="vertical-align: middle;">Tổng Giá</th>
                        <th style="vertical-align: middle;">Thao Tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orderTicket as $value)
                    <tr>
                        <td style="vertical-align: middle;">{{ $value['username'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['name_film'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['name_room'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['name_cinema'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['order_date'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['start_time'] }} - {{ $value['end_time'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['seat_order'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['order_date'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['quantity'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['status'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['order_id'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['price'] }}</td>
                        <td style="line-height: 93px;">
                            @if($value['status'] == "Chờ thanh toán")
                                <a onclick="return confirm('Bạn có muốn thanh toán vé này không?')" href="confirmPayment/{{ $value['id_order'] }}"><input type="button" class="btn btn-primary" id="btn_confirm" style="width: 150px;" value="Xác nhận thanh toán"></a>
                            @elseif($value['status'] == "Đã thanh toán")
                                <a onclick="return confirm('Bạn có muốn in vé này không?')" href="printTicket/{{ $value['id_order'] }}"><input type="button" class="btn btn-primary" id="btn_confirm" style="width: 150px; background: #fd9351; border: none;" value="Xác nhận in vé"></a>
                            @else
                                
                            @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="addFilm"><button class="btn btn-primary ">ADD TICKET</button></a>
        </div>
    </div>

</div>

<script>
    function exportToExcel() {
        window.location.href = 'export';
    }
</script>

<?= include "app/views/admin/footer.blade.php"; ?>