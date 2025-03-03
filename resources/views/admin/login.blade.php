@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">login comme admin</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">adress email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"> mots de passe</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary"> login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
