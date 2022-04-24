@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Оставить заявку</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('save.application') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="user_name" class="col-md-4 col-form-label text-md-end">Ваше имя</label>
                            <div class="col-md-6">
                                <input id="user_name" type="text" disabled class="form-control" name="user_name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Название заявки</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Номер телефона</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">Сообщение</label>
                            <div class="col-md-6">
                                <textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" rows="3"></textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="company" class="col-md-4 col-form-label text-md-end">Название компании</label>
                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}">
                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="file" class="col-md-4 col-form-label text-md-end">Выберите файл</label>
                            <div class="col-md-6">
                                <input type="file" id="file" class="form-control @error('file') is-invalid @enderror" name="file">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Отправить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

