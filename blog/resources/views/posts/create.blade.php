@extends('layouts.master')


@section('content')
  <div class="col-sm-8 blog-main">
    <h1>Publish a Post</h1>

    <hr/>
    <form method="POST" action="/posts">
      {{-- To echo hidden input which has the csrf - cross-site-request-forgery
           The token can be viewd if we view the source code        --}}
      {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" id="title" name="title" required>

        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <textarea id="body" name="body" cols="30" rows="5" class="form-control" required ></textarea>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Publish</button>
        </div>
       @include('layouts.errors')
      </form>
    

  </div>
@endsection