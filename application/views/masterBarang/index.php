<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Data Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data Barang</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
        <a href="javascript:void(0);" class="btn btn-primary mb-2 add-barang">Tambah Data</a>
            <div mb-2>
                <!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
                <?php if ($this->session->flashdata('message')) :
                    echo $this->session->flashdata('message');
                endif; ?>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tableMasterBarang">
                            <thead>
                                <tr class="table-success">
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>QTY</th>
                                    <th>PRICE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal dialog hapus data-->
<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="myModalAdd" tabindex="-1" aria-labelledby="myModalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalAddLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        ID 
                        <br>
                        <small>*Required Max 5 Digit</small>
                    </div>
                    <div class="col-7 mt-2">
                        <input type="number" name="id" id="id" maxlength="5"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        Name
                        <br>
                        <small>*Required</small>
                    </div>
                    <div class="col-7 mt-2">
                        <input type="text" name="name" id="name" />
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        QTY 
                        <br>
                        <small>*Required Max 5 Digit</small>
                    </div>
                    <div class="col-7 mt-2">
                        <input type="number" name="qty" id="qty" maxlength="5"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        PRICE
                        <br>
                        <small>*Required</small>
                    </div>
                    <div class="col-8 mt-2">
                        <input type="text" class="text-right" name="price" id="price" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btadd">Tambah</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" role="dialog" id="myModalEdit" tabindex="-1" aria-labelledby="myModalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalEditLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        ID 
                        <br>
                        <small>*Required Max 5 Digit</small>
                    </div>
                    <div class="col-7 mt-2">
                        <input type="hidden" name="old_id_edit" id="old_id_edit" maxlength="5"/>
                        <input type="number" name="id_edit" id="id_edit" maxlength="5"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        Name
                        <br>
                        <small>*Required</small>
                    </div>
                    <div class="col-7 mt-2">
                        <input type="text" name="name_edit" id="name_edit" />
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        QTY 
                        <br>
                        <small>*Required Max 5 Digit</small>
                    </div>
                    <div class="col-7 mt-2">
                        <input type="number" name="qty_edit" id="qty_edit" maxlength="5"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        PRICE
                        <br>
                        <small>*Required</small>
                    </div>
                    <div class="col-8 mt-2">
                        <input type="text" class="text-right" name="price_edit" id="price_edit" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btupdate">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
   $(document).ready(function(){
    var tables = $('#tableMasterBarang').DataTable({
        ajax: {
           url: '<?php echo base_url() ?>masterBarangController/getAjax',
           method: "GET",
           dataSrc:"",
           xhrFields: {
               withCredentials: true
           },
           processing: true,
            serverSide: true,
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "qty" },
            { data: "price" },
            {
                "mData": null,
                "bSortable": false,
               "mRender": function (o) { return '<a href="#" onclick="return editData(' + o.id + ')" class="btn btn-success btn-sm" id="edit-barang"><i class="fa fa-edit"></i> </a> <a href="javascript:void(0);" data="'+ o.id +'" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>'; }
            }
        ]
    });

    $('#btadd').on('click', function() {
        var id = $('#id').val();
        var name = $('#name').val();
        var qty = $('#qty').val();
        var price = $('#price').val();
        $.ajax({
                type: 'ajax',
                method: 'post',
                async: false,
                url: '<?php echo base_url() ?>masterBarangController/add/',
                data: {
                    id: id,
                    name: name,
                    qty: qty,
                    price: price
                },
                success: function(response) {
                    $('#myModalAdd').modal('hide');
                    alert(response);
                    tables.ajax.reload();
                }
            });
    });

    $('#btupdate').on('click', function() {
        var old_id = $('#old_id_edit').val();
        var id = $('#id_edit').val();
        var name = $('#name_edit').val();
        var qty = $('#qty_edit').val();
        var price = $('#price_edit').val();
        $.ajax({
                type: 'ajax',
                method: 'post',
                async: false,
                url: '<?php echo base_url() ?>masterBarangController/update/',
                data: {
                    old_id: old_id,
                    id: id,
                    name: name,
                    qty: qty,
                    price: price
                },
                success: function(response) {
                    $('#myModalEdit').modal('hide');
                    alert(response);
                    tables.ajax.reload();
                }
            });
    });

    $('#tableMasterBarang').on('click', '.item-delete', function() {
        var id = $(this).attr('data');
        $('#myModalDelete').modal('show');
        $('#btdelete').unbind().click(function() {
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: '<?php echo base_url() ?>masterBarangController/delete/',
                data: {
                    id: id
                },
                success: function(response) {
                    $('#myModalDelete').modal('hide');
                    alert(response);
                    tables.ajax.reload();
                }
            });
        });
    });

});

    function editData(id)
    {
        $.ajax({
                type: 'ajax',
                method: 'post',
                async: false,
                url: '<?php echo base_url() ?>masterBarangController/edit/',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#old_id_edit').val(response.id);
                    $('#id_edit').val(response.id);
                    $('#name_edit').val(response.name);
                    $('#qty_edit').val(response.qty);
                    $('#price_edit').val(response.price);
                    $('#myModalEdit').modal('show');
                }
            });
    }    

    $('.add-barang').on('click', function() {
        $('#myModalAdd').modal('show');
    });

   

    

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[maxlength]').forEach(input => {
            input.addEventListener('input', e => {
            let val = e.target.value, len = +e.target.getAttribute('maxlength');
            e.target.value = val.slice(0,len);
            })
        })
    })

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
    

        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
    
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    var rupiah = document.getElementById('price');
    rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
</script>