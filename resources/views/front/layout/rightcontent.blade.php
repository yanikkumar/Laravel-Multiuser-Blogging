<!-- Right Side -->
<div class="col-md-4">
    <div class="widget">
        <div class="widget_title widget_black">
            <h2><a href="#">Most Viewed</a></h2>
        </div>

        @foreach($shareData['most_viewed'] as $item)
        <div class="media">
            <div class="media-left">
                <a href="{{ url('/details') }}/{{ $item->slug }}">
                <img class="media-object" src="{{ asset('/storage/post') }}/{{ $item->thumb_image }}" alt="{{ $item->title }}"></a>
            </div>
            <div class="media-body">
                <h3 class="media-heading">
                    <a href="{{ url('/details') }}/{{ $item->slug }}" target="_self">{{ $item->title }}</a>
                </h3> <span class="media-date"><a href="#">{{ date('j F -y', strtotime($item->created_at)) }}</a>,  by: <a href="{{ url('/author') }}/{{ $item->creator->id }}">{{ $item->creator->name }}</a></span>

                <div class="widget_article_social">
                    <!-- <span>
                        <a href="single.html" target="_self"> <i class="fa fa-share-alt"></i>424</a> Shares
                    </span> -->
                    <span>
                        <i class="fa fa-comments-o"></i>{{ count($item->comments) }} Comments
                    </span>
                </div>
            </div>
        </div>
        @endforeach
        <p class="widget_divider"><a href="{{ url('/') }}" target="_self">More News&nbsp;&raquo;</a></p>
    </div>
    <!-- Popular News -->

    <!-- <div class="widget hidden-xs m30">
        <img class="img-responsive adv_img" src="{{ asset('/front/img/right_add1.jpg') }}" alt="add_one">
        <img class="img-responsive adv_img" src="{{ asset('/front/img/right_add2.jpg') }}" alt="add_one">
        <img class="img-responsive adv_img" src="{{ asset('/front/img/right_add3.jpg') }}" alt="add_one">
        <img class="img-responsive adv_img" src="{{ asset('/front/img/right_add4.jpg') }}" alt="add_one">
    </div> -->
    <!-- Advertisement -->

    <!-- <div class="widget hidden-xs m30">
        <img class="img-responsive widget_img" src="{{ asset('/front/img/right_add5.jpg') }}" alt="add_one">
    </div> -->
    <!-- Advertisement -->

    <div class="widget reviews m30">
        <div class="widget_title widget_black">
            <h2><a href="#">Top Authors</a></h2>
        </div>
        <div class="media">
            <div class="media-left">
                <a href="#"><img heigh='64' width='64' class="media-object" src="{{ asset('/front/img/right_add6.jpg') }}" alt="Generic placeholder image"></a>
            </div>
            <div class="media-body">
                <h3 class="media-heading">
                    <a href="#" target="_self">Author One</a>
                </h3>
            </div>
        </div>
        <p class="widget_divider"><a href="{{ url('/') }}" target="_self">View All Authors&nbsp;&raquo;</a></p>
    </div>
    <!-- Reviews News -->

    <!-- <div class="widget hidden-xs m30">
        <img class="img-responsive widget_img" src="{{ asset('/front/img/right_add6.jpg') }}" alt="add_one">
    </div> -->
    <!-- Advertisement -->

    <div class="widget m30">
        <div class="widget_title widget_black">
            <h2><a href="#">Most Commented</a></h2>
        </div>
        @foreach($shareData['most_commented'] as $item)
        <div class="media">
            <div class="media-left">
                <a href="{{ url('/details') }}/{{ $item->slug }}">
                <img class="media-object" src="{{ asset('/storage/post') }}/{{ $item->thumb_image }}" alt="{{ $item->title }}"></a>
            </div>
            <div class="media-body">
                <h3 class="media-heading">
                    <a href="{{ url('/details') }}/{{ $item->slug }}">{{ $item->title }}</a>
                </h3>

                <div class="media_social">
                    <span><i class="fa fa-comments-o"></i>{{ $item->comments_count }} Comments</span>
                </div>
            </div>
        </div>
        @endforeach
        <p class="widget_divider"><a href="{{ url('/') }}" target="_self">More News&nbsp;&nbsp;&raquo; </a></p>
    </div>
    <!-- Most Commented News -->

    <div class="widget m30">
        <div class="widget_title widget_black">
            <h2><a href="#">About Founder</a></h2>
        </div>
        <div class="widget_body"><img class="img-responsive left" src="{{ asset('/front/img/editor.jpg') }}"
                                    alt="Generic placeholder image">

            <p>Yanik Kumar a.k.a Believe Master is a Content Creator fond of learning about new things no matter which 
            field the it belongs. This blog is soberly created by him to provide best contents in different categories.</p>

            <p>If you are serious to know about Believe Master and want know more about the organition you can completely 
            find out on Believe Master Organisation. Moreover if your are a content creator just ping us a mail for joining
            BM News.</p>
            <button class="btn pink"><a  href="https://www.believemaster.com">Read more</a></button>
        </div>
    </div>
    <!-- Founder News -->

    <!-- <div class="widget hidden-xs m30">
        <img class="img-responsive add_img" src="{{ asset('/front/img/right_add7.jpg') }}" alt="add_one">
        <img class="img-responsive add_img" src="{{ asset('/front/img/right_add7.jpg') }}" alt="add_one">
        <img class="img-responsive add_img" src="{{ asset('/front/img/right_add7.jpg') }}" alt="add_one">
        <img class="img-responsive add_img" src="{{ asset('/front/img/right_add7.jpg') }}" alt="add_one">
    </div> -->
    <!--Advertisement -->

    <div class="widget m30">
        <div class="widget_title widget_black">
            <h2><a href="#">Readers Corner</a></h2>
        </div>
        <div class="widget_body"><img class="img-responsive left" src="{{ asset('/front/img/reader.jpg') }}"
                                    alt="Generic placeholder image">

            <p>To all readers out there BM News welcomes you and hoping for you to find best content on our website flushed with knowledge
            in different categories. You are free to access the website and share the content.</p>

            <p>You can comments to the any post you like and you comments will be showacased once approved by the editors or by the admin.
            If you wish to provide content to our website you can contact us for a editors request. If you are a developer and opensourcely provide
            features to our website feel free to contact and joing the Development Team a.k.a BM Devs.</p>
            <button class="btn pink"><a href="{{ url('/about') }}">Read more</button>
        </div>
    </div>
    <!--  Readers Corner News -->

    <!-- <div class="widget hidden-xs m30">
        <img class="img-responsive widget_img" src="{{ asset('/front/img/podcast.jpg') }}" alt="add_one">
    </div> -->
    <!--Advertisement-->
    </div>
    <!-- Right Section -->

    </div>
    <!-- Row -->

    </div>
    <!-- Container -->

