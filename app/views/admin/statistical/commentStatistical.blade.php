<?php
$chartData = [];
foreach ($commentStatistical as $value) {
    $chartData[] = [$value['name_film'], $value['quantity']];
}
?>
<html>

<head>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php
                // In ra dữ liệu đã được xử lý
                foreach ($chartData as $row) {
                    echo "['" . $row[0] . "'," . $row[1] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Thống Kê'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Thống Kê Bình Luận Phim</h4>
                    <!-- <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="mx-3 mt-5">
                <div id="piechart" style="width: 900px; height: 500px;"></div>
            </div>
        </div>
    </div>
</body>

</html>
@php
include "app/views/admin/footer.blade.php";
@endphp