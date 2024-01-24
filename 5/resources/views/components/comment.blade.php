@props(['comment'])

<div style="margin-left:50px;margin-top:20px">
    
    <div style="border: 1px solid black;display:flex;">
        <div style="border-right: 1px solid black;padding:20px">
            {{$comment->author->name}}
        </div>
        <div style="padding:20px">
            <p>{{$comment->body}}</p>
        </div>
    </div>

</div>