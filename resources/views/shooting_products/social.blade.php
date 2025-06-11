@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="bg-white p-4 shadow-sm rounded">
            <div class="bg-white shadow sm:rounded-lg p-4">

                @if ($errors->has('platforms'))
                    <div class="alert alert-danger">
                        {{ $errors->first('platforms') }}
                    </div>
                @endif


                <h4>{{ __('messages.social_media_products') }}</h4>
                <div class="mb-3 text-end">
                    <a href="{{ route('social-media.calendar') }}"
                        class="btn btn-secondary">{{ __('messages.posting_plan') }}</a>
                </div>

                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>{{ __('messages.name') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.platforms') }}</th>
                            <th>{{ __('messages.operations') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->websiteAdminProduct->name ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $item->status == 'done' ? 'success' : 'warning' }}">
                                        {{ $item->status == 'done' ? __('messages.published') : __('messages.new') }}
                                    </span>
                                </td>

                                <td>
                                    @php $platformCount = $platforms->has($item->id) ? $platforms[$item->id]->count() : 0; @endphp
                                    @if ($platformCount)
                                        <a href="#" class="badge bg-info" data-bs-toggle="modal"
                                            data-bs-target="#platformsModal" data-product-id="{{ $item->id }}">
                                            {{ $platformCount }} {{ __('messages.platforms') }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    @if ($item->status == 'new')
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#publishModal" data-id="{{ $item->id }}"
                                            data-name="{{ $item->websiteAdminProduct->name }}">
                                            {{ __('messages.publish') }}
                                        </button>
                                    @elseif ($item->status == 'done')
                                        @if (auth()->user()->role->name === 'admin')
                                            <form method="POST" action="{{ route('social-media.reopen') }}"
                                                class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-sm btn-warning"
                                                    onclick="return confirm('{{ __('messages.are_you_sure') }}')">
                                                    {{ __('messages.reopen') }}</button>
                                            </form>
                                        @else
                                            <span class="badge bg-success">{{ __('messages.published') }}</span>
                                        @endif
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="publishModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('social-media.publish') }}">
                @csrf
                <input type="hidden" name="id" id="modal_product_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.publish') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('messages.are_you_sure_to_publish') }}<strong id="modal_product_name"></strong></p>

                        {{-- Platform: Facebook --}}
                        <div class="mb-2">
                            <input type="checkbox" id="facebook_cb" name="platforms[facebook][active]">
                            <label for="facebook_cb">Facebook</label>

                            <div class="mt-2 platform-options d-none" id="facebook_options">
                                <label> {{ __('messages.published_at') }}</label>
                                <input type="datetime-local" name="platforms[facebook][publish_date]" class="form-control">

                                <label class="mt-2">{{ __('messages.post_type') }}</label>
                                <select name="platforms[facebook][type]" class="form-select">
                                    <option value="post">{{ __('messages.post') }}</option>
                                    <option value="story">{{ __('messages.story') }}</option>
                                    <option value="reel">{{ __('messages.reel') }}</option>
                                </select>
                            </div>
                        </div>

                        {{-- Platform: Instagram --}}
                        <div class="mb-2">
                            <input type="checkbox" id="instagram_cb" name="platforms[instagram][active]">
                            <label for="instagram_cb">Instagram</label>

                            <div class="mt-2 platform-options d-none" id="instagram_options">
                                <label>{{ __('messages.published_at') }}</label>
                                <input type="datetime-local" name="platforms[instagram][publish_date]" class="form-control">

                                <label class="mt-2">{{ __('messages.post_type') }} </label>
                                <select name="platforms[instagram][type]" class="form-select">
                                    <option value="post">{{ __('messages.post') }}</option>
                                    <option value="story">{{ __('messages.story') }}</option>
                                    <option value="reel">{{ __('messages.reel') }}</option>
                                </select>
                            </div>
                        </div>

                        {{-- Platform: TikTok --}}
                        <div class="mb-2">
                            <input type="checkbox" id="tiktok_cb" name="platforms[tiktok][active]">
                            <label for="tiktok_cb">TikTok</label>

                            <div class="mt-2 platform-options d-none" id="tiktok_options">
                                <label>{{ __('messages.published_at') }} </label>
                                <input type="datetime-local" name="platforms[tiktok][publish_date]" class="form-control">

                                <label class="mt-2">{{ __('messages.post_type') }} </label>
                                <select name="platforms[tiktok][type]" class="form-select">
                                    <option value="post">{{ __('messages.post') }}</option>
                                    <option value="story">{{ __('messages.story') }}</option>
                                    <option value="reel">{{ __('messages.reel') }}</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __('messages.publish') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal عرض تفاصيل المنصات -->
    <div class="modal fade" id="platformsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.platforms') }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('messages.platform') }}</th>
                                <th>{{ __('messages.post_date') }} </th>
                                <th>{{ __('messages.published_at') }} </th>
                            </tr>
                        </thead>
                        <tbody id="platformsTableBody">
                            <!-- Dynamic content -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>
    @vite('resources/assets/js/select2.js')

    <!-- DATA TABLE JS -->
    <script src="{{ asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    @vite('resources/assets/js/table-data.js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const platforms = ['facebook', 'instagram', 'tiktok'];

            platforms.forEach(platform => {
                const checkbox = document.getElementById(`${platform}_cb`);
                const options = document.getElementById(`${platform}_options`);

                checkbox?.addEventListener('change', function() {
                    if (this.checked) {
                        options.classList.remove('d-none');
                    } else {
                        options.classList.add('d-none');
                    }
                });
            });
        });

        document.getElementById('publishModal').addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');

            document.getElementById('modal_product_id').value = id;
            document.getElementById('modal_product_name').textContent = name;
        });
    </script>
    <script>
        const translations = {
            today: "{{ __('messages.today_at') }}",
            yesterday: "{{ __('messages.yesterday_at') }}",
            tomorrow: "{{ __('messages.tomorrow_at') }}",
            at: "{{ __('messages.at') }}"
        };

        const currentLang = "{{ auth()->user()->current_lang }}";
    </script>

    <script>
        const allPlatforms = @json($platforms);

        const platformsModal = document.getElementById('platformsModal');
        platformsModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const productId = button.getAttribute('data-product-id');
            const productPlatforms = allPlatforms[productId] || [];

            const tableBody = document.getElementById('platformsTableBody');
            tableBody.innerHTML = '';

            productPlatforms.forEach(platform => {
                const publishDate = new Date(platform.publish_date);
                const now = new Date();

                const publishDateMidnight = new Date(publishDate);
                publishDateMidnight.setHours(0, 0, 0, 0);

                const nowMidnight = new Date(now);
                nowMidnight.setHours(0, 0, 0, 0);

                const diff = publishDateMidnight - nowMidnight;

                const time = publishDate.toLocaleTimeString(currentLang === 'ar' ? 'ar-EG' : 'en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });

                let dateText = '';
                if (diff === 0) {
                    dateText = `${translations.today} ${time}`;
                } else if (diff === -86400000) {
                    dateText = `${translations.yesterday} ${time}`;
                } else if (diff === 86400000) {
                    dateText = `${translations.tomorrow} ${time}`;
                } else {
                    dateText = `${publishDate.toLocaleDateString(currentLang === 'ar' ? 'ar-EG' : 'en-US', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric'
                })} ${translations.at} ${time}`;
                }

                tableBody.innerHTML += `
                <tr>
                    <td>${platform.platform}</td>
                    <td>${platform.type}</td>
                    <td>${dateText}</td>
                </tr>
            `;
            });
        });
    </script>



    {{-- <script>
        const allPlatforms = @json($platforms);

        const platformsModal = document.getElementById('platformsModal');
        platformsModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const productId = button.getAttribute('data-product-id');
            const productPlatforms = allPlatforms[productId] || [];

            const tableBody = document.getElementById('platformsTableBody');
            tableBody.innerHTML = '';

            productPlatforms.forEach(platform => {
                const published = new Date(platform.publish_date);
                const now = new Date();
                const diff = published.setHours(0, 0, 0, 0) - now.setHours(0, 0, 0, 0);

                let dateText = '';
                if (diff === 0) {
                    dateText =
                        `اليوم الساعة ${new Date(platform.publish_date).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true })}`;
                } else if (diff === -86400000) {
                    dateText =
                        `أمس الساعة ${new Date(platform.publish_date).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true })}`;
                } else if (diff === 86400000) {
                    dateText =
                        `غدًا الساعة ${new Date(platform.publish_date).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true })}`;
                } else {
                    const date = new Date(platform.publish_date);
                    dateText =
                        `${date.toLocaleDateString('ar-EG', { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric' })} الساعة ${date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true })}`;
                }

                tableBody.innerHTML += `
                <tr>
                    <td>${platform.platform}</td>
                    <td>${platform.type}</td>
                    <td>${dateText}</td>
                </tr>
            `;
            });
        });
    </script> --}}
@endsection
