@extends('layouts.app')
@section('title', 'Account')
@section('account', 'active')
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
                <h5 class="mb-0">Daftar Account</h5>
                <a href="#" class="btn btn-sm btn-primary mb-0" data-bs-toggle="modal"
                    data-bs-target="#modalAdd">Tambah</a>
            </div>
            <div class="card-body pb-0">
                <div class="table-responsive text-nowrap border-0">
                    <table id="example" class="table dt-responsive table-dark-gray align-middle mb-0 table-hover"
                        style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th class="border-0 rounded-start">Email</th>
                                <th class="border-0 ">Nama</th>
                                <th class="border-0">Level</th>
                                <th class="border-0 rounded-end">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($account as $a)
                                <tr>
                                    <td>{{ $a->email }}</td>
                                    <td class="fw-bold">
                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#modalView{{ $a->uuid }}">
                                            <i class="bx bx-user-circle"> </i>
                                            {{ $a->name }}
                                        </a>
                                    </td>
                                    <td>{{ $a->role }}</td>
                                    <td width="5%">
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $a->uuid }}">
                                            <i class="tf-icons bx bx-edit"></i>Edit</a>
                                        <a href="#" class="btn btn-sm btn-dark-soft mb-0" data-bs-toggle="modal"
                                            data-bs-target="#modalResset{{ $a->uuid }}">
                                            <i class="tf-icons bx bx-edit"></i>Reset</a>
                                        <button class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0" data-bs-toggle="modal"
                                            data-bs-target="#modalHapus{{ $a->uuid }}">
                                            <i class="tf-icons bx bx-trash"></i>Delete</button>
                                    </td>
                                </tr>

                                @include('account.modalAccount')
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="account" method="post"> @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Register Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label">Full Name</label>
                                <input name="name" type="text" id="nameWithTitle" class="form-control"
                                    placeholder="Enter Nama Lengkap" />
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="emailWithTitle" class="form-label">Email</label>
                                <input name="email" type="text" id="emailWithTitle" class="form-control"
                                    placeholder="xxxx@xxx.xx" />
                            </div>
                            <div class="col mb-0">
                                <label for="dobWithTitle" class="form-label">Level</label>
                                <input class="form-control" list="datalistOptions" name="role" placeholder="Type to search..." />
                                <datalist id="datalistOptions">
                                    <option value="">Select Level</option>
                                    <option value="ortu">ortu</option>
                                    @if (Auth::user()->role == 'admin')
                                        <option value="user">user</option>
                                        <option value="admin">admin</option>
                                    @endif
                                    <option value="dewan">dewan</option>
                                    <option value="alumni">alumni</option>
                                    <option value="santri">santri</option>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                ordering: false,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 50]
                ],

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
    <script src="{{ asset('assets/vendor/choices/js/choices.min.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
@endpush
