<x-layouts.admin.main>
    <x-slot:title>
    Order
    </x-slot:title>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="order_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order No.</th>
                                <th>Customer</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th class="noExport">Action</th>
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
                ajax: "{{ route('admin.order.lists', ['status' => request()->get('status')]) }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'number', name: 'number'},
                    {data: 'customer', name: 'customer'},
                    {data: 'price', name: 'price'},
                    {data: 'status', name: 'status'},
                    {data: 'order_date', name: 'order_date'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            }).buttons()
                .container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        })
    </script>
    @endpush
</x-layouts.main>
