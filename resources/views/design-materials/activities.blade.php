@extends('layouts.app')

@section('content')
<div class="p-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white shadow sm:rounded-lg p-4">
            <h3 class="mb-3">
                {{ __('messages.material_review') ?? 'مراجعة الخامة' }} :
                <strong>{{ $material->name }}</strong>
            </h3>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>{{ __('messages.type') ?? 'النوع' }}</th>
                            <th>{{ __('messages.notes') ?? 'الملاحظات' }}</th>
                            <th>{{ __('messages.action_by') ?? 'قام بها' }}</th>
                            <th>{{ __('messages.date') ?? 'التاريخ' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($activities as $i => $row)
                            <tr>
                                <td>{{ $activities->firstItem() + $i }}</td>
                                <td>
                                    @php
                                        $map = [
                                            'material_created'  => __('messages.created') ?? 'إنشاء',
                                            'material_updated'  => __('messages.updated') ?? 'تعديل',
                                            'material_deleted'  => __('messages.deleted') ?? 'حذف',
                                            'color_created'     => __('messages.color_created') ?? 'إضافة لون',
                                            'color_updated'     => __('messages.color_updated') ?? 'تعديل لون',
                                            'color_deleted'     => __('messages.color_deleted') ?? 'حذف لون',
                                            'request_quantity'  => __('messages.required_quantity') ?? 'طلب كمية',
                                            'receive_quantity'  => __('messages.received_quantity') ?? 'استلام كمية',
                                            'upload_image'      => __('messages.image') ?? 'صورة',
                                        ];
                                    @endphp
                                    <span class="badge bg-secondary">
                                        {{ $map[$row->action] ?? $row->action }}
                                    </span>
                                </td>
                                <td class="text-wrap">
                                    {{ $row->notes }}
                                    @if($row->color)
                                        <div class="text-muted small mt-1">
                                            ({{ __('messages.color') ?? 'اللون' }}: {{ $row->color->name ?? '-' }})
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $row->user->name ?? '-' }}</td>
                                <td>{{ optional($row->created_at)->format('Y-m-d H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    {{ __('messages.N/A') ?? 'لا توجد سجلات' }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $activities->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
