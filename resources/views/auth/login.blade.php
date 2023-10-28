@extends("layouts.app")

@section("content")
    <main>
        <div class="col-xl-4 mx-auto my-5">
            <div class="card">
                <div class="card-header">Giriş Yap</div>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        {{-- email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        {{-- password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Parola:</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Giriş Yap</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection