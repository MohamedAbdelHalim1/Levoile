<section>
    <header>
        <h2 class="h5 text-dark">
            {{ __('معلومات الحساب') }}
        </h2>
        <p class="mt-2 text-muted">
            {{ __("تحديث المعلومات الخاصة بحسابك") }}
        </p>
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('PATCH')

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('الاسم') }}</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name', $user->name) }}" 
                required 
                autofocus 
                autocomplete="name"
            >
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('البريد الالكتروني') }}</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email', $user->email) }}" 
                required 
                autocomplete="username"
            >
            @error('email')
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

            @if (session('status') === 'profile-updated')
                <p class="text-success small mb-0 ms-3">
                    {{ __('تم حفظ المعلومات الخاصة بحسابك') }}
                </p>
            @endif
        </div>
    </form>
</section>
