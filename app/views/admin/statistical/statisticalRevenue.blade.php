
<?php
function getDayInMonth()
{
    $arrDay = [];
    $month = date("m");
    $year = date("Y");
    for ($day = 1; $day <= 31; $day++) {
        $time = mktime("12", "0", "0", $month, $day, $year);
        if (date("m", $time) == $month) {
            $arrDay[] = date("Y-m-d", $time);
        }
    }
    return $arrDay;
}
$listDay = getDayInMonth();
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript"></script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Ngày', 'Doanh Thu Theo Ngày', {
                role: 'style'
            }],
            <?php
            foreach ($revenueStatistical as $ticket) {
                extract($ticket); ?>['<?= $order_date ?>',
                    <?php echo $doanhthu; ?>, 'color: #76A7FA'],
            <?php
            }
            ?>
        ]);

        var options = {
            title: 'Thống Kê Doanh Thu'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<body>
    <div class="container">
        <div class="col-sm-12 col-md-6">
            <form action="index.php?act=doanhthu" method="post">
                <div id="zero_config_filter" class="dataTables_filter">
                    <label>Search:
                        <input style="border: 1px solid #777;" type="text" name="kyw" class="form-control form-control-sm" placeholder="Năm - Tháng - Ngày" aria-controls="zero_config">
                    </label>
                    <!-- <select name="" id="">
                        <?php foreach ($listDay as $value) { ?>
                           <option value=""><?=$value?></option>
                           <?php
                        }?>
                        
                    </select> -->
                    <input type="submit" class="btn btn-primary" name="filter" value="Tìm kiếm">
                </div>
            </form>
        </div>
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
</body>
@php
include "app/views/admin/footer.blade.php";
@endphp