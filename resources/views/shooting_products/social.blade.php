@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="bg-white p-4 shadow-sm rounded">
            <div class="bg-white shadow sm:rounded-lg p-4">

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
                                <td>{{ $item->publish_datetime?->format('Y-m-d h:i A') ?? '-' }}</td>
                                <td>
                                    @if ($item->platforms)
                                        {{ implode(', ', $item->platforms) }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $item->post_type ?? '-' }}</td>
                                <td>
                                    @if ($item->status == 'new')
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#publishModal" data-id="{{ $item->id }}"
                                            data-name="{{ $item->websiteAdminProduct->name }}">
                                            نشر
                                        </button>
                                    @else
                                        <span class="badge bg-success">تم</span>
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

                        <label>اختر المنصات</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="platforms[]" value="facebook"
                                id="facebook">
                            <label class="form-check-label" for="facebook">Facebook</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="platforms[]" value="instagram"
                                id="instagram">
                            <label class="form-check-label" for="instagram">Instagram</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="platforms[]" value="tiktok"
                                id="tiktok">
                            <label class="form-check-label" for="tiktok">TikTok</label>
                        </div>

                        <div class="mb-3 mt-3">
                            <label>تاريخ النشر</label>
                            <input type="datetime-local" name="publish_datetime" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>نوع المنشور</label>
                            <select name="post_type" class="form-select">
                                <option value="post">منشور</option>
                                <option value="story">ستوري</option>
                                <option value="reel">ريل</option>
                            </select>
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
        const modal = document.getElementById('publishModal');
        modal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');

            document.getElementById('modal_product_id').value = id;
            document.getElementById('modal_product_name').textContent = name;
        });
    </script>
@endsection
