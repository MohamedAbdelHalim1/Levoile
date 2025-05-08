@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white shadow sm:rounded-lg p-4">
            <h4>قائمة المنتجات</h4>

            <form method="GET" class="mb-4 d-flex gap-2 align-items-center">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="ابحث باستخدام الاسم - الجملة - الكود">
                <button type="submit" class="btn btn-primary">ابحث</button>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>صورة</th>
                            <th>كود المنتج</th>
                            <th>الاسم</th>
                            <th>الجملة</th>
                            <th>السعر</th>
                            <th>الألوان</th>
                            <th>المقاسات</th>
                            <th>الكمية</th>
                            <th>التفاصيل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $group)
                            @php
                                $parent = $group->first();
                                $mainImage = $group->firstWhere('image_url')?->image_url;
                                $colors = $group->groupBy('color')->count();
                                $sizes = $group->groupBy('size')->count();
                                $totalQty = $group->sum('quantity');
                            @endphp
                            <tr>
                                <td>
                                    @if ($mainImage)
                                        <img src="{{ $mainImage }}" width="60" height="60"
                                            style="object-fit: contain">
                                    @endif
                                </td>
                                <td>{{ $parent->product_code }}</td>
                                <td>{{ $parent->description }}</td>
                                <td>{{ $parent->gomla }}</td>
                                <td>{{ $parent->unit_price }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-info"
                                        onclick="showColors(@json($group))">{{ $colors }}</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-info"
                                        onclick="showSizes(@json($group))">{{ $sizes }}</a>
                                </td>
                                <td>{{ $totalQty }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="showDetails(@json($group))">
                                        عرض
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">لا توجد منتجات</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $pagination->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تفاصيل المنتج</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="modalContent" class="row"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function showColors(group) {
        const uniqueColors = [...new Set(group.map(item => item.color))];
        const html = uniqueColors.map(color => `<div class='col-md-4 mb-2'><strong>${color}</strong></div>`).join('');
        document.getElementById('modalContent').innerHTML = html;
        new bootstrap.Modal(document.getElementById('detailModal')).show();
    }

    function showSizes(group) {
        const uniqueSizes = [...new Set(group.map(item => item.size))];
        const html = uniqueSizes.map(size => `<div class='col-md-4 mb-2'><strong>${size}</strong></div>`).join('');
        document.getElementById('modalContent').innerHTML = html;
        new bootstrap.Modal(document.getElementById('detailModal')).show();
    }

    function showDetails(group) {
        const html = group.map(item => `
            <div class='col-md-6 mb-3'>
                <div class='border p-2 rounded'>
                    <img src="${item.image_url}" class="img-fluid mb-2" style="max-height:100px;object-fit:contain">
                    <div><strong>No:</strong> ${item.no_code}</div>
                    <div><strong>Color:</strong> ${item.color}</div>
                    <div><strong>Size:</strong> ${item.size}</div>
                    <div><strong>Qty:</strong> ${item.quantity}</div>
                </div>
            </div>
        `).join('');

        document.getElementById('modalContent').innerHTML = html;
        new bootstrap.Modal(document.getElementById('detailModal')).show();
    }
</script>
@endsection
