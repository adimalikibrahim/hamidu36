{{-- ========================= EDIT ========================== --}}
<div class="modal fade" id="modalEdit{{$alm->id_alumni}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="alumni/{{$alm->id_alumni}}" method="post"> @csrf @method('put')
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white">Edit Alumni</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama" value="{{$alm->nama != null ? $alm->nama : null}}" 
                            placeholder="Enter Nama Lengkap" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Nomor Induk Alumni</label>
                            <input type="text" class="form-control" value="{{$alm->nia != null ? $alm->nia : null}}" disabled>
                        </div>
                        <div class="col-6">
                            <label class="form-label">No. HP</label>
                            <input type="text" class="form-control" placeholder="Enter No. HP" name="hp" value="{{$alm->hp != null ? $alm->hp : null}}" maxlength="13">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Provinsi</label>
                            <input type="text" class="form-control" placeholder="Enter Provinsi" name="prov" value="{{$alm->prov != null ? $alm->prov : null}}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Kabupaten</label>
                            <input type="text" class="form-control" placeholder="Enter Kabupaten" name="kab" value="{{$alm->kab != null ? $alm->kab : null}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" placeholder="Enter Kecamatan" name="kec" value="{{$alm->kec != null ? $alm->kec : null}}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Desa</label>
                            <input type="text" class="form-control" placeholder="Enter Desa" name="desa" value="{{$alm->desa != null ? $alm->desa : null}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Kordinator <span class="text-danger">*</span></label>
                            <select name="id_kordinator" class="form-select js-choice z-index-9 border-0 bg-light" required>
                                {{-- <option selected value="{{$alm->id_kordinator !== null ? $alm->id_kordinator: null}}">
                                    {{$alm->kordinator != null ? $alm->kordinator: 'Pilih Kordinator'}}</option> --}}
                                    {{-- <option selected value="">pilih</option> --}}
                                @foreach ($kordinator as $a)
                                    <option value="{{$a->id_kordinator}}">{{$a->kordinator}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Angkatan</label>
                            <select name="id_angkatan" class="form-select js-choice z-index-9 border-0 bg-light">
                                <option selected value="{{$alm->id_angkatan !== null ? $alm->id_angkatan : null}}">
                                    {{$alm->angkatan != null ? $alm->angkatan : 'Pilih Angkatan'}}</option>
                                @foreach ($angkatan as $a)
                                    <option value="{{$a->id_angkatan}}">{{$a->angkatan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft my-0 btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success my-0 btn-sm">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- ========================= VIEW ========================== --}}
<div class="modal fade" id="modal{{$alm->id_alumni}}" >
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal header -->
			<div class="modal-header bg-dark">
				<h5 class="modal-title text-white" id="viewReviewLabel">Data Alumni {{$alm->kec}}</h5>
				<button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
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
							<h5 class="me-3 mb-0">{{$alm->nama}}</h5>
						</div>
						{{-- <p class="small mb-0">{{date_format($alm->created_at, "d F Y")}}</p> --}}
                        <p class="small mb-0">{{$alm->nia}}</p>
                        <h6 class=" mt-0">HP : {{$alm->hp}}</h6>
					</div>	
				</div>
                <hr>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-5">
                        <span class="small">Kordinator</span>
                        <h6 class="">{{$alm->kordinator !== null ? $alm->kordinator : '-'}}</h6>
                        <span class="small">Kecamatan</span>
                        <h6 class="">{{$alm->kec !== null ? $alm->kec : '-'}}</h6>
                    </div>
                    <div class="col-6">
                        <span class="small">Angkatan</span>
                        <h6 class="">{{$alm->angkatan !== null ? $alm->angkatan : '-'}}</h6>
                        <span class="small">Kabupaten</span>
                        <h6 class="">{{$alm->kab !== null ? $alm->kab : '-'}}</h6>

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
<div class="modal fade" id="modalHapus{{$alm->id_alumni}}" >
	<div class="modal-dialog">
		<div class="modal-content">
            <form action="alumni/{{ $alm->id_alumni }}" method="post"> @csrf @method('delete')			
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="viewReviewLabel">Hapus Alumni {{$alm->kec}}</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
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
                                <h5 class="me-3 mb-0">{{$alm->nama}}</h5>
                            </div>
                            {{-- <p class="small mb-0">{{date_format($alm->created_at, "d F Y")}}</p> --}}
                            <p class="small mb-0">{{$alm->nia}}</p>
                            <h6 class=" mt-0">HP : {{$alm->hp}}</h6>
                        </div>	
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <span class="small">Kordinator</span>
                            <h6 class="">{{$alm->kordinator !== null ? $alm->kordinator : '-'}}</h6>
                            <span class="small">Kecamatan</span>
                            <h6 class="">{{$alm->kec !== null ? $alm->kec : '-'}}</h6>
                        </div>
                        <div class="col-6">
                            <span class="small">Angkatan</span>
                            <h6 class="">{{$alm->angkatan !== null ? $alm->angkatan : '-'}}</h6>
                            <span class="small">Kabupaten</span>
                            <h6 class="">{{$alm->kab !== null ? $alm->kab : '-'}}</h6>

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