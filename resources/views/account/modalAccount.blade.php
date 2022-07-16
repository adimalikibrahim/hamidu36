<div class="modal fade" id="modalEdit{{ $a->uuid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/account/{{ $a->uuid }}" method="post"> @csrf @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Update Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Full Name</label>
                            <input name="name" type="text" id="nameWithTitle" class="form-control"
                                placeholder="Enter Nama Lengkap" value="{{ $a->name }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="emailWithTitle" class="form-label">Email</label>
                            <input name="email" type="text" id="emailWithTitle" class="form-control"
                                placeholder="xxxx@xxx.xx" value="{{ $a->email }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Level</label>
                            <select name="role" class="select2 form-select">
                                <option selected value="{{ $a->role }}">{{ $a->role }}</option>
                                <option value="">Select Level</option>
                                <option value="ortu">ortu</option>
                                @if (Auth::user()->role == 'admin')
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                                @endif
                                <option value="dewan">dewan</option>
                                <option value="alumni">alumni</option>
                                <option value="santri">santri</option>
                            </select>
                        </div>
                        @if (Auth::user()->role == 'admin')
                            <div class="col mb-0">
                                <label for="dobWithTitle" class="form-label">Keygen</label>
                                <input type="text" class="form-control" placeholder="Enter No. HP"
                                    value="{{ $a->default }}" disabled />
                            </div>
                        @else
                            <div class="col mb-0">
                                <label for="dobWithTitle" class="form-label">Password</label>
                                <input name="password" type="text" class="form-control"
                                    placeholder="Update Password" />
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- ====================================RESSET PASSWORD=============================================== --}}

<div class="modal fade" id="modalResset{{ $a->uuid }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/keygen/{{ $a->uuid }}" method="post"> @csrf @method('put')
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="viewReviewLabel">Resset Password {{ $a->kec }}</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal"
                        aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-0">
                        <div class="col-1"></div>
                        <div class="col-2 text-center">
                            <div class="avatar avatar-lg flex-shrink-0">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                    alt="avatar">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                <h5 class="me-3 mb-0">{{ $a->name }}</h5>
                            </div>
                            {{-- <p class="small mb-0">{{date_format($a->created_at, "d F Y")}}</p> --}}
                            <p class="small mb-0">{{ $a->email }}</p>
                            <h6 class=" mt-0">Role : {{ $a->role }}</h6>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark-soft my-0 btn-sm"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger my-0 btn-sm">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- ====================================HAPUS=============================================== --}}

<div class="modal fade" id="modalHapus{{ $a->uuid }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/account/{{ $a->uuid }}" method="post"> @csrf @method('delete')
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="viewReviewLabel">Hapus Account {{ $a->kec }}</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal"
                        aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-0">
                        <div class="col-1"></div>
                        <div class="col-2 text-center">
                            <div class="avatar avatar-lg flex-shrink-0">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                    alt="avatar">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                <h5 class="me-3 mb-0">{{ $a->name }}</h5>
                            </div>
                            {{-- <p class="small mb-0">{{date_format($a->created_at, "d F Y")}}</p> --}}
                            <p class="small mb-0">{{ $a->email }}</p>
                            <h6 class=" mt-0">Role : {{ $a->role }}</h6>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark-soft my-0 btn-sm"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger my-0 btn-sm">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- ====================================View=============================================== --}}

<div class="modal fade" id="modalView{{ $a->uuid }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="viewReviewLabel">View Account {{ $a->kec }}</h5>
                <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal"
                    aria-label="Close"><i class="bi bi-x-lg"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row mb-0">
                    <div class="col-1"></div>
                    <div class="col-2 text-center">
                        <div class="avatar avatar-lg flex-shrink-0">
                            <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                            <h5 class="me-3 mb-0">{{ $a->name }}</h5>
                        </div>
                        {{-- <p class="small mb-0">{{date_format($a->created_at, "d F Y")}}</p> --}}
                        <p class="small mb-0">{{ $a->email }}</p>
                        <h6 class=" mt-0">Role : {{ $a->role }} || {{ $a->default }}</h6>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-dark my-0 btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
