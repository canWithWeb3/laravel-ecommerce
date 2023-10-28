@extends("layouts.admin")

@section("content")
    <main>
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3">Kategori Güncelle</h1>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/admin/kategoriler/'.$category->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            
                            <div class="row">
                                {{-- name --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Adı:</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @endif" value="{{ old('name', $category->name) }}">
                                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Güncelle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection