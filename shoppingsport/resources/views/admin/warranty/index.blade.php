@extends('admin.layout.index')

@section('title', $title)
@section('content')

    <div class="page-inner">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $title }}</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="multi-filter-select" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Khách hàng</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chiều</th>
                                        <th>Sản phẩm</th>
                                        <th>Thời gian bảo hành</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warranties as $key => $warranty)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $warranty->customer_name }}</td>
                                            <td>{{ $warranty->phone_number }}</td>
                                            <td>{{ $warranty->address }}</td>
                                            <td>{{ $warranty->product->name }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($warranty->registration_date)->format('d/m/Y') }} -
                                                {{ \Carbon\Carbon::parse($warranty->registration_date)->addYear()->format('d/m/Y') }}
                                            </td>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection


@push('script')
    <script>
        $("#multi-filter-select").DataTable({
            pageLength: 10,
            columnDefs: [{
                    orderable: true,
                    targets: [0, 1, 3, 4, 5]
                }, // Chỉ bật sắp xếp cho cột "STT", "Tên danh mục", "Danh mục cha"
                {
                    orderable: false,
                    targets: '_all'
                } // Tắt sắp xếp cho các cột còn lại
            ],
            initComplete: function() {
                this.api()
                    .columns([0, 1, 3, 4]) // Chỉ lọc trên cột "Tên danh mục" và "Danh mục cha"
                    .every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-select"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on("change", function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column
                                    .search(val ? "^" + val + "$" : "", true, false)
                                    .draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append(
                                    '<option value="' + d + '">' + d + "</option>"
                                );
                            });
                    });
            },
        });
    </script>
@endpush
