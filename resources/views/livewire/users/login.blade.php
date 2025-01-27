<div class="container vh-100 d-flex justify-content-center align-items-center">
    <style>
        body {
            background-image: url('{{ asset("images/login_bg.jpeg") }}');
            background-size: cover;
            color: white;
        }
        .card {
            background: rgba(0, 0, 0, 0.7);
            border: none;
        }
        .form-control, .btn {
            border-radius: 0;
        }
        .btn{
            background: #0189bb;
        }
    </style>

    <div class="card p-4">
        <div class="card-body">
            <h3 class="card-title text-center mb-4 color-white fs-1">Login</h3>
                <div class="mb-3 mt-5">
                    <input wire:model.live="email" type="text" class="form-control-lg fs-3 text-center" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <input wire:model.live="password" type="password" class="form-control-lg fs-3 text-center" id="password" name="password" required>
                </div>
                <div class="d-grid">
                    <button wire:click="login" type="submit" class="btn btn-primary rounded fs-2 ">Login</button>
                </div>
                @if ($errors->has('error'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif

                @error('email')
                    <div class="alert alert-danger mt-2 text-center">
                        {{ $message }}
                    </div>
                @enderror

                @error('password')
                    <div class="alert alert-danger mt-2 text-center">
                        {{ $message }}
                    </div>
                @enderror

                @if (session()->has('error'))
                    <div class="alert alert-danger mt-2 text-center">
                        {{ session('error') }}
                    </div>
                @endif
        </div>
    </div>
</div>
