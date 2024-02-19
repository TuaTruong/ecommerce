<x-admin-layout>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê danh mục sản phẩm
            </div>
            <div class="table-responsive">
                @php
                    $message = Session::get('message', null);
                    if ($message) {
                        echo "<span class='text-alert'>" . $message . '</span>';
                        Session::put('message', null);
                    }
                @endphp
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên user</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <th>Author</th>
                            <th>Admin</th>
                            <th>User</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_users as $user)
                            <form action="/assign-roles" method="POST">
                                @csrf
                                <tr>
                                    <td><label class="i-checks m-b-none"><input type="checkbox"
                                                name="post[]"><i></i></label>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{ $user->email }}
                                        <input type="hidden" name="email" value="{{ $user->email }}">
                                    </td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td><input type="checkbox" name="author_role"
                                            {{ $user->hasRole('author') ? 'checked' : '' }}></td>
                                    <td><input type="checkbox" name="admin_role"
                                            {{ $user->hasRole('admin') ? 'checked' : '' }}></td>
                                    <td><input type="checkbox" name="user_role"
                                            {{ $user->hasRole('user') ? 'checked' : '' }}></td>
                                    <td><input type="submit" value="Assign role" class="btn btn-sm btn-default"></td>
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
