<div class="container">
    <form action="" class="rounded shadow-lg  g-3 p-5 mx-auto my-5" style="width: 800px;" method="post">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" id="" class="form-control mb-2" value="{{ isset($_POST['name']) ? $_POST['name'] : '' }}">
        @if(!empty($error['name']))
            <p style="color: red">{{ $error['name'] }}</p>
        @endif
        <br><br>
        <label for="" class="form-label">Username</label>
        <input type="text" name="username" id="" class="form-control mb-2" value="{{ isset($_POST['username']) ? $_POST['username'] : '' }}">
        @if(!empty($error['username']))
            <p style="color: red">{{ $error['username'] }}</p>
        @endif
        <br><br>
        <label for="" class="form-label">Password</label>
        <input type="text" name="password" id="" class="form-control mb-2" value="{{ isset($_POST['password']) ? $_POST['password'] : '' }}">
        @if(!empty($error['password']))
            <p style="color: red">{{ $error['password'] }}</p>
        @endif
        <br><br>
        <label for="" class="form-label">Email</label>
        <input type="text" name="email" id="" class="form-control mb-2" value="{{ isset($_POST['email']) ? $_POST['email'] : '' }}">
        @if(!empty($error['email']))
            <p style="color: red">{{ $error['email'] }}</p>
        @endif
        <br><br>
        <label for="" class="form-label">Phone</label>
        <input type="text" name="phone" id="" class="form-control mb-2" value="{{ isset($_POST['phone']) ? $_POST['phone'] : '' }}">
        @if(!empty($error['phone']))
            <p style="color: red">{{ $error['phone'] }}</p>
        @endif
        <br><br>
        <label for="" class="form-label">Role</label>
        <select name="role" class="form-select mb-2">
            <option value="luachon">--- Lựa Chọn ---</option>
            <!-- @foreach ($role as $role) -->
                <option value="{{ $role['role'] }}" <?php if(isset($_POST['role']) && $_POST['role'] == $role['role']) echo 'selected' ?>>
                    @if($role['role'] == 0)
                        {{ $role['role'] = 'Admin' }}
                    @elseif($role['role'] == 1)
                        {{ $role['role'] = 'Nhân Viên' }}
                    @else
                        {{ $role['role'] = 'Người Dùng' }}
                    @endif
                </option>
            <!-- @endforeach -->
        </select>
        @if(!empty($error['role']))
            <p style="color: red">{{ $error['role'] }}</p>
        @endif
        <br><br>
        <input type="submit" value="Add Account" name="btnSubmit" class="btn btn-primary ">
    </form>
</div>