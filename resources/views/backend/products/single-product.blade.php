@extends('backend.layouts.master')
<!-- css -->
@section('css')
<!-- <link rel="stylesheet" href="/backend/plugins/ekko-lightbox/ekko-lightbox.css"> -->
@endsection
@section('content')
<div class="container-fluid">
        <div class="row">
          
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">{{$product->name}}</h4>
              </div>
              <div class="card-body">
                <div class="row">
                @foreach($imgg as $images)
                  <div class="col-sm-2">
                    <a href="{{$images->path}}" data-toggle="lightbox" data-title="{{$images->name}}" data-gallery="gallery">
                      <img src="{{$images->path}}" class="img-fluid mb-2" alt="{{$images->name}}"/>
                    </a>
                  </div>
                @endforeach  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('script')

<script src="/backend/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/backend/dist/js/adminlte.min.js"></script>
  <!-- Filterizr-->
  <script src="/backend/plugins/filterizr/jquery.filterizr.min.js"></script>
  
  <!-- Page specific script -->
  <script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({gutterPixels: 3});
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>
@endsection