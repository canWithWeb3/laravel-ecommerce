@extends("layouts.admin")

@section("content")
    <main>
        <h1 class="h3 mb-3">Kategori Ekle</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ url('/admin/kategoriler') }}" method="POST">
                    @csrf
                    <div class="row">
                        {{-- name --}}
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Adı:</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @endif" value="{{ old('name') }}">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection