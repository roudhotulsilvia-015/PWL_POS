<form id="form-create-level" action="{{ url('level/ajax') }}" method="POST">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="level_kode">Kode Level</label>
                    <input type="text" class="form-control" id="level_kode" name="level_kode" required>
                    <small class="form-text text-muted">Masukkan kode level (minimal 2 karakter)</small>
                    <span class="invalid-feedback" id="error-level_kode"></span>
                </div>
                <div class="form-group">
                    <label for="level_nama">Nama Level</label>
                    <input type="text" class="form-control" id="level_nama" name="level_nama" required>
                    <small class="form-text text-muted">Masukkan nama level (maksimal 100 karakter)</small>
                    <span class="invalid-feedback" id="error-level_nama"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#form-create-level').on('submit', function(e) {
            e.preventDefault();
            
            var formData = {
                level_kode: $('#level_kode').val(),
                level_nama: $('#level_nama').val(),
                _token: $('input[name="_token"]').val()
            };

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if(response.status) {
                        alert(response.message);
                        $('#myModal').modal('hide');
                        dataLevel.ajax.reload();
                    } else {
                        // Tampilkan error validasi
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

        // Clear error messages on input change
        $('#level_kode, #level_nama').on('change', function() {
            $(this).removeClass('is-invalid');
            $('#error-' + $(this).attr('id')).text('').hide();
        });
    });
</script>
