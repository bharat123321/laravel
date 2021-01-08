<html>
<head>

</head>
<body>
 <div class="row new-post">
    <div class="col-md-6 col-md-offset-3">

        <header><h3>Comments</h3></header>
        <form action="/comments" method="post">
        {{csrf_field()}}
            <div class="form-group">
                <textarea class="form-control" name="body" id="new-post" r  rows="5" placeholder="Your review on above game"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post  Comment</button>

        </form>
    </div>
 </div>

 @foreach($comments as $comment) 
 <h1>{{$comment->body }}</h1>
 @endforeach


<div ng-app="Actions">
<span ng-controller="LikeController">
    @if ($post->user->id != Auth::id())
        <button class="btn btn-default like btn-login" ng-click="like()">
            <i class="fa fa-heart"></i>
            <span>@{{ like_btn_text }}</span>
        </button>
    @endif
</span>
</div>
<script>
var app = angular.module("Actions", []);
app.controller("LikeController", function($scope, $http) {

    checkLike();
    $scope.like = function() {
        var post = {
            id: "{{ $post->id }}",
        };
        $http.post('/api/v1/post/like', post).success(function(result) {
            checkLike();
        });
    };
    function checkLike(){
        $http.get('/api/v1/post/{{ $post->id  }}/islikedbyme').success(function(result) {
            if (result == 'true') {
                $scope.like_btn_text = "Delete Like";
            } else {
                $scope.like_btn_text = "Like";
            }
        });
    };
});
</script>
</body>

</html> 