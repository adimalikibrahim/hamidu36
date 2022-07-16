@extends('layouts.app')
@section('title', 'Anggota')
@section('kordinator', 'active')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@endpush
@section('konten')

    <div class="row">
        <div class="{{$alumni->count() !== 0 ? 'col-md-6' : 'col-md-12' }} col-sm-12">
            <div class="card bg-transparent border">
                <div class="card-header bg-light border-bottom d-sm-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Kordinator {{$kordinator->kordinator}}</h5>
                    <a href="#" class="btn btn-sm btn-primary mb-0" data-bs-toggle="modal"
                        data-bs-target="#modalAdd"><i class="bi bi-file-earmark-excel"></i> Export</a>
                </div>
                <div class="card-body pb-0">
                    <div class="table-responsive border-0">
                        <table id="example" class="table table-dark-gray align-middle mb-0 table-hover">
                            <thead>
                                <tr class="text-center text-sm-start">
                                    <th class="border-0 rounded-start">No</th>
                                    <th class="border-0">Nama Anggota</th>
                                    <th class="border-0">Alamat</th>
                                    <th class="border-0 rounded-end" width="2%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $angkor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="avatar avatar-xs mb-2 mb-md-0">
                                                    <img src="{{asset('assets/images/avatar/01.jpg')}}" class="rounded-circle"
                                                    alt="">
                                                </div>
                                                <div class="mb-0 ms-2">
                                                    <h6 class="mb-0">
                                                        <a href="#"
                                                        class="stretched-link">{{ $angkor->nama !== null ? $angkor->nama : '-' }}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $angkor->kec !== null ? $angkor->kec : '-' }}</td>
                                        <td>
                                            <form action="/anggota-kordinator/{{$angkor->id_alumni}}" method="post"> @csrf @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger-soft mb-0">
                                                    <i class="tf-icons fas fa-user-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if ($alumni->count() == 0)
            
        @else
            <div class="col-md-6 col-sm-12">
                <div class="card bg-transparent border">
                    <div class="card-header bg-light border-bottom d-sm-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Anggota</h5>
                        {{-- <a href="#" class="btn btn-sm btn-primary mb-0" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">Tambah</a> --}}
                    </div>
                    <div class="card-body pb-0">
                        <div class="table-responsive border-0">
                            <table id="example2" class="table table-dark-gray align-middle mb-0 table-hover ">
                                <thead>
                                    <tr class="text-center text-sm-start">
                                        {{-- <th class="border-0">No</th> --}}
                                        <th class="border-0 rounded-start">Nama Anggota</th>
                                        <th class="border-0">Alamat</th>
                                        <th class="border-0 rounded-end" width="2%">::</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumni as $al)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs mb-2 mb-md-0">
                                                        <img src="{{asset('assets/images/avatar/01.jpg')}}" class="rounded-circle"
                                                            alt="">
                                                    </div>
                                                    <div class="mb-0 ms-2">
                                                        <h6 class="mb-0">
                                                            <a href="#"
                                                                class="stretched-link">{{ $al->nama !== null ? $al->nama : '-' }}</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $al->kec }}</td>
                                            <td>
                                                <form action="/anggota-kordinator/{{$id_kordi}}" method="post"> @csrf
                                                    <input type="hidden" value="{{$al->id_alumni}}" name="id_alumni">
                                                    <button href="#" class="btn btn-sm btn-success-soft mb-0"
                                                    type="submit">
                                                    <i class="fas fa-user-plus"></i></button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
            $('#example2').DataTable({
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
    </script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    {!! Toastr::message() !!}
@endpush
