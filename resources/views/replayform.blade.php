 <form id="reply_form" method="post" action="{{ route('replies.store') }}" >
                                   {{  csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                         
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                                <textarea class="form-control" name="reply" placeholder="Write something from your heart..!"></textarea>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg"  value="Reply">
                                
                            </div>
                        </div>
                    </form>