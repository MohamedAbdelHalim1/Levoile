@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <h4 class="mb-4">ارسال الشيت للتصوير: {{ $delivery->filename }}</h4>

                <form method="POST" action="{{ route('shooting-deliveries.send.save', $delivery->id) }}">
                    @csrf

                    {{-- <div class="mb-3">
                        <input type="checkbox" id="checkAll"> <label for="checkAll">تحديد الكل</label>
                    </div> --}}

                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>اختيار</th>
                                    <th>الكود</th>
                                    <th>الوصف</th>
                                    <th>الكمية</th>
                                    <th>الرقم الاساسي</th>
                                    <th>الحاله</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $itemNos = array_count_values(array_column($rows, 'A'));
                                @endphp

                                @foreach (array_slice($rows, 1) as $index => $row)
                                    @php
                                        $itemNo = $row['A'] ?? '';
                                        $description = $row['B'] ?? '';
                                        $quantity = $row['C'] ?? '';
                                        $primaryId = substr($itemNo, 3, 6);
                                    @endphp

                                    <tr>
                                        <td>
                                            {{-- <input type="checkbox" name="selected_rows[]" value="{{ $index }}"> --}}
                                            @if ($content = \App\Models\ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)->where('item_no', $itemNo)->first())
                                                @if ($content->status === 'new')
                                                    <input type="checkbox" name="selected_rows[]"
                                                        value="{{ $index }}">
                                                @endif
                                            @endif

                                            <input type="hidden" name="rows[{{ $index }}][item_no]"
                                                value="{{ $itemNo }}">
                                            <input type="hidden" name="rows[{{ $index }}][description]"
                                                value="{{ $description }}">
                                            <input type="hidden" name="rows[{{ $index }}][quantity]"
                                                value="{{ $quantity }}">
                                        </td>
                                        <td @if ($itemNos[$itemNo] > 1) style="color:red" @endif>{{ $itemNo }}
                                        </td>
                                        <td>{{ $description }}</td>
                                        <td>{{ $quantity }}</td>
                                        <td>{{ $primaryId }}</td>
                                        <td>
                                            @if ($content = \App\Models\ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)->where('item_no', $itemNo)->first())
                                                 @if($content->status === 'new')
                                                    <span class="badge bg-success">جديد</span>
                                                @elseif($content->status === 'old')
                                                    <span class="badge bg-warning">قديم</span>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">نشر المحدد للتصوير</button>
                    <a href="{{ route('shooting-deliveries.index') }}" class="btn btn-secondary mt-3">رجوع</a>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('checkAll').addEventListener('change', function() {
            document.querySelectorAll('input[name="selected_rows[]"]').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        document.querySelector('form').addEventListener('submit', function(e) {
            const selected = document.querySelectorAll('input[name="selected_rows[]"]:checked').length;
            if (selected == 0) {
                e.preventDefault();
                alert('يجب اختيار منتج واحد على الأقل قبل الارسال');
            }
        });
    </script>
@endsection
