<section class="mb-5">
    <header>
        <h2 class="h5 text-dark">
            {{ __('مسح الحساب') }}
        </h2>
        <p class="mt-2 text-muted">
            {{ __('عند مسح الحساب ، جميع البيانات والبيانات الخاصة بالحساب سيتم حذفها بشكل دائم') }}
        </p>
    </header>

    <!-- Delete Account Button -->
    <button
        type="button"
        class="btn btn-danger mt-3"
        data-bs-toggle="modal"
        data-bs-target="#confirm-user-deletion-modal"
    >
        {{ __('مسح الحساب') }}
    </button>

    <!-- Modal -->
    <div
        class="modal fade"
        id="confirm-user-deletion-modal"
        tabindex="-1"
        aria-labelledby="confirmUserDeletionModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">
                            {{ __('تأكيد مسح الحساب') }}
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>

                    <div class="modal-body">
                        <p class="text-muted">
                            {{ __('من فضلك ادخل كلمة المرور لتأكيد مسح الحساب') }}
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                {{ __('كلمة المرور') }}
                            </label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('كلمة المرور') }}"
                                required
                            >
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            {{ __('الغاء') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ __('مسح الحساب') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
