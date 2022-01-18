@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
        </div>

    </div>
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Заголовок</th>
                   <th>Статус</th>
                   <th>Автор</th>
                   <th>Описание</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($newsList as $news)
                  <tr>
                      <td>{{ $news->id }}</td>
                      <td>{{ $news->title }}</td>
                      <td>{{ $news->status }}</td>
                      <td>{{ $news->author }}</td>
                      <td>{{ $news->description }}</td>
                      <td>
                          <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Ред.</a> &nbsp;
                          <a href="javascript:;" style="color:red;">Уд.</a>
                      </td>
                  </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>
    </div>
@endsection