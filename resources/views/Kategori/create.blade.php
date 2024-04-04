@extends("layouts.app")

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Buat kategori baru</h3>
        </div>
        <!-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        <form method="post" action="../kategori">
            @csrf
            <!-- Tambahkan CSRF token untuk keamanan -->
            <div class="card-body">
                <div class="form-group">
                    <label for="codekategori">Kode Kategori</label>
                    <input type="text" class="form-control" id="codekategori" name="codekategori"
                        placeholder="Enter kode kategori">
                    @error('codekategori')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namakategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namakategori" name="namakategori"
                        placeholder="Enter nama kategori">
                    @error('namakategori')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/kategori/') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection