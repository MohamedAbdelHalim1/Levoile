<section class="mb-5">
    <header>
        <h2 class="h5 text-dark">
            {{ __('messages.delete_account') }}
        </h2>
        <p class="mt-2 text-muted">
            {{ __('messages.delete_account_warning') }}
        </p>
    </header>

    <!-- Delete Account Button -->
    <button
        type="button"
        class="btn btn-danger mt-3"
        data-bs-toggle="modal"
        data-bs-target="#confirm-user-deletion-modal"
    >
        {{ __('messages.delete_account') }}
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
                            {{ __('messages.delete_account_confirmation') }}
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
                            {{ __('messages.enter_password') }}
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                {{ __('messages.password') }}
                            </label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('messages.password') }}"
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
                            {{ __('messages.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ __('messages.delete') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
