@extends('front.template.main')

@section('content')

    
      @foreach( $articles as $article)
          <div class="col-md-4">
            @foreach($article->images as $image)
            <img class="img-responsive img-article" src="{{ asset('images/articles/'.
            $image->name )}}" alt="...">
            @endforeach
            <h3> {{$article->title}}</h3>
          </div>
      @endforeach
    </div>
    <div class="text-center">
  		<!--Renderizando la paginacion, sin esto no aparece en la vista-->
  		{!!  $articles->render() !!}
  	</div>
@endsection
