<x-admin-layout>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê danh mục sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
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
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox"
                                            name="post[]"><i></i></label>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    {{ $user->email }}
                                    <input type="hidden" name="email" value="{{$user->email}}">
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->password }}</td>
                                <td><input type="checkbox" name="author_role" {{$user->hasRole("author") ? "checked" : ""}}></td>
                                <td><input type="checkbox" name="admin_role" {{$user->hasRole("admin") ? "checked" : ""}}></td>
                                <td><input type="checkbox" name="user_role" {{$user->hasRole("user") ? "checked" : ""}}></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="/import-csv" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" accept=".xlsx"><br>
                    <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
                </form>
                <form action="/export-csv" method="POST">
                    @csrf
                    <input type="submit" value="Export CSV" name="export_csv" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
</x-admin-layout>
