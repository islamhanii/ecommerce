<a href="#" data-toggle="modal" data-target="#myModal{{$id}}" class="btn red">Delete</a>

<div class="modal fade" id="myModal{{$id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">Delete {{ $name }} ! </h4>
            </div>
            <div class="modal-body">
                {{trans('main.ask-delete')}} : {{ $name }}
            </div>
            <div class="modal-footer">
                {!! Form::open([ 'method' => 'DELETE', 'route' => ['categories.destroy', $id] ]) !!}
                {!! Form::submit(trans('main.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('main.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
