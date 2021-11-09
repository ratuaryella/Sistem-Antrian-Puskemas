@extends('template.admin')
@section('body')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div><button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Antrian</button></div>
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
                                    <th>Nomor Antrian</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($antrians as $antrian)
                            <tr>
                                <td>{{ $antrian->no_antrian  }}</td>
                                @if ($antrian->status == 0)
                                <td class="text-secondary">Menunggu</td>
                                @elseif($antrian->status == 1)
                                <td class=".text-warning">Temu Dokter</td>
                                @elseif($antrian->status == 2)
                                <td class="text-success">Selesai</td>
                                @elseif($antrian->status == 3)
                                <td class="text-danger">Batal</td>
                                @endif
                                {{-- <td>--}}
                                {{-- <button value="{{$poli->id_poli}}" class="btn btn-success editbtn" type="button">Edit</button>--}}
                                {{-- <button value="{{$poli->id_poli}}" type="button" class="btn btn-danger deletebtn">Delete</button>--}}
                                {{-- </td>--}}
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Poli</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('posts.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label>Poli</label>
                        <select class="form-control" id="id_poli" name="id_poli">
                            <option hidden>Pilih Poli</option>
                            @foreach ($polis as $poli)
                            <option value="{{ $poli->id_poli }}">{{ $poli->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Antrian</button>
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

    })

</script>
@endsection
