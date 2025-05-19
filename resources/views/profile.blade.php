@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Profile</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    {{--                    session--}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h5 class="card-header">Profile Details</h5>
                    <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                               <div class="mb-3">
                                   <label class="form-label">Name</label>
                                   <input type="text" class="form-control" value="{{ $user->name }}" disabled />
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="mb-3">
                                   <label class="form-label">Email</label>
                                   <input type="email" class="form-control" value="{{ $user->email }}" disabled />
                               </div>
                           </div>
                        </div>
{{--                       modal edit profile --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    modal edit profile--}}
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profil.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <!-- Password Field with Toggle -->
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <span class="toggle-password" onclick="togglePassword('password', this)" style="position:absolute; right:10px; top:38px; cursor:pointer;">👁️</span>
                        </div>

                        <!-- Confirm Password Field with Toggle -->
                        <div class="mb-3 position-relative">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            <span class="toggle-password" onclick="togglePassword('password_confirmation', this)" style="position:absolute; right:10px; top:38px; cursor:pointer;">👁️</span>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePassword(fieldId, iconElement) {
            const input = document.getElementById(fieldId);
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);

            // Optional: Ganti ikon (misal dari 👁️ ke 🙈)
            iconElement.textContent = type === 'password' ? '👁️' : '🙈';
        }
    </script>

@endsection
