{{-- @extends('resident.app')

@section('content')

<style>
    .profile-back-div{
        height: 700px;
        width: 100%;
        background-color: white;
        box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: start;
        align-items: start;
        flex-direction: column;
    }
</style>

<div class="profile-back-div">
    <div class="col-md-8">
        <div class="card-body">
            <h2 class="h5">Profile Information</h2>
            <p class="text-muted">Update your account's profile information and email address.</p>
            
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="alert alert-warning">
                        <p>Your email address is unverified.</p>
                        <button form="send-verification" class="btn btn-link p-0">Click here to re-send the verification email.</button>
                        @if (session('status') === 'verification-link-sent')
                            <p class="text-success mt-2">A new verification link has been sent to your email address.</p>
                        @endif
                    </div>
                @endif
                
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeletionModal">Delete Account</button>
                <div class="modal fade" id="confirmDeletionModal" tabindex="-1" aria-labelledby="confirmDeletionModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeletionModalLabel">Confirm Account Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm deletion.</p>
                                <form method="post" action="{{ route('profile.destroy') }}">
                                    @csrf
                                    @method('delete')
                                    
                                    <div class="mb-3">
                                        <label for="delete_password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="delete_password" name="password" required>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card-body">
            <h2 class="h5">Update Password</h2>
            <p class="text-muted">Ensure your account is using a long, random password to stay secure.</p>
            
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                
                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    
</div>

@endsection --}}