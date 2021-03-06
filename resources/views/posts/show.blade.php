@extends('main')

@section('title','| View Post')

    @section('content')

        <div class="row">

            <div class="col-md-8">

                <h1>{{ $post->title }}</h1>
                <p class="lead"> {{ $post->body }} </p>

            </div>

            <div class="col-md-4">

                <div class="well">

                    <dl class="dl-horizontal">
                        <label> Url:</label>

                        <p><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>

                    </dl>

                    <dl class="dl-horizontal">
                        <label>Created at:</label>

                        <p>{{ date('M j,Y h:ia',strtotime($post->created_at)) }}</p>

                    </dl>

                    <dl class="dl-horizontal">
                        <label>Last Updated:</label>

                        <p>{{ date('M j,Y h:ia',strtotime($post->updated_at))}}</p>

                    </dl>
                    <hr/>

                    <div class="row">

                        <div class="col-sm-6">
                            {!! Html::linkroute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                        </div>

                        <div class="col-sm-6">

                            {!! Form::open(['route'=>['posts.destroy',$post->id] ,'method'=>'DELETE']) !!}

                            {!!  Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}

                           {!! Form::close() !!}

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            {!! Html::linkroute('posts.index','<< See All Posts',array(),array('class'=>'btn btn-default btn-block','style'=>'margin-top:20px')) !!}
                        </div>
                    </div>

                </div>

            </div>


        </div>


    @endsection

