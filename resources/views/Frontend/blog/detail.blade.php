@extends('Frontend.layout')
@section('title','Anasayfa')
@section('content')




<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{$blog->blog_title}}

    </h1>


    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="/images/blogs/{{$blog->blog_file}}" alt="">

            <hr>

            <!-- Date/Time -->
            <p>Yayınlanma Zamanı      {{$blog->created_at->format('d-m-Y h:i')}}</p>

            <hr>

            <!-- Post Content -->

            <p>{!! $blog->blog_content !!} </p>

            <hr>



            <div id="disqus_thread"></div>
            <script>
                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://mehmetkucukcelebi-com-tr.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>




        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->


            <!-- Categories Widget -->


            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">En Çok Okunanlar</h5>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($blogList as $list)
                            <a href="{{route('blog.Detail',$list->blog_slug)}}"><li class="list-group-item">{{$list->blog_title}}</li></a>
                        @endforeach


                    </ul>
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->


</div>






@endsection
@section('css')
@endsection
@section('js')
@endsection
