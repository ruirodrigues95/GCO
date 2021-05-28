@foreach($feedbacks as $feedback)
<div class="row text-light">
    <div class="col-12 d-flex align-items-center">
        <div class="user-img mr-2" style="background-image: url({{ asset('storage/img/users/logo.jpg') }})"></div>
        <div>
            <p class="mb-0 font-weight-bold">
                {{ $feedback->user->userData->name }}
            </p>
            <star-rating :increment="0.1"
                         :star-size="20"
                         read-only
                         :show-rating="false"
                         :inline="true"
                         class="mb-1"
                         :rating="{{ $feedback->feedback_stars }}"></star-rating>
        </div>
    </div>
    <div class="col-12 mt-2">
        <p class="mb-0">{{ $feedback->feedback_comment }}</p>
    </div>
</div>
    @if(!$loop->last)
        <hr>
    @endif
@endforeach
