<x-layouts.admin.main>
    <x-slot:title>
    Products
    </x-slot:title>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="w-25">
                        <select name="category_id" id="category_id" class="custom-select">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(request()->get('category') == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-75">
                        <div class="ml-2 float-right">
                            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> New Product
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="order_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Final Price</th>
                                <th>Weight</th>
                                <th>Quantity</th>
                                {{-- <th class="noExport">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(function() {
            $('#category_id').change(function (e) {
                location.href = route('admin.products', {
                    category: e.target.value
                })
            });
            ///
           $('#order_table').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                buttons: [
                    {
                        extend: 'csv',
                        footer: false,
                        exportOptions: {
                           columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'excel',
                        footer: false,
                        exportOptions: {
                           columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'pdf',
                        footer: false,
                        exportOptions: {
                           columns: "thead th:not(.noExport)"
                        }
                    },
                    'colvis'
                ],
                dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: "{{ route('admin.product.lists', ['category_id' => request()->get('category')]) }}",
                columns: [
                    {data: 'sku', name: 'sku'},
                    {data: 'name', name: 'name'},
                    {data: 'price', name: 'price'},
                    {data: 'final_price', name: 'final_price'},
                    {data: 'weight', name: 'weight'},
                    {data: 'quantity', name: 'quantity'},
                ]
            }).buttons()
                .container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        })
    </script>
    @endpush
</x-layouts.main>
