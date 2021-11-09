@extends('template.admin')
@section('body')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div><button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Dokter</button></div>
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
                                    <th>No Induk</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($dokters as $dokter)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $dokter->name  }}</td>
                                <td>{{ $dokter->nomor_induk  }}</td>
                                <td>
                                    <button value="{{$dokter->id}}" class="btn btn-success editbtn" type="button">Edit</button>
                                    <button value="{{$dokter->id}}" type="button" class="btn btn-danger deletebtn">Delete</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('add-dokter') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Induk</label>
                        <input type="text" name="noinduk" id="noinduk" class="form-control" placeholder="Nomor Induk" required>
                    </div>
                    <div class="form-group">
                        <label>Poli</label>
                        <select class="form-control" name="poli" id="category">
                            <option hidden>Pilih Poli</option>
                            @foreach ($polis as $poli)
                            <option value="{{ $poli->id_poli }}">{{ $poli->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Dokter</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- EDIT Modal--}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Poli</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('update-dokter')}}" method="POST" id="editForm">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="namaEdit" id="namaEdit" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="emailEdit" id="emailEdit" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Nomor Induk</label>
                            <input type="text" name="noindukEdit" id="noindukEdit" class="form-control" placeholder="Nomor Induk">
                        </div>
                        <div class="form-group">
                            <label>Poli</label>
                            <select class="form-control" name="poliEdit" id="poliEdit">
                                <option hidden>Pilih Poli</option>
                                @foreach ($polis as $poli)
                                <option value="{{ $poli->id_poli }}">{{ $poli->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="passwordEdit" id="passwordEdit" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('delete-dokter') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="modal-body">
                    <p>Apakah anda yakin menghapus data ini?</p>
                    <input type="hidden" id="delete_id" name="delete_id" />
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
    $(document).ready(function() {

        $(document).on('click', '.deletebtn', function() {
            var id = $(this).val();
            $('#deleteModal').modal('show');
            $('#delete_id').val(id);
        });

        $(document).on('click', '.editbtn', function() {
            var id = $(this).val();
            $('#editModal').modal('show');

            $.ajax({
                type: "GET"
                , url: "/edit-dokter/" + id
                , success: function(response) {
                    // console.log(response.poli);
                    $('#namaEdit').val(response.dokter.name);
                    $('#emailEdit').val(response.dokter.email);
                    $('#noindukEdit').val(response.dokter.nomor_induk);
                    $('#poliEdit').val(response.dokter.poli);
                    $('#passwordEdit').val(response.dokter.password);
                }
            });
        })
    })

</script>
@endsection
