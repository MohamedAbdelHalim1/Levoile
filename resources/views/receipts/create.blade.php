@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-3">{{ __('messages.received_quantity') }} : طلب رقم #{{ $req->id }} —
                    {{ $req->material->name }}</h4>
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="receive-form" action="{{ route('requests.receive.store', $req->id) }}" method="POST">
                    @csrf

                    <input type="hidden" name="partial_policy" id="partial_policy" value="">

                    <div class="form-check {{ app()->getLocale() == 'ar' ? 'form-check-reverse' : '' }} mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="increase_current"
                            name="increase_current">
                        <label class="form-check-label mb-0 {{ app()->getLocale() == 'ar' ? 'ms-5' : '' }}"
                            for="increase_current">
                            {{ __('messages.increase_current_quantity_automatically') }}
                        </label>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('messages.name') }}</th>
                                    <th>{{ __('messages.required_quantity') }}</th>
                                    <th>تم استلامه</th>
                                    <th>المتبقي</th>
                                    <th>{{ __('messages.received_quantity') }}</th>
                                    <th>{{ __('messages.unit') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($req->items as $index => $item)
                                    @php
                                        $received = $item->receiptItems->sum('quantity');
                                        $remaining = max(($item->required_quantity ?? 0) - $received, 0);
                                        $rowDisabled = $item->status === 'complete' || $remaining <= 0;
                                        $lastReceipt = optional($item->receiptItems->sortByDesc('id')->first())
                                            ->quantity;
                                        $fixedUnit = $item->unit ?: $item->color->unit_of_current_quantity ?? null;
                                    @endphp
                                    <tr class="js-row">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->color->name }} ({{ $item->color->code ?? '-' }})</td>
                                        <td>{{ number_format($item->required_quantity, 3) }} {{ $item->unit }}</td>
                                        <td class="js-sum-received" data-sum="{{ (float) ($received ?: 0) }}">
                                            {{ number_format($received ?: 0, 3) }} {{ $item->unit }}
                                        </td>
                                        <td class="js-remaining">
                                            {{ number_format($remaining, 3) }} {{ $item->unit }}
                                            <input type="hidden" class="js-remaining-val" value="{{ $remaining }}">
                                        </td>

                                        <td style="min-width:140px">
                                            <input type="hidden" name="items[{{ $index }}][id]"
                                                value="{{ $item->id }}">
                                            <input type="number" step="any" class="form-control js-received-input"
                                                name="items[{{ $index }}][received_quantity]"
                                                value="{{ $rowDisabled ? $lastReceipt ?? '' : old('items.' . $index . '.received_quantity') }}"
                                                placeholder="0.00" {{ $rowDisabled ? 'disabled' : '' }}>
                                        </td>

                                        <td style="min-width:130px">
                                            @if ($fixedUnit)
                                                <input type="hidden" name="items[{{ $index }}][unit]"
                                                    value="{{ $fixedUnit }}">
                                                <select class="form-control" disabled>
                                                    <option value="kg" @selected($fixedUnit === 'kg')>
                                                        {{ __('messages.kg') }}</option>
                                                    <option value="meter" @selected($fixedUnit === 'meter')>
                                                        {{ __('messages.meter') }}</option>
                                                </select>
                                            @else
                                                <select class="form-control" name="items[{{ $index }}][unit]"
                                                    {{ $rowDisabled ? 'disabled' : '' }}>
                                                    <option value="" @selected(old('items.' . $index . '.unit') == '')>-</option>
                                                    <option value="kg" @selected(old('items.' . $index . '.unit') == 'kg')>
                                                        {{ __('messages.kg') }}</option>
                                                    <option value="meter" @selected(old('items.' . $index . '.unit') == 'meter')>
                                                        {{ __('messages.meter') }}</option>
                                                </select>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                        <a href="{{ route('requests.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                    </div>
                </form>

                {{-- Modal تأكيد للبنود اللي فيها استلام أقل من المتبقي --}}
                <div class="modal fade" id="partialConfirmModal" tabindex="-1" aria-labelledby="partialConfirmLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="partialConfirmLabel">تأكيد للبنود غير المكتملة</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                لديك بنود أدخلت لها كمية أقل من المتبقي.
                                <br> هل تريد:
                                <ul class="mt-2 mb-0">
                                    <li>اعتبارها <strong>مكتملة</strong> بهذه الكمية (لن يمكن الاستلام عليها لاحقًا)</li>
                                    <li>أو إنشاء <strong>بند جديد</strong> للكمية المتبقية واستمرار البند الحالي كمكتمل؟
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btn-partial-complete" class="btn btn-success">اعتبرها
                                    مكتملة</button>
                                <button type="button" id="btn-partial-split" class="btn btn-warning">إنشاء بند جديد
                                    للباقي</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('receive-form');
            const partialPolicyInput = document.getElementById('partial_policy');
            let modalInstance = null;

            form.addEventListener('submit', function(e) {
                // لو سبق واخترنا سياسة، سيب الفورم يكمل
                if (partialPolicyInput.value) return;

                // اجمع البنود اللي فيها استلام < المتبقي و > 0
                const rows = Array.from(form.querySelectorAll('tr.js-row'));
                const partialRows = rows.filter(row => {
                    const remaining = parseFloat(row.querySelector('.js-remaining-val').value ||
                        '0');
                    const input = row.querySelector('.js-received-input');
                    if (!input || input.disabled) return false;
                    const val = parseFloat(input.value || '0');
                    return (val > 0) && (val < remaining);
                });

                if (partialRows.length > 0) {
                    e.preventDefault();
                    const modalEl = document.getElementById('partialConfirmModal');
                    // Bootstrap Modal
                    modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
                    modalInstance.show();

                    document.getElementById('btn-partial-complete').onclick = () => {
                        partialPolicyInput.value = 'complete'; // اعتبر الكل مكتمل
                        modalInstance.hide();
                        form.submit();
                    };
                    document.getElementById('btn-partial-split').onclick = () => {
                        partialPolicyInput.value = 'split'; // اعمل بنود جديدة للباقي
                        modalInstance.hide();
                        form.submit();
                    };
                }
            }, {
                passive: false
            });
        });
    </script>
@endsection
