@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <!-- Link diubah ke barang/create -->
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Filter:</label>
                <div class="col-3">
                    <!-- ID dan Name diubah menjadi kategori_id -->
                    <select class="form-control" id="kategori_id" name="kategori_id">
                        <option value="">- Semua -</option>
                        @foreach($kategori as $item)
                            <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Kategori Barang</small>
                </div>
            </div>
        </div>
    </div>

    <!-- ID Tabel diubah menjadi table_barang -->
    <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        var dataBarang = $('#table_barang').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('barang/list') }}", // URL ke list barang
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    d.kategori_id = $('#kategori_id').val(); // Filter kategori_id
                }
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },{
                    data: "barang_kode",
                    className: "",
                    orderable: true,
                    searchable: true
                },{
                    data: "barang_nama",
                    className: "",
                    orderable: true,
                    searchable: true
                },{
                    data: "harga_beli",
                    className: "",
                    orderable: true,
                    searchable: false
                },{
                    data: "harga_jual",
                    className: "",
                    orderable: true,
                    searchable: false
                },{
                    data: "kategori.kategori_nama",
                    className: "",
                    orderable: false,
                    searchable: false
                },{
                    data: "aksi",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Reload tabel saat filter kategori berubah
        $('#kategori_id').on('change', function() {
            dataBarang.ajax.reload();
        });
    });
</script>
@endpush