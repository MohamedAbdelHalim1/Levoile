@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-primary" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">المنتجات الجاهزة للتصوير</h4>

                <div class="table-responsive">
                    <form method="POST" action="{{ route('ready-to-shoot.start') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="checkbox" id="checkAll"> <label for="checkAll">تحديد الكل</label>
                        </div>
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead class="table-light">
                                <tr>
                                    <th>اختيار</th>
                                    <th>اسم المنتج</th>
                                    <th>عدد الألوان</th>
                                    <th>الكود</th>
                                    <th>الوصف</th>
                                    <th>الكمية</th>
                                    <th>نوع التصوير</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $grouped = $readyItems->groupBy('shooting_product_id'); @endphp

                                @foreach ($grouped as $productId => $items)
                                    @php $product = $items->first()->shootingProduct; @endphp
                                    @foreach ($items as $index => $item)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="selected_ready_ids[]"
                                                    value="{{ $item->id }}" data-type="{{ $item->type_of_shooting }}">
                                            </td>
                                            @if ($index === 0)
                                                <td rowspan="{{ $items->count() }}">{{ $product->name }}</td>
                                                <td rowspan="{{ $items->count() }}">
                                                    {{ $items->groupBy('item_no')->count() }}
                                                </td>
                                            @endif
                                            <td>{{ $item->item_no }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->type_of_shooting ?? '-' }}</td>
                                            <td><span class="badge bg-warning">{{ $item->status }}</span></td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>

                        <button type="submit" class="btn btn-success mt-3" id="startShootingBtn" style="display:none;">بدء
                            التصوير</button>
                    </form>
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
        document.getElementById('checkAll').addEventListener('change', function() {
            const checked = this.checked;
            document.querySelectorAll('input[name="selected_ready_ids[]"]').forEach(cb => cb.checked = checked);
            toggleStartButton();
        });

        document.querySelectorAll('input[name="selected_ready_ids[]"]').forEach(cb => {
            cb.addEventListener('change', toggleStartButton);
        });

        function toggleStartButton() {
            const selected = [...document.querySelectorAll('input[name="selected_ready_ids[]"]:checked')];
            const types = new Set(selected.map(cb => cb.dataset.type));

            if (selected.length > 0) {
                if (types.size > 1) {
                    alert('يجب اختيار عناصر من نفس نوع التصوير فقط');
                    document.getElementById('startShootingBtn').style.display = 'none';
                } else {
                    document.getElementById('startShootingBtn').style.display = 'inline-block';
                }
            } else {
                document.getElementById('startShootingBtn').style.display = 'none';
            }
        }
    </script>
@endsection
