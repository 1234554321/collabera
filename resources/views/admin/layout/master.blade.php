@if (Auth::check())
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin">
    <meta name="author" content="">
    <meta name="keyword" content="Dashboard">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin</title>

    <!-- Bootstrap CSS 
    <link href="css/bootstrap.min.css" rel="stylesheet">-->    
     {!!HTML::style('css/bootstrap.min.css')!!}
    <!-- bootstrap theme -->
   {!!HTML::style('css/bootstrap-theme.css')!!}
    <!--colorpicker css-->
     {!!HTML::style('css/colorpicker.css')!!}
    <!-- font icon -->
    {!!HTML::style('css/elegant-icons-style.css')!!}
    {!!HTML::style('css/font-awesome.min.css')!!}  
    <!-- full calendar css-->
   {!!HTML::style('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')!!}
  {!!HTML::style('assets/fullcalendar/fullcalendar/fullcalendar.css')!!}
    <!-- easy pie chart-->
   {!!HTML::style('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')!!}
    <!-- owl carousel -->
   {!!HTML::style('css/owl.carousel.css')!!}
   {!!HTML::style('css/jquery-jvectormap-1.2.2.css')!!}
    <!-- Custom styles -->
  {!!HTML::style('css/fullcalendar.css')!!}
  {!!HTML::style('css/widgets.css')!!}
  {!!HTML::style('css/style.css')!!}
  {!!HTML::style('css/style-responsive.css')!!}
  {!!HTML::style('css/xcharts.min.css')!!}
  {!!HTML::style('css/jquery-ui-1.10.4.min.css')!!}
  {!!HTML::style('css/colorbox.css')!!}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     @include('admin.include.header')
      @include('admin.include.sidebar')
      <!--main content start-->
      <section id="main-content">
            @include('admin.partials.errors')
          <section class="wrapper">            
             @yield('content')
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
     {!!HTML::script('js/jquery.js')!!}
     {!!HTML::script('js/jquery-ui-1.10.4.min.js')!!}
    {!!HTML::script('js/jquery-1.8.3.min.js')!!}
    {!!HTML::script('js/jquery-ui-1.9.2.custom.min.js')!!}
    
    <!--custom checkbox & radio-->
     {!!HTML::script('js/ga.js')!!}
    <!--custom switch-->
      {!!HTML::script('js/bootstrap-switch.js')!!}
    <!--custom tagsinput-->
     {!!HTML::script('js/jquery.tagsinput.js')!!}
    <!-- colorpicker -->
      {!!HTML::script('js/colorpicker.js')!!}
    <!-- bootstrap-wysiwyg -->
    {!!HTML::script('js/jquery.hotkeys.js')!!}
     {!!HTML::script('js/bootstrap-wysiwyg.js')!!}
    {!!HTML::script('js/bootstrap-wysiwyg-custom.js')!!}
    <!-- tinymce editor -->
     {!!HTML::script('assets/tinymce/tinymce.min.js')!!}
    <!-- custom form component script for this page-->
    {!!HTML::script('js/form-component.js')!!}
    <!-- bootstrap -->
    {!!HTML::script('js/bootstrap.min.js')!!}
    <!-- nice scroll -->
    {!!HTML::script('js/jquery.scrollTo.min.js')!!}
   {!!HTML::script('js/jquery.nicescroll.js')!!}
      <!-- jquery validate js -->
    {!!HTML::script('js/jquery.validate.min.js')!!}
    {!!HTML::script('js/form-validation-script.js')!!}
    <!-- charts scripts -->
   {!!HTML::script('assets/jquery-knob/js/jquery.knob.js')!!}
   {!!HTML::script('js/jquery.sparkline.js')!!}
   {!!HTML::script('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')!!}
   {!!HTML::script('js/owl.carousel.js')!!}
    <!-- jQuery full calendar -->
    <!-- Full Google Calendar - Calendar -->
      {!!HTML::script('js/fullcalendar.js')!!}
    {!!HTML::script('assets/fullcalendar/fullcalendar/fullcalendar.js')!!}
    <!--script for this page only-->
    {!!HTML::script('js/calendar-custom.js')!!}
    {!!HTML::script('js/jquery.rateit.min.js')!!}
    <!-- custom select -->
    {!!HTML::script('js/jquery.customSelect.min.js')!!}
     {!!HTML::script('assets/chart-master/Chart.js')!!}
    <!--custome script for all page-->
   {!!HTML::script('js/scripts.js')!!}
    <!-- custom script for this page-->
   {!!HTML::script('js/sparkline-chart.js')!!}
   {!!HTML::script('js/easy-pie-chart.js')!!}
         {!!HTML::script('js/jquery-jvectormap-1.2.2.min.js')!!}
        {!!HTML::script('js/jquery-jvectormap-world-mill-en.js')!!}
       {!!HTML::script('js/xcharts.min.js')!!}
        {!!HTML::script('js/jquery.autosize.min.js')!!}
        {!!HTML::script('js/jquery.placeholder.min.js')!!}
        {!!HTML::script('js/gdp-data.js')!!}
       <!--{!!HTML::script('js/morris.min.js')!!}-->
       {!!HTML::script('js/jquery.colorbox.js')!!}
        {!!HTML::script('js/sparklines.js')!!}	
        {!!HTML::script('js/charts.js')!!}
          {!!HTML::script('js/jquery.slimscroll.min.js')!!}
         {!!HTML::script('js/customscripts.js')!!}
<script type="text/javascript">
  $(document).ready(function() {
    $(".popupview").on('click', function (e){
         e.preventDefault();
         var eid = $(this).data('eid');
         $.colorbox({
         href:"{{URL::to(Helper::admin_slug().'/agent/fund/view')}}/"+eid,
         top:50,
         width:500,
         onClosed:function() { }
        });
     });
  });

  $( function() {
    $( "#exprdate" ).datepicker({
       changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd',
      yearRange: ":+50",
      minDate: "0"
    });

    $( "#datefrom" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd',
      yearRange: "10:"
    });

    $( "#dateto" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd',
      yearRange: "10:"
    });
  });
  </script>
  </body>
</html>
@else
 @include('admin.include.login')
@endif
