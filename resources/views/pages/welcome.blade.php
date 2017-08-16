@extends('main')

@section('title','| Homepage')

@section('stylesheets')

@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">

            <div class="jumbotron">
                <h1>Welcome to My Blog</h1>
                <p class="lead">De Finibus Bonorum Et Malorum Ama sana kayıtsız ve acıyı öven bu yanlış düşüncenin
                </p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
            </div>

        </div>

    </div>



    <div class="row">


        <div class="col-md-8">
            @foreach($posts as $post)
           <div class="post">
               <h3> {{ $post->title }}</h3>
               <p> {{substr($post->body,0,300)}}{{strlen($post->body)>300 ? "...":" "}}</p>

               <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read more</a>
           </div>

             <hr/>
           @endforeach
        </div>


        <div class="col-md-3 col-md-offset-1" style="color:orange;">
            <h2>  SİDEBAR  </h2>



        </div>

    </div>

@endsection


@section('scripts')

@endsection


