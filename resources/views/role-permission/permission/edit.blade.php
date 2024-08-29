<x-app-layout>

    @include('role-permission.nav-links')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Edit Permission
                            <a href="{{ route('permissions.index') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('permissions.update', $permission) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="">Permission Name</label>
                                <input type="text" name="name" class="form-control"
                                       value="{{ old('name', $permission->name) }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
