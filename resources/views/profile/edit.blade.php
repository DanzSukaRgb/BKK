@extends('layouts.admin')

@section('title', 'Profile Settings')

@section('content')
<div class="container-fluid pt-4" x-data="profile">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Profile Information</h5>
                </div>
                <div class="card-body">
                    <form id="profile-form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-4 text-center mb-4 mb-md-0">
                                <div class="avatar-upload mx-auto" style="max-width: 200px;">
                                    <div class="avatar-edit">
                                        <input type="file" id="avatar-upload" name="avatar"
                                               accept=".png, .jpg, .jpeg, .webp"
                                               class="d-none"
                                               x-ref="avatarInput"
                                               @change="previewAvatar">
                                        <label for="avatar-upload" class="btn btn-circle btn-primary avatar-upload-label">
                                            <i class="fas fa-camera"></i>
                                        </label>
                                    </div>
                                    <div class="avatar-preview mb-3 position-relative">
                                        <div id="avatar-preview"
                                             :style="'background-image: url(' + (avatarPreview || '{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default-avatar.webp') }}') + ')'">
                                        </div>
                                        <template x-if="avatarPreview || {{ $user->avatar ? 'true' : 'false' }}">
                                            <button type="button" class="btn btn-circle btn-danger avatar-remove"
                                                    @click="removeAvatar">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </template>
                                    </div>
                                    <small class="text-muted d-block">Allowed JPG, PNG or WEBP. Max 2MB.</small>
                                    @error('avatar')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name', $user->name) }}" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email', $user->email) }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input id="phone" name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                               value="{{ old('phone', $user->phone) }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="bio" class="form-label">Bio</label>
                                        <textarea id="bio" name="bio" class="form-control @error('bio') is-invalid @enderror" rows="3"
                                                  maxlength="500">{{ old('bio', $user->bio) }}</textarea>
                                        <div class="text-muted small text-end"><span id="bio-counter">0</span>/500</div>
                                        @error('bio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary px-4 rounded-pill">
                                <i class="fas fa-save me-2"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Update Password</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input id="current_password" name="current_password" type="password"
                                   class="form-control @error('current_password') is-invalid @enderror" autocomplete="current-password">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input id="password" name="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4 rounded-pill">
                                <i class="fas fa-key me-2"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm rounded-lg border-danger mb-4">
                <div class="card-header bg-white text-danger">
                    <h5 class="mb-0">Delete Account</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                    <button class="btn btn-outline-danger w-100 rounded-pill mt-3"
                            data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                        <i class="fas fa-trash-alt me-2"></i> Delete Account
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete your account? This action cannot be undone.</p>

                <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
                    @csrf
                    @method('DELETE')

                    <div class="mb-3">
                        <label for="delete_password" class="form-label">Password</label>
                        <input id="delete_password" name="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password to confirm" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-danger rounded-pill">
                            Delete Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .avatar-upload {
        position: relative;
    }

    .avatar-edit {
        position: absolute;
        right: 30px;
        top: 10px;
        z-index: 1;
    }

    .avatar-upload-label {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .avatar-preview {
        width: 150px;
        height: 150px;
        position: relative;
        border-radius: 100%;
        border: 4px solid #F8F9FA;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
    }

    .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .avatar-remove {
        position: absolute;
        right: -10px;
        top: -10px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
    }

    .btn-circle {
        border-radius: 50%;
        width: 34px;
        height: 34px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('profile', () => ({
            avatarPreview: null,
            removeAvatarFlag: false,

            previewAvatar(event) {
                const file = event.target.files[0];
                if (!file) return;

                // Validate file size (max 2MB)
                if (file.size / 1024 / 1024 > 2) {
                    alert('File size exceeds 2MB');
                    this.$refs.avatarInput.value = '';
                    return;
                }

                // Create preview
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.avatarPreview = e.target.result;
                    this.removeAvatarFlag = false;

                    // Add hidden input for avatar update
                    this.removeHiddenRemoveInput();
                };
                reader.readAsDataURL(file);
            },

            removeAvatar() {
                this.avatarPreview = null;
                this.$refs.avatarInput.value = '';
                this.removeAvatarFlag = true;

                // Add hidden input to indicate removal
                this.addHiddenRemoveInput();
            },

            addHiddenRemoveInput() {
                // Remove existing if any
                this.removeHiddenRemoveInput();

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'remove_avatar';
                input.value = '1';
                document.getElementById('profile-form').appendChild(input);
            },

            removeHiddenRemoveInput() {
                const existingInput = document.querySelector('input[name="remove_avatar"]');
                if (existingInput) {
                    existingInput.remove();
                }
            }
        }));
    });

    // Bio character counter
    document.addEventListener('DOMContentLoaded', function() {
        const bioField = document.getElementById('bio');
        if (bioField) {
            bioField.addEventListener('input', function(e) {
                document.getElementById('bio-counter').textContent = e.target.value.length;
            });
            // Initialize counter
            document.getElementById('bio-counter').textContent = bioField.value.length;
        }
    });
</script>
@endpush
