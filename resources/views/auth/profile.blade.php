@extends('layouts.app')
@section('title', 'Profile')
@section('profile', 'active')
@section('konten')
<div class="col-12">
    <div class="card bg-transparent border">
        <div class="card-header bg-light border-bottom d-sm-flex justify-content-between align-items-center">
            <h5 class="mb-0">Profile {{Auth::user()->name}}</h5>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="assets/images/avatar/01.jpg" alt="user-avatar" class="d-block rounded" height="100" width="100"
                    id="uploadedAvatar" />
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-secondary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input disabled type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                    </label>
                    <button type="button" disabled class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>

                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                </div>
            </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <form action="/account/{{ Auth::user()->uuid }}" method="post"> @csrf @method('put')
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">User Name</label>
                        <input class="form-control" type="text" id="firstName" name="name" value="{{Auth::user()->name}}"
                            placeholder="User Name" autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email" value="{{Auth::user()->email}}"
                            placeholder="email" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" required/>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="role">Role/Level</label>
                        <input type="text" class="form-control" disabled value="{{Auth::user()->role}}" />
                    </div>

                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
