@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (count($applications) == 0)
            <div class="alert alert-info" role="alert">
                Заявок пока нет
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Название</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Сообщение</th>
                        <th scope="col">Файл</th>
                        <th scope="col">Компания</th>
                        <th scope="col">Отправитель</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->name }}</td>
                        <td>{{ $application->phone }}</td>
                        <td>{{ $application->message }}</td>
                        <td><a href="{{ route('open.file', ['file' => $application->file]) }}" class="link-info">{{ $application->file }}</a></td>
                        <td>{{ $application->company }}</td>
                        <td>{{ $application->user->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection

