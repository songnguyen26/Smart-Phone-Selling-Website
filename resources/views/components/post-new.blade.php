<div class="product">
    <div class="container">
        <h2 class="my-4 text-center">Bài viết mới nhất</h2>
        <div class="row p-3">
          @foreach ($postNew as $post)
              <x-post-item :postitem="$post"/>
          @endforeach
        </div>
    </div>
</div>