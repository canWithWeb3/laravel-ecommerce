@extends("layouts.app")

@section("content")
    <main>
        <div class="col-xl-4 mx-auto my-5">
            <div class="card">
                <div class="card-header">Kayıt Ol</div>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        {{-- username --}}
                        <div class="mb-3">
                            <label for="username" class="form-label">Kullanıcı Adı:</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                            @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
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
                        {{-- repassword --}}
                        <div class="mb-3">
                            <label for="repassword" class="form-label">Parola (Tekrar):</label>
                            <input type="password" name="repassword" id="repassword" class="form-control">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Kayıt Ol</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection