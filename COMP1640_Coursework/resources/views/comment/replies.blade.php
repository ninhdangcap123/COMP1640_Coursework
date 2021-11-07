
@foreach($comments as $comment)
    <div class="card mb-2">
        <div class="card-body">
            <div class="media idea-item">

                <div class="media-body ml-3">
                    <a href="javascript:void(0)" class="text-secondary"><strong>{{ $comment->users->name }}</strong></a>
                    <small class="text-muted ml-2">{{ $comment->created_at }}</small>
                    <div class="mt-3 font-size-sm">
                        <p>{{ $comment->content }}</p>
                        @if(now()->lte(date('Y-m-d H:i:s', strtotime($idea->categories->comment_end_date))))
                        <form method="post" action="{{ route('comment.reply.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="content" class="form-control" required/>
                                <input type="hidden" name="idea_id" value="{{ $idea_id }}" />
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" class="text-muted small" value="Reply" />
                            </div>
                        </form>
                        @endif
                        @include('comment.replies', ['comments' => $comment->replies])
                </div>
            </div>
        </div>
    </div>
@endforeach
