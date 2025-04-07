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


                <h4>منتجات السوشيال ميديا</h4>

                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>اسم المنتج</th>
                            <th>الحالة</th>
                            <th>تاريخ النشر</th>
                            <th>المنصات</th>
                            <th>نوع المنشور</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->websiteAdminProduct->name ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $item->status == 'done' ? 'success' : 'warning' }}">
                                        {{ $item->status == 'done' ? 'تم النشر' : 'جديد' }}
                                    </span>
                                </td>

                                <td>
                                    @if ($item->platforms && $item->platforms->count())
                                        <ul class="list-unstyled mb-0">
                                            @foreach ($item->platforms as $platform)
                                                <li>
                                                    @php
                                                        $published = \Carbon\Carbon::parse($platform->publish_date);
                                                    @endphp
                                
                                                    @if ($published->isToday())
                                                        اليوم الساعة {{ $published->format('h:i A') }}
                                                    @elseif ($published->isYesterday())
                                                        أمس الساعة {{ $published->format('h:i A') }}
                                                    @elseif ($published->isTomorrow())
                                                        غدًا الساعة {{ $published->format('h:i A') }}
                                                    @else
                                                        {{ $published->translatedFormat('l d M Y') }} الساعة {{ $published->format('h:i A') }}
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        -
                                    @endif
                                </td>

                                
                                <td>
                                    @if ($item->platforms && $item->platforms->count())
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach ($item->platforms as $platform)
                                                <span class="badge bg-primary">
                                                    {{ ucfirst($platform->platform) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        -
                                    @endif
                                </td>
                                
                               
                                
                                <td>
                                    @if ($item->platforms && $item->platforms->count())
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach ($item->platforms as $platform)
                                                <span class="badge bg-info text-dark">{{ ucfirst($platform->type) }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        -
                                    @endif
                                </td>

                                

                                <td>
                                    @if ($item->status == 'new')
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#publishModal" data-id="{{ $item->id }}"
                                            data-name="{{ $item->websiteAdminProduct->name }}">
                                            نشر
                                        </button>
                                    @elseif ($item->status == 'done')
                                        @if (auth()->user()->role->name === 'admin')
                                            <form method="POST" action="{{ route('social-media.reopen') }}" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('هل أنت متأكد من إعادة الفتح؟')">إعادة الفتح</button>
                                            </form>
                                        @else
                                            <span class="badge bg-success">تم</span>
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
                        <h5 class="modal-title">تأكيد النشر</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>هل أنت متأكد من نشر المنتج <strong id="modal_product_name"></strong>؟</p>

                        {{-- Platform: Facebook --}}
                        <div class="mb-2">
                            <input type="checkbox" id="facebook_cb" name="platforms[facebook][active]">
                            <label for="facebook_cb">Facebook</label>

                            <div class="mt-2 platform-options d-none" id="facebook_options">
                                <label>تاريخ النشر</label>
                                <input type="datetime-local" name="platforms[facebook][publish_date]" class="form-control">

                                <label class="mt-2">نوع المنشور</label>
                                <select name="platforms[facebook][type]" class="form-select">
                                    <option value="post">منشور</option>
                                    <option value="story">قصة</option>
                                    <option value="reel">ريل</option>
                                </select>
                            </div>
                        </div>

                        {{-- Platform: Instagram --}}
                        <div class="mb-2">
                            <input type="checkbox" id="instagram_cb" name="platforms[instagram][active]">
                            <label for="instagram_cb">Instagram</label>

                            <div class="mt-2 platform-options d-none" id="instagram_options">
                                <label>تاريخ النشر</label>
                                <input type="datetime-local" name="platforms[instagram][publish_date]" class="form-control">

                                <label class="mt-2">نوع المنشور</label>
                                <select name="platforms[instagram][type]" class="form-select">
                                    <option value="post">منشور</option>
                                    <option value="story">قصة</option>
                                    <option value="reel">ريل</option>
                                </select>
                            </div>
                        </div>

                        {{-- Platform: TikTok --}}
                        <div class="mb-2">
                            <input type="checkbox" id="tiktok_cb" name="platforms[tiktok][active]">
                            <label for="tiktok_cb">TikTok</label>

                            <div class="mt-2 platform-options d-none" id="tiktok_options">
                                <label>تاريخ النشر</label>
                                <input type="datetime-local" name="platforms[tiktok][publish_date]" class="form-control">

                                <label class="mt-2">نوع المنشور</label>
                                <select name="platforms[tiktok][type]" class="form-select">
                                    <option value="post">منشور</option>
                                    <option value="story">قصة</option>
                                    <option value="reel">ريل</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تأكيد</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    </div>
                </div>
            </form>
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
@endsection
