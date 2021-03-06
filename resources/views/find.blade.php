<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')

<div class="container-fluid">
<div class="row">
 
    <div class="main_image">
        <h1>今日は何作ろう...</h1>
        <div class="serch_bar">
            <form action="{{url('index')}}" method="GET">
            <input class="keyword" type="text" name="keyword" value="" placeholder="　レシピを探す"><input type="submit" class="fas btn" value="&#xf002">
            </form>
        </div>
    </div>

    <div class="find_by_recipe">
        <p class="category_bar">レシピを探す</p>
        <ul>
            <form action="{{url('index')}}" method="GET"><input type="submit" name="keyword" value="パスタ" class="pasta"></form>
            <form action="{{url('index')}}" method="GET"><input type="submit" name="keyword" value="丼" class="don"></form>
            <form action="{{url('index')}}" method="GET"><input type="submit" name="keyword" value="カレー" class="curry"></form>
            <form action="{{url('index')}}" method="GET"><input type="submit" name="keyword" value="サラダ" class="salada"></form>            
        </ul>
    </div>

    <div class="latest_recipes">
        <p class="category_bar">新着レシピ</p>
        @foreach ($recipes as $recipe)
            <div class="recipe_card">
                <a href="{{ url('recipe/'.$recipe->id) }}"><img src="{{ asset('storage/img/'.$recipe->hd_img), true }}" alt onerror="this.onerror"></a>
                <div class="recipe_titles">
                    <a href="{{ url('recipe/'.$recipe->id) }}"><h4>{{ $recipe->title }}</h4></a>
                    <p class="gray">posted by</p><br>
                    <p>{{ $recipe->name }}</p>
                </div>
            </div>
        @endforeach
    </div>


@endsection