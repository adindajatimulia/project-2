</div>
<!-- footer start-->
<footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 footer-copyright">
          <p class="mb-0">Copyright 2021-22 © viho All rights reserved.</p>
        </div>
        <div class="col-md-6">
          <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
        </div>
      </div>
    </div>
  </footer>
</div>
</div>
<!-- latest jquery-->
<script src="{{asset('template-admin')}}/assets/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="{{asset('template-admin')}}/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="{{asset('template-admin')}}/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="{{asset('template-admin')}}/assets/js/sidebar-menu.js"></script>
<script src="{{asset('template-admin')}}/assets/js/config.js"></script>
<!-- Bootstrap js-->
<script src="{{asset('template-admin')}}/assets/js/bootstrap/popper.min.js"></script>
<script src="{{asset('template-admin')}}/assets/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<script src="{{asset('template-admin')}}/assets/js/prism/prism.min.js"></script>
<script src="{{asset('template-admin')}}/assets/js/clipboard/clipboard.min.js"></script>
<script src="{{asset('template-admin')}}/assets/js/custom-card/custom-card.js"></script>
<script src="{{asset('template-admin')}}/assets/js/tooltip-init.js"></script>
<script src="{{asset('template-admin')}}/assets/js/notify/bootstrap-notify.min.js"></script>
<script src="{{asset('template-admin')}}/assets/js/sweet-alert/sweetalert.min.js"></script>
<script src="{{asset('template-admin')}}/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('template-admin')}}/assets/js/script.js"></script>
<script src="{{asset('template-admin')}}/assets/js/main.js"></script>
<script src="{{asset('template-admin')}}/assets/js/datatable.js"></script>
{{-- <script src="{{asset('template-admin')}}/assets/js/theme-customizer/customizer.js"></script> --}}
@if (isset($mods))
<script src="{{asset('mods')}}/mod_{{$mods}}.js"></script>
@endif
<!-- login js-->
<!-- Plugin used-->
</body>
</html>