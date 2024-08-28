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
                        <h4>Role {{ $role->name }}
                            <a href="{{ route('roles.index') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('givePermissions.store', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">

                                @error('permissions')
                                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                    </div>
                                @enderror

                                <label for="">Permissions</label>

                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-2">
                                            <label class="form-check-label">
                                                <input
                                                       type="checkbox"
                                                       name="permissions[]"
                                                       value="{{ $permission->name }}"
                                                       {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                                       class="form-check-input" />
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
