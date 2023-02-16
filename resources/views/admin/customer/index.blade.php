<x-layouts.admin.main>
    <x-slot:title>
    Customers
    </x-slot:title>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="customer_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone No.</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Last Login</th>
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
           $('#customer_table').DataTable({
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
                ajax: "{{ route('admin.customer.lists') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'email', name: 'email'},
                    {data: 'gender', name: 'gender'},
                    {data: 'last_login', name: 'last_login'},
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
</x-layouts.admin.main>
