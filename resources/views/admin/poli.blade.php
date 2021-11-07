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
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-{{ $poli->id_poli }}"> EDIT </a>
                                            <a href="" class="btn btn-danger"> DELETE </a>
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
                <form action="{{ route('poli.store') }}" method="POST">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    @foreach($polis as $data)
    <div class="modal fade" id="editModal-{{ $data->id_poli }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Poli</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/poli" method="POST" id="editForm">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID Poli</label>
                            <input type="text" name="idpoli" id="idpoli" class="form-control" value="{{ $data->id_poli }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $data->nama }}">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $data->deskripsi }}">
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
@endsection
