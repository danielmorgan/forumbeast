<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#">
            {{ $reply->owner->name }}
        </a> said {{ $reply->created_at->diffForHumans() }}&hellip;
    </div>

    <div class="panel-body">
        <article>
            {{ $reply->body }}
        </article>
    </div>
</div>
