<div class="layout_main">
    <div class="post_tweet">
        <form action="{{route('post_tweet')}}" method="post">
            @csrf
            <img class="tweet__author-logo" src="{{Storage::url(Auth::user()->url)}}" style="margin-top:15px;margin-left:15px;">
            <div class="my-1 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <div class="col-sm-10 d-flex justify-content-center align-items-center">
                        <input type="text" class="form-control" name="tweet" id="tweet" placeholder="What is happening?" style="width: 50em; height: 10em;">
                        @error('tweet')
                            <span class="fs-6 text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 d-flex justify-content-center align-items-center">
                        <input type="submit" class="btn btn-primary" name="submit" value="Post">
                    </div>
                </div>
            </div>
        </form>
</div>
