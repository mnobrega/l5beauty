<hr>
<div class="container">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        {{--@include('blog.partials.disqus')--}}
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="{{url('rss')}}" data-toggle="tooltip" title="RSS feed">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-rss fa-stack-lx fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/" data-toggle="tooltip" title="My Twitter Page">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-lx fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://facebook.com/" data-toggle="tooltip" title="My Facebook Page">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-lx fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://google.com/" data-toggle="tooltip" title="My Google+ Page">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-google-plus fa-stack-lx fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/" data-toggle="tooltip" title="My Github Page">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-github fa-stack-lx fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright">Copyright &copy; {{config('blog.author')}}</p>
            </div>
        </div>
    </div>
</footer>