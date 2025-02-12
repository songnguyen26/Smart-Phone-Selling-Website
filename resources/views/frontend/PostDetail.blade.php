@extends('layout.site');
@section('title','Chi tiết bài viết')
@section('maincontent')
    <div class="container py-3">
        <div class="row">
            <h1 class="text-center">{{ $postDetail->title }}</h1>
            <img  src="{{ asset('assets/image/post/'.$postDetail->image) }}" alt="" style="width:500px; height=300px;">
            <p>{{ $postDetail->detail }}</p>
        </div>
        <div class="row">
            <h2 class="my-4 text-center">Bài viết cùng chủ đề</h2>
              <div class="row p-5">
                @foreach ($sameTopic as $post_item)
                    <x-post-item :postitem="$post_item"/>
                @endforeach
              </div>
          </div>
    </div>
@endsection
