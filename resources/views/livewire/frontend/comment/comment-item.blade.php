<li>
    <div class="comment-body">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div
                    class="message-light message-light--purchased">@if($comment->is_buyer)
                        خریدار این محصول
                    @else
                        خریدار نیست
                    @endif</div>
                <ul class="comments-user-shopping">
                    <li>
                        <div class="cell">رنگ خریداری
                            شده:
                        </div>
                        <div class="cell color-cell">
                                                                        <span class="shopping-color-value"
                                                                              style="background-color: #FFFFFF; border: 1px solid rgba(0, 0, 0, 0.25)"></span>سفید
                        </div>
                    </li>
                    <li>
                        <div class="cell">خریداری شده
                            از:
                        </div>
                        <div class="cell seller-cell">
                            <span class="o-text-blue">دیجی‌کالا</span>
                        </div>
                    </li>
                </ul>
                @if($comment->suggestion==1)
                    <div
                        class="message-light message-light--opinion-positive">
                        خرید این محصول را توصیه می‌کنم
                    </div>
                @elseif($comment->suggestion==2)
                    <div
                        class="message-light message-light--opinion-negative">
                        خرید این محصول را توصیه نمی‌کنم
                    </div>
                @else
                    <div class="message-light">پیشنهادی ندارم</div>
                @endif

            </div>
            <div class="col-md-9 col-sm-12 comment-content">
                <div class="comment-title">
                    {{$product->title}}
                </div>
                <div class="comment-author">
                    {{$comment->user->name}}
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="content-expert-evaluation-positive">
                            <span>نقاط قوت</span>
                            <ul>
                                @foreach(explode('@',$comment->advantage) as $advantage)
                                    <li>{{$advantage}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="content-expert-evaluation-negative">
                            <span>نقاط ضعف</span>
                            <ul>
                                @foreach(explode('@',$comment->disadvantage) as $disadvantage)
                                    <li>{{$disadvantage}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <p>
                    {{$comment->body}}
                </p>

                <div class="footer">
                    <div class="comments-likes">
                        آیا این نظر برایتان مفید بود؟
                        <button  wire:click="like({{$comment->id}})" class="btn-like" data-counter="{{$comment->liked}}">بله
                        </button>
                        <button wire:click="dislike({{$comment->id}})" class="btn-like" data-counter="{{$comment->disliked}}">خیر
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
