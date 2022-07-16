{{-- ========================= EDIT ========================== --}}
<div class="modal fade" id="modalEdit{{ $kor->id_kordinator }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="kordinator/{{ $kor->id_kordinator }}" method="post"> @csrf @method('put')
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white">Edit Kordinator</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal"
                        aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Nama Kordinator <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="kordinator" value="{{ $kor->kordinator }}"
                                placeholder="Enter Nama Kordinator" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Nama Ketua <span class="text-danger">*</span></label>
                            <select name="ketua_kor" class="form-select" required>
                                <option selected disabled value="{{$kor->id_alumni}}">{{$kor->nama}}</option>
                                @foreach ($alumni as $a)
                                    <option value="{{$a->id_alumni}}">{{$a->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft my-0 btn-sm"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success my-0 btn-sm">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- ========================= VIEW ========================== --}}
<div class="modal fade" id="modal{{ $kor->id_kordinator }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="viewReviewLabel">Data Kordinator {{ $kor->kec }}</h5>
                <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close"><i
                        class="bi bi-x-lg"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row mb-0">
                    <div class="col-1"></div>
                    <div class="col-3">
                        <div class="w-md-100px">
                            <img src="assets/images/element/02.svg" class="rounded" alt="">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                            <h5 class="me-3 mb-0">{{ $kor->kordinator }}</h5>
                        </div>
                        {{-- <p class="small mb-0">{{date_format($kor->created_at, "d F Y")}}</p> --}}
                        <p class="small mb-0">Kordinator Hamidu dan Sawahud</p>
                        <h6 class="mt-1">Ketua : {{ $kor->nama }}</h6>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-soft my-0 btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- ========================= HAPUS ========================== --}}
<div class="modal fade" id="modalHapus{{ $kor->id_kordinator }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/kordinator/{{$kor->id_kordinator}}" method="post"> @csrf @method('delete')
                <!-- Modal header -->
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="viewReviewLabel">Data Kordinator {{ $kor->kec }}</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal"
                        aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-0">
                        <div class="col-1"></div>
                        <div class="col-2 text-center">
                            <div class="avatar avatar-lg flex-shrink-0">
                                <img class="avatar-img rounded-circle" src="{{asset('assets/images/avatar/01.jpg')}}" alt="avatar">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                <h5 class="me-3 mb-0">{{ $kor->kordinator }}</h5>
                            </div>
                            {{-- <p class="small mb-0">{{date_format($kor->created_at, "d F Y")}}</p> --}}
                            <p class="small mb-0">Kordinator Hamidu dan Sawahud</p>
                            <h6 class="mt-1">Ketua : {{ $kor->nama }}</h6>
                            <input type="hidden" name="ketua_kor" value="{{ $kor->id_alumni }}">
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark-soft my-0 btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger my-0 btn-sm">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
