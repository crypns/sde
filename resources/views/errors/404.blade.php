@extends('layouts.site', ['title' => 'Страница не найдена'])

@section('content')
    <div class="d-flex justify-content-center align-items-center" id="main" style="height: 90vh">
        <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">404</h1>
        <div class="inline-block align-middle">
            <h2 class="font-weight-normal lead" id="desc">Запрашиваемая страница не существует.</h2>
        </div>
    </div>
@endsection
