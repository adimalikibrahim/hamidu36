@extends('layouts.web.appWeb')

@section('title', 'Anggota Angkatan')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endpush
@section('konten')
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-dark p-4 text-center rounded-3">
                        <h1 class="text-white m-0">Angkatan {{$ang->angkatan}}</h1>
                        <div class="d-flex justify-content-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
                                    <li class="breadcrumb-item active" aria-current="page">Anggota angkatan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-3">
        <div class="container">
            <div class="row">
   
                <div class="col-xl-12">
                    <div class="card border bg-transparent rounded-3">
                        <div class="card-body">   
                            <div class="text-nowrap border-0">
                                <table id="example" class="table dt-responsive table-dark-gray align-middle mb-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 rounded-start">Nama</th>
                                            <th scope="col" class="border-0">Alamat</th>
                                            <th scope="col" class="border-0 rounded-end">Kordinator</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alumni as $alm)                                            
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center position-relative">
                                                        <div class="avatar avatar-md mb-2 mb-md-0">
                                                            <img src="/assets/images/avatar/01.jpg" class="rounded" alt="">
                                                        </div>
                                                        <div class="mb-0 ms-2">
                                                            <h6 class="mb-0"><a href="#" class="stretched-link">{{$alm->nama}}</a></h6>
                                                            <span class="text-body small">{{$alm->nia}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $alm->kec !== null ? $alm->kec : '-' }}</td>
                                                <td>{{ $alm->kordinator !== null ? $alm->kordinator : '-' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                pageLength: 5,
                ordering: false,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 50]
                ],

            });
        });
    </script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    {!! Toastr::message() !!}
@endpush