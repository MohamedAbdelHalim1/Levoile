<section>
    <header>
        <h2 class="h5 text-dark">
            {{ __('تغيير كلمة المرور') }}
        </h2>
        <p class="mt-2 text-muted">
            {{ __('تغيير كلمة المرور الخاصة بحسابك') }}
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('PUT')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">
                {{ __('كلمة المرور الحالية') }}
            </label>
            <input 
                type="password" 
                id="update_password_current_password" 
                name="current_password" 
                class="form-control @error('current_password') is-invalid @enderror" 
                autocomplete="current-password"
            >
            @error('current_password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label">
                {{ __('كلمة المرور الجديدة') }}
            </label>
            <input 
                type="password" 
                id="update_password_password" 
                name="password" 
                class="form-control @error('password') is-invalid @enderror" 
                autocomplete="new-password"
            >
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">
                {{ __('تأكيد كلمة المرور') }}
            </label>
            <input 
                type="password" 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                class="form-control @error('password_confirmation') is-invalid @enderror" 
                autocomplete="new-password"
            >
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Save Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                {{ __('حفظ') }}
            </button>

            @if (session('status') === 'password-updated')
            <p class="text-success small mb-0 ms-3">
                {{ __('تم حفظ كلمة المرور.') }}
            </p>
            @endif
        </div>
    </form>
</section>
