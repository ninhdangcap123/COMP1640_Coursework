
@foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->users->name }}</strong>
        <p>{{ $comment->content }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comment.reply.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="content" class="form-control" />
                <input type="hidden" name="idea_id" value="{{ $idea_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                Comment: {{$comment->id}}
                Parent comment: {{$comment->parent_id}}
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('comment.replies', ['comments' => $comment->replies])
    </div>
@endforeach
