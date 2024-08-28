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
                        <h4>Roles
                            <a href="{{ route('roles.create') }}" class="btn btn-primary float-end">Add
                                Role</a>
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

                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('givePermissions', $role->id) }}"
                                                   class="btn btn-warning">
                                                    <i class="bi bi-pencil"></i> Add / Edit Role Permission
                                                </a>
                                                <a href="{{ route('roles.edit', $role) }}"
                                                   class="btn btn-success ms-2">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="{{ route('roles.destroy', $role) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger mx-2">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
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
