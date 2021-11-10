@extends('template.admin')
@section('body')

<div class="container-fluid">
    <div class="row justify-content-center">


        <div class="col-md-6" style="margin-bottom:10px;">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('date') }}" method="GET">
                        <label for="tanggal">Pilih Tanggal:</label>
                        <input type="date" id="tanggal" name="tanggal">
                        <input type="submit" class="btn-sm btn-success ">
                    </form>
                </div>
                <div class="card-body text-center">

                    <h1 class="card-title">{{ $countDate}}</h1>


                </div>
            </div>
        </div>

        <div class="col-md-6" style="margin-bottom:10px;">
            <div class=" card">
                <div class="card-header">
                    <form action="{{ route('date') }}" method="GET">
                        <label for="tanggal">Pilih Bulan:</label>
                        <input type="month" id="bulan" name="bulan">
                        <input type="submit" class="btn-sm btn-success ">
                    </form>
                </div>
                <div class="card-body text-center">
                    <h1 class="card-title">{{ $countMonth}}</h1>
                </div>
            </div>
        </div>

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
                                <td class="text-warning">Temu Dokter</td>
                                @elseif($antrian->status == 2)
                                <td class="text-success">Selesai</td>
                                @elseif($antrian->status == 3)
                                <td class="text-danger">Batal</td>
                                @endif

                                @if($antrian->status == 0)
                                <td>
                                    <table>
                                        <tr>
                                            <form action="{{ url('update-antrian') }}" method="POST">
                                                {{csrf_field()}}
                                                {{ method_field('PUT') }}
                                                <button type="submit" class="btn btn-success masukbtn">
                                                    <input type="hidden" name="id_antrian" value="{{$antrian->id_antrian}}" />
                                                    <input type="hidden" name="status" value="1" />
                                                    Masuk
                                                </button>
                                            </form>
                                        </tr>
                                        &nbsp;
                                        <tr>
                                            <form action="{{ url('update-antrian') }}" method="POST">
                                                {{csrf_field()}}
                                                {{ method_field('PUT') }}
                                                <button class="btn btn-danger batalbtn" type="submit">
                                                    <input type="hidden" name="id_antrian" value="{{$antrian->id_antrian}}" />
                                                    <input type="hidden" name="status" value="3" />
                                                    Batal
                                                </button>
                                            </form>
                                        </tr>
                                    </table>
                                </td>
                                @else
                                <td></td>
                                @endif
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

        $(document).on('click', '.batalbtn', function() {
            var id = $(this).val();
            $('#').data('block', 'something');
            $('#deleteModal').modal('show');
            $('#delete_id').val(id);
        });

    })

</script>
@endsection
