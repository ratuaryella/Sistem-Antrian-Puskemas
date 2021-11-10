@extends('template.admin')
@section('body')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div><button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Poli</button></div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif

                        <div class="table-responsive">
                            <table style="width: 100%;" class="table table-stripped" id="datatable">
                                <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th></th>
                                </tr>
                                </thead>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($polis as $poli)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $poli->nama  }}</td>
                                        <td>{{ $poli->deskripsi  }}</td>
                                        <td>
                                            <button value="{{$poli->id_poli}}" class="btn btn-success editbtn" type="button">Edit</button>
                                            <button value="{{$poli->id_poli}}" type="button" class="btn btn-danger deletebtn">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Poli</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('add-poli') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID Poli</label>
                            <input type="text" name="idpoli" id="idpoli" class="form-control" placeholder="ID Poli">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Poli">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi Poli">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Poli</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    @foreach($polis as $data)
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Poli</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('update-poli')}}" method="POST" id="editForm">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID Poli</label>
                            <input type="text" name="idpoliEdit" id="idpoliEdit" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="namaEdit" id="namaEdit" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsiEdit" id="deskripsiEdit" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Poli</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('delete-poli') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data ini?</p>
                        <input type="hidden" id="delete_id" name="delete_id"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

        $(document).on('click', '.deletebtn', function () {
            var id_poli = $(this).val();
            $('#deleteModal').modal('show');
            $('#delete_id').val(id_poli);
        });

        $(document).on('click', '.editbtn', function () {
            var id_poli = $(this).val();
            $('#editModal').modal('show');

            $.ajax({
                type:"GET",
                url:"/edit-poli/"+id_poli,
                success:function (response) {
                    // console.log(response.poli);
                    $('#idpoliEdit').val(response.poli.id_poli);
                    $('#namaEdit').val(response.poli.nama);
                    $('#deskripsiEdit').val(response.poli.deskripsi);
                }
            });
        })
    })
</script>
@endsection
