<div class="page-wrapper">
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    <div class="container-fluid">
        <div class="mx-3 mt-5 ">
            <table class="table shadow p-3 mb-5 bg-body-tertiary rounded table-striped text-center ">
                <thead>
                    <tr class="">
                        <th>ID</th>
                        <th>Genre</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($listGenre as $value)
                    <tr >
                            <td style="vertical-align: middle;">{{ $value['id'] }}</td>
                            <td style="vertical-align: middle;">{{ $value['name'] }}</td>
                            <!-- <td style="vertical-align: middle;"><a href="edit/{{ $value['id'] }}"><button class="btn btn-primary ">Edit</button></a> | <a onclick="return confirm('Do you want to delete the movie?')" href="delete/{{ $value['id'] }}"><button class="btn btn-primary ">Delete</button></a></td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
            <a href="addGenre"><button class="btn btn-primary ">ADD Genre</button></a>
        </div>
        <?=include "app/views/admin/footer.blade.php";?>
    </div>
</div>
