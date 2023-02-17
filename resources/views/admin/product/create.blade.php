<x-layouts.admin.main>
    <x-slot:title>
    Create Product
    </x-slot:title>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Input data product</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="POST" class="row">
                        @csrf
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="productCategory">Category <span class="text-danger">*</span></label>
                                        <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" id="productCategory">
                                            <option value="" selected>--Select ategory--</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="productSku">SKU <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="productSku" placeholder="S K U">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="productName">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="productName" placeholder="Product Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="productPrice">Price (IDR/Rp) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="productPrice" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="productWeight">Weight (Gr) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" id="productWeight" placeholder="Weight">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="productQuantity">Quantity (Pcs) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="productQuantity" placeholder="Quantity">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="productSize">Size</label>
                                        <select class="custom-select" name="size" id="productSize">
                                            <option value="" selected>--Select Size--</option>
                                            @foreach (\App\Enums\SizeEnum::cases() as $size)
                                            <option value="{{ $size->value }}">{{ $size->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="productGender">Gender</label>
                                        <select class="custom-select" name="gender" id="productGender">
                                            <option value="" selected>--Select Gender--</option>
                                            @foreach (\App\Enums\GenderEnum::cases() as $gender)
                                            <option value="{{ $gender->value }}">{{ $gender->value }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="overview">Overview <span class="text-danger">*</span> <span class="text-muted text-sm">(Short overview of the product)</span></label>
                                @error('oveerview') <span class="text-danger ml-4">Please</span> @enderror
                                <textarea class="summernote" name="overview" id="overview"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Description <span class="text-danger">*</span> <span class="text-muted test-sm">(Full description of the product)</span></label>
                                <textarea class="summernote" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="additionalInfo">Additional Info</label>
                                <textarea class="summernote" name="additionalInfo" id="additionalInfo"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ingredients">Ingredients</label>
                                <textarea class="summernote" name="ingredients" id="ingredients"></textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit">Next</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/summernote/summernote-bs4.min.css">
    @endpush
    @push('scripts')
    <script src="{{ asset('assets/admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $('.summernote').summernote({
            height: 200
        })
    </script>
    @endpush
</x-layouts.main>
