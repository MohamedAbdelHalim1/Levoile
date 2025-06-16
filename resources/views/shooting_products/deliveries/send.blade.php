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

                <h4 class="mb-4"> {{ __('messages.send_file_to_shooting') }} : {{ $delivery->filename }}</h4>

                <form method="POST" action="{{ route('shooting-deliveries.send.save', $delivery->id) }}">
                    @csrf

                    {{-- <div class="mb-3">
                        <input type="checkbox" id="checkAll"> <label for="checkAll">تحديد الكل</label>
                    </div> --}}

                    <div class="mb-3">
                        <input type="checkbox" id="checkAllNew"> <label
                            for="checkAllNew">{{ __('messages.check_all_new') }}</label>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('messages.code') }}</th>
                                    <th>{{ __('messages.description') }}</th>
                                    <th>{{ __('messages.quantity') }}</th>
                                    <th>{{ __('messages.code') }}</th>
                                    <th>{{ __('messages.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $itemNos = array_count_values(
                                        array_filter(
                                            array_map(
                                                fn($r) => is_scalar($r['A'] ?? null) ? (string) $r['A'] : null,
                                                $rows,
                                            ),
                                        ),
                                    );
                                @endphp


                                @foreach ($rows as $index => $row)
                                    @php
                                        $itemNo = $row['A'] ?? '';
                                        $description = $row['B'] ?? '';
                                        $quantity = $row['C'] ?? '';
                                        $primaryId = substr($itemNo, 3, 6);
                                    @endphp

                                    <tr>
                                        <td>
                                            {{-- <input type="checkbox" name="selected_rows[]" value="{{ $index }}"> --}}
                                            {{-- @if ($content = \App\Models\ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)->where('item_no', $itemNo)->first())
                                                @if ($content->status === 'new') --}}
                                            <input type="checkbox" name="selected_rows[]" value="{{ $index }}">
                                            {{-- @endif
                                            @endif --}}

                                            <input type="hidden" name="rows[{{ $index }}][item_no]"
                                                value="{{ $itemNo }}">
                                            <input type="hidden" name="rows[{{ $index }}][description]"
                                                value="{{ $description }}">
                                            <input type="hidden" name="rows[{{ $index }}][quantity]"
                                                value="{{ $quantity }}">
                                        </td>
                                        <td @if (!empty($itemNo) && ($itemNos[$itemNo] ?? 0) > 1) style="color:red" @endif>{{ $itemNo }}</td>
                                        <td>{{ $description }}</td>
                                        <td>{{ $quantity }}</td>
                                        <td>{{ $primaryId }}</td>
                                        <td>
                                            @if ($content = \App\Models\ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)->where('item_no', $itemNo)->first())
                                                @if ($content->status === 'new')
                                                    <span class="badge bg-success">{{ __('messages.new') }}</span>
                                                @elseif($content->status === 'old')
                                                    <span class="badge bg-warning">{{ __('messages.old') }}</span>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">{{ __('messages.publish') }}</button>
                    <a href="{{ route('shooting-deliveries.index') }}"
                        class="btn btn-secondary mt-3">{{ __('messages.cancel') }}</a>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // تحديد كل العناصر الجديدة فقط
        document.getElementById('checkAllNew').addEventListener('change', function() {
            document.querySelectorAll('input[name="selected_rows[]"]').forEach(checkbox => {
                checkbox.checked = false;
            });

            if (this.checked) {
                document.querySelectorAll('input[name="selected_rows[]"]').forEach(checkbox => {
                    checkbox.checked = true;
                });
            }
        });

        // تحقق قبل الإرسال
        document.querySelector('form').addEventListener('submit', function(e) {
            const selected = document.querySelectorAll('input[name="selected_rows[]"]:checked').length;
            if (selected == 0) {
                e.preventDefault();
                alert('{{ __('messages.select_at_least_one_item') }}');
            }
        });
    </script>
@endsection
