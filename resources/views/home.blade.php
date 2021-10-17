@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{auth()->user()->name}}</div>
                <div class="card-body">
                    Please click on button to make your subscrition for this website. Once you subscribe, You will receives an email with our latest posts.
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div>
                        {{ __('Subscribe to Website') }}
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="btn-group" role="group">
                            @if(auth()->user()->is_subscribe !== 1)
                            <button id="subscribe" data-type="subscribe" type="button" class="btn btn-primary subscribeWebsite" title="{{ __('Subscribe') }}">Subscribe</button>
                            @else
                            <button id="unsubscribe" data-type="unsubscribe" type="button" class="btn btn-danger subscribeWebsite" title="{{ __('UnSubscribe') }}">UnSubscribe</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_page')

    <script>
        $(document).ready(function(){
            $(".subscribeWebsite").click(function(){
                let _token   = $('meta[name="csrf-token"]').attr('content');
                let type = $(this).data('type');
                let subscriber;
                if(type == 'subscribe'){
                    subscriber = 1;
                } else {
                    subscriber = 0;    
                }
                
                $.ajax({
                    url: "{{route('api.user.subscribe')}}",
                    type:"POST",
                    data:{
                      user:"{{auth()->user()->id}}",
                      subscriber:subscriber,
                      _token: _token
                    },
                    success:function(response){
                      console.log(response);
                      if(response) {
                        alert(response.message);
                        if(type == 'subscribe'){
                            $("#subscribe").hide();
                            $(".btn-group").html('<button id="unsubscribe" data-type="unsubscribe" type="button" class="btn btn-danger subscribeWebsite" title="{{ __("UnSubscribe") }}">UnSubscribe</button>');
                        } else {
                            $("#unsubscribe").hide();
                            $(".btn-group").html('<button id="subscribe" data-type="subscribe" type="button" class="btn btn-primary subscribeWebsite" title="{{ __("Subscribe") }}">Subscribe</button>');
                        }
                      }
                    },
                });
            });
        });
    </script>
    
@endsection
