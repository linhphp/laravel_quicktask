<div class="row">
    <div class="col">
        <div class="alert">
            @if(Session::has('stored'))
            <span class="alert-success p-2"> @lang('language.created') </span>

            @elseif(Session::has('updated'))
            <span class="alert-success p-2"> @lang('language.updated') </span>

            @elseif(Session::has('deleted'))
            <span class="alert-success p-2"> @lang('language.deleted') </span>

            @elseif(Session::has('warning'))
            <span class="alert-warning p-2"> @lang('language.warning') </span>
            @endif
        </div>
    </div>
</div>
