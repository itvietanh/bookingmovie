<div class="container">
    <main>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thống kê</h5>
                <div class="table-responsive">
                <div class="row">
                            <div class="col-sm-12">
                                <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Tên Phim</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Thể Loại</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($genreStatistical as $value) {
                                            extract($value); ?>
                                            <tr role="row" class="odd">
                                                <td><?php echo $filmName ?></td>
                                                <td><?php echo $genreName ?></td>
                                                <td><?php echo $quantity ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <!-- <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="zero_config_length"><label>Show <select name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div> -->
                            <div class="col-sm-12 col-md-6">
                                <!-- <form action="index.php?act=quanlyphim" method="post">
                                    <div id="zero_config_filter" class="dataTables_filter">
                                        <label>Search:
                                            <input type="text" name="kyw" class="form-control form-control-sm" placeholder="" aria-controls="zero_config">
                                        </label>
                                        <input type="submit" class="btn btn-primary" name="filer" value="Tìm kiếm">
                                    </div>
                                </form> -->
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>
@php
include "app/views/admin/footer.blade.php";
@endphp