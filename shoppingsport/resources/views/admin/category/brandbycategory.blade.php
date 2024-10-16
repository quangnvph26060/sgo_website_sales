@extends('admin.layout.index')

@section('content')

<div class="page-inner">
    <div class="page-header">
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Thương hiệu của danh mục</a>
            </li>

        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4>Thương hiệu của danh mục : {{ $category->name }}</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="add-row" class="display table table-striped table-hover dataTable"
                                        role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th  data-sort="id" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="id: activate to sort column descending"
                                                    style="width: 60.016px;">ID</th>
                                                <th  data-sort="id" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Parent Category: activate to sort column ascending"
                                                    style="width: 250.484px;">Thượng hiệu</th>

                                                <th style="width: 120.688px;" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>

                                                <th rowspan="1" colspan="1">Thương hiệu</th>

                                                <th rowspan="1" colspan="1">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="product-list">
                                            @forelse($brand as $key => $item)
                                                    <tr>
                                                        <td>{{ $item->brand->id }}</td>
                                                        <td>{{ $item->brand->name }}</td>
                                                        <td>
                                                            <button class="btn btn-danger btn-sm delete" data-id="{{ $item->id }}"
                                                                onclick="deleteConfirmation({{ $item->id }})">
                                                                <i class="fas fa-trash"></i>Xóa</button>

                                                            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.category.delete.brand.by.category', ['id' => $item->id]) }}" method="POST"
                                                                style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </td>
                                                    </tr>
                                            @empty

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@if (session('success'))
<script>
    $(document).ready(function() {
            $.notify({
                icon: 'icon-bell',
                title: 'Thương  hiệu của danh mục',
                message: '{{ session('success') }}',
            }, {
                type: 'secondary',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        });
</script>
@endif



@endsection
