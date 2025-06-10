@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1 class="mb-4 text-xl font-bold">{{ __('messages.design_sample_product') }}</h1>
            
            <div class="row">
                {{-- بيانات المنتج --}}
                <div class="col-md-8">
                    <div class="mb-2"><strong>{{ __('messages.name') }}:</strong> {{ $sample->description }}</div>
                    <div class="mb-2"><strong>{{ __('messages.category') }}:</strong> {{ $sample->category?->name }}</div>
                    <div class="mb-2"><strong>{{ __('messages.season') }}:</strong> {{ $sample->season?->name }}</div>
                    <div class="mb-2">
                        <strong>{{ __('messages.status') }}:</strong>
                        @if ($sample->status === 'new')
                            <span class="badge bg-success">{{ __('messages.new') }}</span>
                        @elseif($sample->status === 'تم التوزيع')
                            <span class="badge bg-primary">{{ __('messages.distributed') }}</span>
                        @elseif($sample->status === 'قيد المراجعه')
                            <span class="badge bg-warning text-dark">{{ __('messages.reviewing') }}</span>
                        @elseif($sample->status === 'تم المراجعه')
                            <span class="badge bg-info text-dark">{{ __('messages.reviewed') }}</span>
                        @else
                            <span class="badge bg-secondary">{{ __($sample->status) }}</span>
                        @endif
                    </div>
                    <div class="mb-2"><strong>{{ __('messages.materials_count') }} :</strong> {{ $sample->materials->count() }}</div>
                    <div class="mb-2"><strong>{{ __('messages.marker_number') }}:</strong> {{ $sample->marker_number ?? '-' }}</div>
                    <div class="mb-2"><strong>{{ __('messages.consumption') }}:</strong> {{ $sample->marker_consumption ?? '-' }}</div>
                    <div class="mb-2"><strong>{{ __('messages.unit') }}:</strong> {{ $sample->marker_unit ?? '-' }}</div>
                    <div class="mb-2">
                        <strong>{{ __('messages.technical_file') }} :</strong>
                        @if ($sample->marker_file)
                            <a href="{{ asset($sample->marker_file) }}" download>
                                <i class="fa fa-download fa-lg"></i>
                                {{ __('messages.download') }}
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </div>
                </div>
                {{-- صور المنتج --}}
                <div class="col-md-4 text-center">
                    <div class="mb-3">
                        <strong>{{ __('messages.image') }}:</strong><br>
                        @if($sample->image)
                            <img src="{{ asset($sample->image) }}" alt="{{ __('messages.image') }}" style="max-width:120px;max-height:100px; border-radius: 7px;">
                        @else
                            <span>{{ __('messages.N/A') }} </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>{{ __('messages.marker_image') }} :</strong><br>
                        @if ($sample->marker_image)
                            <a href="{{ asset($sample->marker_image) }}" target="_blank">
                                <img src="{{ asset($sample->marker_image) }}" alt="{{ __('messages.marker_image') }}"
                                    style="max-width:80px;max-height:80px;object-fit:cover; border-radius:7px;">
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- جدول الخامات --}}
            <div class="mt-5">
                <h4 class="mb-2">{{ __('messages.materials') }}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.number_of_colors') }}</th>
                                <th>{{ __('messages.operations') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sample->materials as $i => $m)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>
                                        @if($m->material)
                                            {{ $m->material->name }}
                                        @else
                                            <span class="text-danger">{{ __('messages.unknown_or_deleted_materials') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($m->material)
                                            {{ $m->material->colors->count() }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($m->material)
                                            <a href="{{ route('design-materials.show', $m->material->id) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                                {{ __('messages.view') }} 
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('messages.N/A') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

             {{-- نظام التعليقات --}}
             <div class="mt-5">
                <h4 class="mb-2">{{ __('messages.comments') }}</h4>

                {{-- فورم إضافة تعليق --}}
                @auth
                    <form action="{{ route('design-sample-products.add-comment', $sample->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="mb-2">
                        <textarea name="content" class="form-control" rows="2" placeholder="{{ __('messages.write_comment') }}" required></textarea>
                        </div>
                        <div class="mb-2">
                            <input type="file" name="image" accept="image/*" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('messages.add_comment') }} </button>
                    </form>
                @endauth

                {{-- عرض التعليقات --}}
                <div>
                    @forelse($comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <strong><b>{{ $comment->user->name }}</b></strong>
                                        <small class="text-muted">{{ $comment->created_at }}</small>
                                    </div>
                                    <div class="mt-1"><i>"{{ $comment->content }}"</i></div>
                                    @if($comment->image)
                                        <div class="mt-2">
                                            <img src="{{ asset($comment->image) }}" alt="comment image"
                                                 style="max-width:120px;max-height:120px;border-radius:7px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-muted text-center">{{ __('messages.N/A') }}</div>
                    @endforelse
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('design-sample-products.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