</section>
    <!-- Category News Section -->
    @if($shareData['video1'] || $shareData['video2'] || $shareData['video3'] || $shareData['video4'] || $shareData['video5'] )
    <section id="video_section" class="video_section">
        <div class="container">
            <div class="well">
                <div class="row">
                    <div class="col-md-6">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="{{ $shareData['video1'] }}"
                                    frameborder="0" allowfullscreen></iframe>
                        </div>
                        <!-- embed-responsive -->

                    </div>
                    <!-- col-md-6 -->

                    <div class="col-md-3">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="{{ $shareData['video2'] }}"></iframe>
                        </div>
                        <!-- embed-responsive -->

                        <div class="embed-responsive embed-responsive-4by3 m16">
                            <iframe class="embed-responsive-item" src="{{ $shareData['video3'] }}"></iframe>
                        </div>
                        <!-- embed-responsive -->

                    </div>
                    <!-- col-md-3 -->

                    <div class="col-md-3">
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="{{ $shareData['video4'] }}"></iframe>
                        </div>
                        <!-- embed-responsive -->

                        <div class="embed-responsive embed-responsive-4by3 m16">
                            <iframe class="embed-responsive-item" src="{{ $shareData['video5'] }}"></iframe>
                        </div>
                        <!-- embed-responsive -->

                    </div>
                    <!-- col-md-3 -->

                </div>
                <!-- row -->

            </div>
            <!-- well -->

        </div>
        <!-- Container -->

    </section>
    <!-- Video News Section -->
    @endif