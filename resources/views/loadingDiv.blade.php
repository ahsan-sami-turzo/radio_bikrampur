{{-- <!-- Loadding Modal -->
<div id="loadingModal" data-backdrop="static" data-keyboard="false" class="modal fade" style="margin-top:3%;background-color: black;opacity:0.8 !important;">
  <div class="modal-dialog" style="text-align: center; padding-top: 30%;">
    <div class="modal-body">
      <i id="loaddingLogo" class="fa fa-spinner fa-spin fa-3x fa-fw" style="font-size:100px; color: gray;"></i>            
      <img src="{{asset('public/security/user/img/loading/loading.svg')}}">
    </div>
  </div>
</div>
<!-- End Loadding Modal -->
<div class="loader">
 <img src="{{asset('public/security/user/img/loading/loading.svg')}}" alt="loader-image">
</div>
--}}
<style>
  .loader {
   width: 100%;
   height: 100%;
   top: 0;
   left: 0;
   position: fixed;
   display: flex;
   align-items:center;
   justify-content:center;
   opacity: 0.9;
   background-color: #fff;
   z-index: 999;
 }

 .loader-image {
   position: absolute;
   top: 100px;
   left: 240px;
   z-index: 1000;
 }
</style>
