<form id="form-edit-supplier" action="{{ url('supplier/' . $supplier->supplier_id . '/update_ajax') }}" method="POST">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="supplier_kode">Kode Supplier</label>
                    <input type="text" class="form-control" id="supplier_kode" name="supplier_kode" value="{{ $supplier->supplier_kode }}" required>
                    <span class="invalid-feedback" id="error-supplier_kode"></span>
                </div>
                <div class="form-group">
                    <label for="supplier_nama">Nama Supplier</label>
                    <input type="text" class="form-control" id="supplier_nama" name="supplier_nama" value="{{ $supplier->supplier_nama }}" required>
                    <span class="invalid-feedback" id="error-supplier_nama"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#form-edit-supplier').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: {
                    supplier_kode: $('#supplier_kode').val(),
                    supplier_nama: $('#supplier_nama').val(),
                    _token: $('input[name="_token"]').val()
                },
                dataType: 'json',
                success: function(response) {
                    if(response.status) {
                        alert(response.message);
                        $('#myModal').modal('hide');
                        dataSupplier.ajax.reload();
                    } else {
                        if(response.msgField) {
                            Object.keys(response.msgField).forEach(function(key) {
                                $('#error-' + key).text(response.msgField[key][0]).show();
                                $('#' + key).addClass('is-invalid');
                            });
                        } else {
                            alert(response.message);
                        }
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.statusText);
                }
            });
        });

        $('#supplier_kode, #supplier_nama').on('change', function() {
            $(this).removeClass('is-invalid');
            $('#error-' + $(this).attr('id')).text('').hide();
        });
    });
</script>
