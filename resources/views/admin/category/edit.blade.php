<x-layouts.admin.main>
    <x-slot:title>
    Edit Category
    </x-slot:title>

    <div class="row">
        <div class="col-4 mx-auto">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" name="categoryName" id="categoryName" class="form-control @error('categoryName') is-invalid @enderror" value="{{ $category->name }}">
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
    @push('scripts')
    <script src="{{ asset('assets/admin') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
    @endpush
</x-layouts.admin.main>
