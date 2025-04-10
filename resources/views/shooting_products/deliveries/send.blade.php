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

                    <div class="mb-3">
                        <input type="checkbox" id="checkAll"> <label for="checkAll">تحديد الكل</label>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>اختيار</th>
                                    <th>Item No</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>PrimaryId</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $itemNos = array_count_values(array_column($rows, 'A'));
                                @endphp

                                @foreach (array_slice($rows, 1) as $index => $row)
                                    {{-- skip first row --}}
                                    @php
                                        $itemNo = $row['A'] ?? '';
                                        $description = $row['B'] ?? '';
                                        $quantity = $row['C'] ?? '';
                                        $primaryId = substr($itemNo, 3, 6);
                                    @endphp

                                    <tr>
                                        <td>
                                            <input type="checkbox" name="rows[{{ $index }}][item_no]"
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
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">ارسال المحدد للتصوير</button>
                    <a href="{{ route('shooting-deliveries.index') }}" class="btn btn-secondary mt-3">رجوع</a>
                </form>

            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    document.getElementById('checkAll').addEventListener('change', function () {
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    document.querySelector('form').addEventListener('submit', function (e) {
        const selected = document.querySelectorAll('input[type="checkbox"]:checked').length;
        if (selected <= 1) { // 1 ده عشان checkAll متحسبهوش
            e.preventDefault();
            alert('يجب اختيار منتج واحد على الأقل قبل الارسال');
        }
    });
</script>

@endsection
