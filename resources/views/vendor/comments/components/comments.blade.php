@auth
    @include('comments::form')
@else
    @include('comments::login-message')
@endauth

@php
    $count = $model->commentsWithChildrenAndCommenter()->count();
    $comments = $model->commentsWithChildrenAndCommenter()->parentless()->get();
@endphp
@if ($count < 1)
    <p class="lead">There are no comments yet.</p>
@endif
<ul class="list-unstyled">
    @foreach ($comments as $comment)
        @include('comments::components.comment.comment')
    @endforeach
</ul>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
