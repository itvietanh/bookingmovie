<style>
    .ticket {
        width: 600px;
        padding: 60px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin: 0 auto;
    }

    .ticket-header {
        background-color: #333;
        color: #fff;
        padding: 10px;
    }

    .movie-title {
        font-size: 20px;
        margin: 10px 0;
    }

    .ticket-details {
        font-size: 14px;
        margin: 10px 0;
    }

    .barcode {
        margin-top: 20px;
    }
</style>

<body>
    <div class="container">

        <div class="ticket">
            <div class="ticket-header">
                <h3>Vé Xem Phim</h3>
            </div>
            <div class="movie-title mt-3 mb-4">
                <strong>{{ $ticketOrder['name_film'] }}</strong>
            </div>
            <div class="row">
                <div class="col">
                    <img class="w-100" style="height: 96%;" src="{{BASE_URL}}{{ $ticketOrder['image'] }}" alt="">
                </div>

                <div class="col">

                    <div class="ticket-details " style="text-align: justify;">
                        <p>Ngày chiếu: {{ $ticketOrder['order_date'] }}</p>
                        <p>Chỗ ngồi: {{ $ticketOrder['seat_order'] }}</p>
                        <p>Khung giờ: {{ $ticketOrder['start_time'] }} - {{ $ticketOrder['end_time'] }}</p>
                        <p>Phòng chiếu: {{ $ticketOrder['name_room'] }}</p>
                        <p>Số lượng: {{ $ticketOrder['quantity'] }}</p>
                        <p>Tổng giá: {{ $ticketOrder['price'] }}</p>
                        <!-- Add more ticket details here -->
                        <div class="barcode" style=" ">
                            <!-- Add barcode image or code here -->
                            @if(!empty($ticketOrder['qr_code']))
                                <img src="" alt="">
                            @else
                            <img src="{{BASE_URL}}{{ $ticketOrder['qr_code'] }}" alt="qrcode" style="width: 50% !important;">
                            @endif
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <div class="mt-5 text-center ">
            <a onclick="printPage()" href="{{BASE_URL}}confirmTicket/{{$ticketOrder['id_order']}}">
                <input type="button" class="btn btn-primary" id="btn_confirm" style="margin: 0 0 0 0; background: #fd9351; border: none;" value="Xác nhận in vé">
            </a>
        </div>
    </div>
</body>

</html>

</html>
@php
include "app/views/admin/footer.blade.php";
@endphp

<script>
    function printPage() {
        // Sử dụng chức năng in của trình duyệt
        window.print();
    }
</script>