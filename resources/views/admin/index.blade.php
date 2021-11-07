@extends('template.admin')
@section('body')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Antrian</div>
                            <div><button type="button" class="btn btn-success float-right mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Antrian</button></div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mb-2">
                            <form action="" class="form-inline">
                                <label for="category_filter">Filter by Poli &nbsp;</label>
                                <select name="poli" id="category_filter" class="form-control">
                                    <option value="">Pilih Poli</option>
                                </select>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table style="width: 100%;" class="table table-stripped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                </tr>
                                </thead>
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
