@extends('layouts.app')
@section('title', 'Hamidu')
@section('alumni', 'active')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/choices/css/choices.min.css')}}">

@endpush
@section('konten')

    <div class="col-12">
        <div class="card bg-transparent border">
            <div class="card-header bg-light border-bottom d-sm-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Alumni</h5>
                <a href="#" class="btn btn-sm btn-primary mb-0" data-bs-toggle="modal"
                    data-bs-target="#modalAdd">Tambah</a>
            </div>

            <div class="card-body pb-0">
                <div class="table-responsive border-0">
                    <table id="example" class="table table-dark-gray align-middle mb-0 table-hover">
                        <thead>
                            <tr class="text-center text-sm-start">
                                <th class="border-0 rounded-start">Nama</th>
                                <th class="border-0">NIA</th>
                                <th class="border-0">Kordinator</th>
                                <th class="border-0">Angkatan</th>
                                <th class="border-0">No. HP</th>
                                <th class="border-0 rounded-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumni as $alm)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center position-relative">
                                            <div class="avatar avatar-xs mb-2 mb-md-0">
                                                <img src="assets/images/avatar/01.jpg" class="rounded-circle"
                                                    alt="">
                                            </div>
                                            <div class="mb-0 ms-2">
                                                <h6 class="mb-0">
                                                    <a href="#" class="stretched-link" data-bs-toggle="modal"
                                                        data-bs-target="#modal{{ $alm->id_alumni }}">
                                                        {{ $alm->nama }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $alm->nia !== null ? $alm->nia : '-' }}</td>
                                    <td>
                                        {{-- @foreach ($kordinator->where('id_kordinator',$alm->id_kordinator) as $kord)
                                            {{$kord->kordinator !== null ? $kord->kordinator : '-' }}
                                        @endforeach --}}
                                        {{-- @foreach ($alm->kordinator as $item)
                                            {{$item->ketua}}
                                        @endforeach --}}
                                        {{$alm->kordinator !== null ? $alm->kordinator : '-' }}
                                    </td>
                                    <td>
                                            {{$alm->angkatan !== null ? $alm->angkatan : '-' }}
                                    </td>
                                    <td>
                                        <h6 class="mb-0">{{ $alm->hp !== null ? $alm->hp : '-' }}</h6>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $alm->id_alumni }}">
                                            <i class="tf-icons bx bx-edit"></i>Edit</a>
                                        <button class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0" data-bs-toggle="modal"
                                            data-bs-target="#modalHapus{{ $alm->id_alumni }}">
                                            <i class="tf-icons bx bx-trash"></i>Delete</button>
                                    </td>
                                </tr>

                                @include('alumni.modalEditAlumni')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="alumni" method="post"> @csrf
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white">Tambah Alumni</h5>
                        <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal"
                            aria-label="Close"><i class="bi bi-x-lg"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama" placeholder="Enter Nama Lengkap"
                                    required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <div class="d-sm-flex">
                                    <!-- Radio -->
                                    <div class="form-check radio-bg-light me-4">
                                        <input class="form-check-input" type="radio" name="jk" id="jk1"
                                            value="1" required>
                                        <label class="form-check-label" for="jk1">
                                            Lakilaki
                                        </label>
                                    </div>
                                    <!-- Radio -->
                                    <div class="form-check radio-bg-light me-4">
                                        <input class="form-check-input" type="radio" name="jk" id="jk2"
                                            value="2" readonly>
                                        <label class="form-check-label" for="jk2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">No. HP</label>
                                <input type="text" class="form-control" placeholder="Enter No. HP" name="hp"
                                    maxlength="13">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Provinsi</label>
                                <input type="text" class="form-control" placeholder="Enter Provinsi" name="prov">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Kabupaten</label>
                                <input type="text" class="form-control" placeholder="Enter Kabupaten" name="kab">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" placeholder="Enter Kecamatan" name="kec">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Desa</label>
                                <input type="text" class="form-control" placeholder="Enter Desa" name="desa">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Kordinator <span class="text-danger">*</span></label>
                                <select name="id_kordinator" class="form-select js-choice z-index-9 border-0 bg-light" required>
                                    <option selected disabled value="">Pilih Ketua</option>
                                    @foreach ($kordinator as $a)
                                        <option value="{{$a->id_kordinator}}">{{$a->kordinator}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Angkatan</label>
                                <select name="id_angkatan" class="form-select js-choice z-index-9 border-0 bg-light">
                                    <option selected disabled value="">Pilih Ketua</option>
                                    @foreach ($angkatan as $a)
                                        <option value="{{$a->id_angkatan}}">{{$a->angkatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger-soft my-0 btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success my-0 btn-sm">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                pageLength: 5,
                ordering:false,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 50]
                ]
            });
        });
        $(document).ready(function() {
            $('.modal').appendTo($('body'));
        });
    </script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="{{asset('assets/vendor/choices/js/choices.min.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
@endpush
