@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>منتجات مسؤول الموقع</h4>

                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>اسم المنتج</th>
                            <th>الحالة</th>
                            <th>الالوان</th>
                            <th>لينك الدرايف</th>
                            <th>تاريخ النشر</th>
                            <th>الملاحظات</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <span class="badge bg-{{ $item->status == 'done' ? 'success' : 'warning' }}">
                                        {{ $item->status == 'done' ? 'تم النشر' : 'جديد' }}
                                    </span>
                                </td>
                                <td>{{ $item->shootingProduct->number_of_colors }}</td>
                                <td class="text-center">
                                    @if (!empty($item->shootingProduct->drive_link))
                                        <a href="{{ $item->shootingProduct->drive_link }}" target="_blank"
                                            class="text-success">
                                            <i class="fe fe-link"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($item->published_at)
                                        @php
                                            $published = \Carbon\Carbon::parse($item->published_at);
                                            $now = \Carbon\Carbon::now();
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
                                    @else
                                        -
                                    @endif
                                </td>                                
                                <td>{{ $item->note ?? '-' }}</td>
                                <td>
                                    @if ($item->status == 'new')
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#confirmModal" data-id="{{ $item->id }}"
                                            data-name="{{ $item->name }}">
                                            نشر
                                        </button>
                                    @elseif ($item->status == 'done')
                                        @if (auth()->user()->role->name == 'admin')
                                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#reopenModal" data-id="{{ $item->id }}"
                                                data-name="{{ $item->name }}">
                                                إعادة الفتح
                                            </button>
                                        @else
                                            <span class="badge bg-success">تم النشر</span>
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
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('website-admin.update-status') }}">
                @csrf
                <input type="hidden" name="id" id="modal_product_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تأكيد النشر</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>هل أنت متأكد أنك تريد نشر المنتج <strong id="modal_product_name"></strong>؟</p>
                        <div class="mb-3">
                            <label>تاريخ ووقت النشر</label>
                            <input type="datetime-local" name="published_at" class="form-control" required>
                        </div>                        
                        <div class="mb-3">
                            <label>ملاحظات</label>
                            <textarea name="note" class="form-control" rows="3"></textarea>
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

    <!-- Modal إعادة الفتح -->
    <div class="modal fade" id="reopenModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('website-admin.reopen') }}">
                @csrf
                <input type="hidden" name="id" id="reopen_product_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تأكيد إعادة الفتح</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>هل أنت متأكد أنك تريد إعادة فتح المنتج <strong id="reopen_product_name"></strong>؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">تأكيد</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- SELECT2 JS -->
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
        const modal = document.getElementById('confirmModal');
        modal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');

            document.getElementById('modal_product_id').value = id;
            document.getElementById('modal_product_name').textContent = name;
        });
    </script>
    <script>
        const reopenModal = document.getElementById('reopenModal');
        reopenModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');

            document.getElementById('reopen_product_id').value = id;
            document.getElementById('reopen_product_name').textContent = name;
        });
    </script>
@endsection
