@extends('layouts.app')

@section('content')
<style>
  .badge-soft {
    --bg: rgba(0,0,0,.06);
    background: var(--bg);
    border: 1px solid rgba(0,0,0,.08);
    padding: .35rem .6rem;
    border-radius: .65rem;
    font-weight: 600;
  }
  .badge-soft-success { --bg: rgba(25,135,84,.08); color:#198754; border-color: rgba(25,135,84,.25); }
  .badge-soft-warning { --bg: rgba(255,193,7,.10); color:#b08900; border-color: rgba(255,193,7,.35); }
  .badge-soft-secondary { --bg: rgba(108,117,125,.10); color:#6c757d; border-color: rgba(108,117,125,.3); }
  .card-glass {
    border: 1px solid rgba(0,0,0,.06);
    box-shadow: 0 8px 24px rgba(0,0,0,.06);
    border-radius: 14px;
  }
  .metric {
    display: grid; gap:.25rem;
  }
  .metric .label { color:#6b7280; font-size:.85rem; }
  .metric .value { font-weight:700; font-size:1.1rem; }
  .timeline {
    position: relative; padding-inline-start: 1.25rem;
  }
  .timeline::before {
    content:""; position:absolute; inset-inline-start:.45rem; top:.25rem; bottom:.25rem;
    width:2px; background:linear-gradient(#e5e7eb, #d1d5db);
    border-radius:1px;
  }
  .t-item { position:relative; padding:.5rem 0 .5rem 1rem; }
  .t-item::before {
    content:""; position:absolute; inset-inline-start:-.15rem; top:.9rem;
    width:.7rem; height:.7rem; background:#fff; border:2px solid #0d6efd; border-radius:50%;
  }
</style>

<div class="p-2">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

    <div class="bg-white card-glass p-4">
      <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
        <div>
          <h4 class="mb-1">
            تفاصيل الطلب #{{ $req->id }} — {{ $req->material->name }}
          </h4>
          <div class="text-muted">
            <span title="{{ optional($req->requested_at ?? $req->created_at)->format('Y-m-d H:i') }}">
              {{ optional($req->requested_at ?? $req->created_at)->diffForHumans() }}
            </span>
          </div>
        </div>

        @php
          $statusClass = [
            'open' => 'badge-soft-secondary',
            'partial' => 'badge-soft-warning',
            'complete' => 'badge-soft-success',
          ][$req->status] ?? 'badge-soft-secondary';
        @endphp
        <span class="badge-soft {{ $statusClass }}">{{ $req->status }}</span>
      </div>

      <hr class="my-4">

      <div class="row g-3">
        <div class="col-sm-6 col-lg-3">
          <div class="metric">
            <span class="label">عدد البنود</span>
            <span class="value">{{ $totalItems }}</span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="metric">
            <span class="label">بنود مكتملة</span>
            <span class="value">{{ $completedCount }} / {{ $totalItems }}</span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="metric">
            <span class="label">إجمالي المطلوب</span>
            <span class="value">{{ number_format($totRequired,3) }}</span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="metric">
            <span class="label">إجمالي المستلم</span>
            <span class="value">{{ number_format($totReceived,3) }}</span>
          </div>
        </div>
      </div>

      <div class="mt-2">
        <div class="metric">
          <span class="label">المتبقي</span>
          <span class="value">{{ number_format($totRemaining,3) }}</span>
        </div>
      </div>

      <div class="d-flex gap-2 mt-4">
        <a href="{{ route('requests.index') }}" class="btn btn-outline-secondary">رجوع</a>
        @if($req->status !== 'complete')
          <a href="{{ route('requests.receive.form', $req->id) }}" class="btn btn-primary">متابعة الاستلام</a>
        @endif
      </div>
    </div>

    <!-- بنود الطلب -->
    <div class="bg-white card-glass p-4">
      <h5 class="mb-3">بنود الطلب</h5>
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>اللون</th>
              <th>الكود</th>
              <th class="text-center">المطلوب</th>
              <th class="text-center">تم استلامه</th>
              <th class="text-center">المتبقي</th>
              <th class="text-center">الحالة</th>
            </tr>
          </thead>
          <tbody>
            @foreach($req->items as $idx => $it)
              @php
                $received = $it->receiptItems->sum('quantity');
                $remaining = max(($it->required_quantity ?? 0) - $received, 0);
              @endphp
              <tr>
                <td>{{ $idx+1 }}</td>
                <td>{{ $it->color->name }}</td>
                <td>{{ $it->color->code ?? '-' }}</td>
                <td class="text-center">{{ number_format($it->required_quantity,3) }} {{ $it->unit }}</td>
                <td class="text-center">{{ number_format($received,3) }} {{ $it->unit }}</td>
                <td class="text-center">{{ number_format($remaining,3) }} {{ $it->unit }}</td>
                <td class="text-center">
                  @php
                    $b = ['complete'=>'success','partial'=>'warning text-dark','pending'=>'secondary'][$it->status] ?? 'secondary';
                  @endphp
                  <span class="badge bg-{{ $b }}">{{ $it->status }}</span>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- سجلّ الاستلامات -->
    <div class="bg-white card-glass p-4">
      <h5 class="mb-3">سجلّ الاستلامات</h5>

      @if($req->receipts->isEmpty())
        <div class="text-muted">لا توجد عمليات استلام بعد.</div>
      @else
        <div class="timeline">
          @foreach($req->receipts as $rcpt)
            @php
              $sumQty = $rcpt->items->sum('quantity');
              $itemsCount = $rcpt->items->count();
            @endphp
            <div class="t-item">
              <div class="d-flex justify-content-between flex-wrap gap-2">
                <div>
                  <strong>استلام #{{ $rcpt->id }}</strong>
                  <div class="text-muted small">
                    <span title="{{ optional($rcpt->received_at ?? $rcpt->created_at)->format('Y-m-d H:i') }}">
                      {{ optional($rcpt->received_at ?? $rcpt->created_at)->diffForHumans() }}
                    </span>
                    • عناصر: {{ $itemsCount }} • إجمالي: {{ number_format($sumQty,3) }}
                  </div>
                </div>
                @if($rcpt->increase_current)
                  <span class="badge-soft badge-soft-success">تم زيادة المخزون</span>
                @endif
              </div>

              @if($rcpt->items->isNotEmpty())
                <div class="table-responsive mt-2">
                  <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light">
                      <tr>
                        <th>اللون</th>
                        <th>الكود</th>
                        <th>الكمية</th>
                        <th>الوحدة</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($rcpt->items as $rit)
                        <tr>
                          <td>{{ $rit->color->name ?? '-' }}</td>
                          <td>{{ optional($rit->color)->code ?? '-' }}</td>
                          <td>{{ number_format($rit->quantity,3) }}</td>
                          <td>{{ $rit->unit }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          @endforeach
        </div>
      @endif
    </div>

  </div>
</div>
@endsection
