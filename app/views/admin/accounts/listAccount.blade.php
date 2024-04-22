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
                    <tr class="table-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($listAccount as $value)
                    <tr>
                        <td style="vertical-align: middle;">{{ $value['id'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['name'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['username'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['password'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['email'] }}</td>
                        <td style="vertical-align: middle;">{{ $value['phone'] }}</td>
                        <td style="vertical-align: middle;">
                            @if($value['role'] == 0)
                            Admin
                            @elseif ($value['role'] == 1)
                            Nhân Viên
                            @else
                            Người dùng
                            @endif
                        </td>
                        <td style="vertical-align: middle;"><a href="editAccount/{{ $value['id'] }}"><button class="btn btn-primary ">Edit</button></a> | <a onclick="return confirm('Do you want to delete the account?')" href="deleteAccount/{{ $value['id'] }}"><button class="btn btn-primary ">Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="addAccount"><button class="btn btn-primary ">ADD ACCOUNT</button></a>
        </div>

    </div>
    <?= include "app/views/admin/footer.blade.php"; ?>
</div>