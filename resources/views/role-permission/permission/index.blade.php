<x-app-layout>

    @include('role-permission.nav-links')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Permissions
                            <a href="{{ route('permissions.create') }}" class="btn btn-primary float-end">Add
                                Permission</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table-bordered table-striped table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('permissions.edit', $permission) }}"
                                                   class="btn btn-success">Edit</a>
                                                <form action="{{ route('permissions.destroy', $permission) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger mx-2">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
