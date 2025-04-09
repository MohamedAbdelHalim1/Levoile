@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>رفع شيت تسليمات جديد</h4>

                <form method="POST" action="{{ route('shooting-deliveries.upload.save') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="file" class="form-label">اختر ملف Excel</label>
                        <input type="file" name="file" id="file" class="form-control" accept=".xlsx,.xls"
                            required>
                    </div>

                    <button type="submit" class="btn btn-success">رفع</button>
                </form>
            </div>
        </div>
    </div>
@endsection
