<!-- <?=var_dump($error)?> -->
<div class="container">
    <form action="addGenre" method="post" class="rounded shadow-lg  g-3 p-5 mx-auto my-5" style="width: 800px;" enctype="multipart/form-data">
        <label for="" class="form-label ">Film Name</label>
        <input type="text" name="name" class="form-control" placeholder="Genre name"> 
        @if(!empty($error['name']))
            <p class="mx-1 my-1" style="color: red;">{{ $error['name'] }}</p>
        @endif
        <br><br>

        <input type="submit" value="Add Genre" name="btnSubmit" class="btn btn-primary">
        <a href="genreManager" class="btn btn-primary ">List Genre</a>
    </form>
</div>
@php
include "app/views/admin/footer.blade.php";
@endphp
