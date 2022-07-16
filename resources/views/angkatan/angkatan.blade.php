@extends('layouts.app')
@section('title', 'Angkatan')
@section('angkatan', 'active')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
@endpush
@section('konten')

    <div class="col-12">
        <div class="card bg-transparent border">
            <div class="card-header bg-light border-bottom d-sm-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Angkatan</h5>
                <a href="#" class="btn btn-sm btn-primary mb-0" data-bs-toggle="modal"
                    data-bs-target="#modalAdd">Tambah</a>
            </div>

            <div class="card-body pb-0">
                <div class="table-responsive border-0">
                    <table id="example" class="table table-dark-gray align-middle mb-0 table-hover">
                        <thead>
                            <tr class="text-center text-sm-start">
                                <th class="border-0 rounded-start">Angkatan</th>
                                <th class="border-0">Nama Angkatan</th>
                                <th class="border-0">Ketua</th>
                                <th class="border-0">Jumlah</th>
                                <th class="border-0 rounded-end" width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($angkatan as $ang)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center position-relative">
                                            <div class="w-60px">
                                                <img src="assets/images/element/02.svg" class="rounded" alt="">
                                            </div>
                                            <h6 class="table-responsive-title mb-0 ms-2">
                                                <a href="#" class="stretched-link" data-bs-toggle="modal"
                                                    data-bs-target="#modal{{ $ang->id_angkatan }}">
                                                    {{ $ang->angkatan }}
                                                </a>
                                            </h6>
                                        </div>
                                    </td>
                                    <td>
                                        <h6>{{ $ang->nama_angkatan }}</h6>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center position-relative">
                                            <div class="avatar avatar-xs mb-2 mb-md-0">
                                                <img src="assets/images/avatar/01.jpg" class="rounded-circle"
                                                    alt="">
                                            </div>
                                            <div class="mb-0 ms-2">
                                                <h6 class="mb-0">{{ $ang->nama !== null ? $ang->nama : '-' }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h3 class="badge bg-info">
                                            {{ $angAng->where('id_angkatan', $ang->id_angkatan)->count() }}
                                        </h3>
                                    </td>
                                    <td class="text-sm-end text-lg-end" width="5%">
                                        @unless(Auth::user()->role != 'admin')
                                            <a href="#" class="btn btn-sm btn-success-soft mb-0" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit{{ $ang->id_angkatan }}">
                                                <i class="tf-icons bx bx-edit"></i>Edit</a>
                                            <button class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0" data-bs-toggle="modal"
                                                data-bs-target="#modalHapus{{ $ang->id_angkatan }}">
                                                <i class="tf-icons bx bx-trash"></i>Delete</button>
                                        @endunless
                                        <a href="/anggota-angkatan/{{ $ang->id_angkatan }}"
                                            class="btn btn-sm btn-info-soft mb-0">
                                            <i class="tf-icons bx bx-edit"></i>Anggota</a>
                                    </td>
                                </tr>
                                @include('angkatan.modalAngkatan')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="angkatan" method="post"> @csrf
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white">Tambah Angkatan</h5>
                        <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal"
                            aria-label="Close"><i class="bi bi-x-lg"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Tahun Angkatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="angkatan"
                                    placeholder="Enter Tahun Angkatan" maxlength="4" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Nama Angkatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_angkatan"
                                    placeholder="Enter Nama Angkatan" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Nama Ketua <span class="text-danger">*</span></label>
                                <select name="ketua_ang" class="form-select js-choice z-index-9 border-0 bg-light" required>
                                    <option selected disabled value="">Pilih Ketua</option>
                                    @foreach ($alumni as $a)
                                        <option value="{{ $a->id_alumni }}">{{ $a->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger-soft my-0 btn-sm"
                            data-bs-dismiss="modal">Close</button>
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
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 50]
                ]
            });
        });
        $(document).ready(function() {
            $('.modal').appendTo($('body'));
        });
        $(document).ready(function() {
            $('#select2').select2();
        });
    </script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('assets/vendor/choices/js/choices.min.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
@endpush
