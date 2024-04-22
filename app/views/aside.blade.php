<div class="col-lg-3 col-sm-10  mt-50 mt-lg-0">
    <div class="widget widget-search">
        <h5 class="title">tìm kiếm</h5>
        <form class="search-form" action="index.php?act=movie" method="post">
            <input type="text" name="kyw" placeholder="Tìm kiếm phim" required>
            <input type="submit" value="Tìm kiếm" name="btn-search" class="btn_search"><i class="flaticon-loupe"></i>
        </form>
    </div>
    <div class="widget-1 widget-trending-search">
        <h3 class="title">Thể Loại</h3>
        <div class="widget-1-body">
            <ul>
                <?php 
                if (isset($listGenre)) {
                foreach ($listGenre as $value) {
                    extract($value); ?>
                    <li>
                        <h6 class="sub-title">
                            <a href="index.php?act=film_by_genre&id=<?php echo $id ?>"><?php echo $name ?></a>
                        </h6>
                    </li>
                <?php
                }}?>


            </ul>
        </div>
    </div>
</div>