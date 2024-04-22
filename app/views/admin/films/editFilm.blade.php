<div class="page-wrapper">
    <div class="container-fluid">
        <form action="" method="post" class="rounded shadow-lg  g-3 p-5 mx-auto my-5" style="width: 800px;" enctype="multipart/form-data">
            <label for="" class="form-label ">Film Name</label>
            <input type="text" name="name" class="form-control" placeholder="Film name" value="{{ $film['name'] }}">
            @if(!empty($error['name']))
            <p class="mx-1 my-1" style="color: red;">{{ $error['name'] }}</p>
            @endif
            <br><br>
            <label for="" class="form-label ">Rel Date</label>
            <input type="date" name="relDate" class="form-control" disabled value="{{ $film['rel_date'] }}">
            <br><br>
            <label for="" class="form-label ">Genre</label>
            <select name="genre" class="form-select">
                <option value="0">---Lựa Chọn---</option>
                @foreach ($genre as $value)
                <option value="{{ $value['id'] }}" <?php if ($value['id'] == $film['id_genre']) echo 'selected' ?>>{{ $value['name'] }}</option>
                @endforeach
            </select>
            @if(!empty($error['genre']))
            <p class="mx-1 my-1" style="color: red;">{{ $error['genre'] }}</p>
            @endif
            <br><br>
            <label for="" class="form-label ">Image</label>
            <input type="file" name="image" class="form-control">
            @if(!empty($error['image']))
            <p class="mx-1 my-1" style="color: red;">{{ $error['image'] }}</p>
            @endif
            <br><br>
            <input type="hidden" name="id" value="{{ $film['id'] }}">
            <input type="submit" value="Update Film" name="btnSubmit" class="btn btn-primary">
            <a href="/Personal_Project/home" class="btn btn-primary ">List Film</a>
        </form>
    </div>
</div>
<?=include "app/views/admin/footer.blade.php";?>