@if (App::environment()==='production')
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = 'l5beauty-mnobrega';

        @if (isset($slug))
            var disqus_identifier = 'blog-{{$slug}}';
        @endif

        /* This comment removes bogus Phpstorm error */
        (function() {
            var dsq = document.createElement('script');
            dsq.type = 'text/javascript';
            dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] ||
                document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>
        Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a>
    </noscript>
@endif