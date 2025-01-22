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

            <div class="flex justify-end mb-4">
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    {{ __('Add New Product') }}
                </a>
            </div>

            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Category') }}</th>
                            <th>{{ __('Season') }}</th>
                            <th>{{ __('Factory') }}</th>
                            <th>{{ __('Colors') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td><img src="{{ asset($product->photo) }}" alt="Product Image"
                                        style="width: 100px; height: auto;"></td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->code ?? 'N/A' }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->season->name }}</td>
                                <td>{{ $product->factory->name }}</td>
                                <td>
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Color') }}</th>
                                                <th>{{ __('Quantity') }}</th>
                                                <th>{{ __('Expected Delivery') }}</th>
                                                <th>{{ __('Remaining Days') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $productColor)
                                                @php
                                                    $remainingDays = \Carbon\Carbon::parse(
                                                        $productColor->expected_delivery,
                                                    )->diffInDays(now(), false);
                                                @endphp
                                                <tr>
                                                    <td>{{ $productColor->color->name }}</td>
                                                    <td>{{ $productColor->quantity }}</td>
                                                    <td>{{ $productColor->expected_delivery }}</td>
                                                    <td>
                                                        @if ($remainingDays > 0)
                                                            <span class="badge bg-danger">{{ $remainingDays }}
                                                                {{ __('days overdue') }}</span>
                                                        @elseif ($remainingDays === 0)
                                                            <span class="badge bg-warning">{{ __('Due today') }}</span>
                                                        @else
                                                            <span class="badge bg-success">{{ abs($remainingDays) }}
                                                                {{ __('days remaining') }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    @if ($product->status === 'New')
                                        <span class="badge bg-primary">{{ __('New') }}</span>
                                    @elseif ($product->status === 'Partial')
                                        <span class="badge bg-pink">{{ __('Partial') }}</span>
                                    @elseif ($product->status === 'Complete')
                                        <span class="badge bg-success">{{ __('Complete') }}</span>
                                    @elseif ($product->status === 'Cancel')
                                        <span class="badge bg-danger">{{ __('Cancel') }}</span>
                                    @elseif ($product->status === 'Pending')
                                        <span class="badge bg-warning">{{ __('Pending') }}</span>    
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="btn btn-primary">{{ __('Show') }}</a>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-secondary">{{ __('Edit') }}</a>
                                    <a href="{{ route('products.receive', $product->id) }}"
                                        class="btn btn-success">{{ __('Receive') }}</a>
                                    <a href="{{ route('products.completeData', $product->id) }}"
                                        class="btn btn-info">{{ __('Complete Data') }}</a>
                                    @if ($product->status === 'Cancel')
                                        <a href="javascript:void(0);" class="btn btn-warning renew-btn"
                                            data-id="{{ $product->id }}">{{ __('Re-New') }}</a>
                                    @else
                                        <a href="javascript:void(0);" class="btn btn-warning cancel-btn"
                                            data-id="{{ $product->id }}">{{ __('Cancel') }}</a>
                                    @endif
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
        $(document).on('click', '.cancel-btn', function() {
            const productId = $(this).data('id');

            if (confirm('Are you sure you want to cancel this product?')) {
                $.ajax({
                    url: `/products/${productId}/cancel`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload(); // Reload the page to reflect the updated status
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            }
        });

        $(document).on('click', '.renew-btn', function() {
            const productId = $(this).data('id');

            if (confirm('Are you sure you want to re-new this product?')) {
                $.ajax({
                    url: `/products/${productId}/renew`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload(); // Reload the page to reflect the updated status
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            }
        });
    </script>
@endsection
