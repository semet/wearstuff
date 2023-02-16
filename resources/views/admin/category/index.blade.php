<x-layouts.admin.main>
    <x-slot:title>
    Categories
    </x-slot:title>

    <div class="row">
        <div class="col-8">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="customer_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Product Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->products_count }} [products]</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-success btn-sm" title="view">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" title="delete" onclick="deleteCategory('{{ $category->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" name="categoryName" id="categoryName" class="form-control @error('categoryName') is-invalid @enderror">
                            @error('categoryName')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label for="thumbnail">Thumbnail</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
                                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                                </div>
                            </div>
                            @error('thumbnail')
                            <div class="text-danger text-xs mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('styles')

    @endpush
    @push('scripts')
    <script src="{{ asset('assets/admin') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
        //
        function deleteCategory (category) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        location.href = route('admin.category.delete', category)
                    }
                })
        }
    </script>
    @endpush
</x-layouts.admin.main>
