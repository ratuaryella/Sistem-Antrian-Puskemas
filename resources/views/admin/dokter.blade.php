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
                        <div class="table-responsive">
                            <table style="width: 100%;" class="table table-stripped" id="datatable">
                                <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Induk</th>
                                    <th>Poli</th>
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
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
