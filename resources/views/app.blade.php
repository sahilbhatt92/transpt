<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('css/dataTables.responsive.css')}}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset('css/timeline.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('css/morris.css')}}" rel="stylesheet">

    <link href="{{asset('css/lightbox.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('css/chosen.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap-datetimepicker.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script type="text/javascript" src="{{asset('js/html5shiv.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        
            @yield('content')
        
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('js/metisMenu.min.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>

    <script src="{{asset('js/lightbox.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/sb-admin-2.js')}}"></script>

    <script src="{{asset('js/chosen.jquery.js')}}"></script>

    <script src="{{asset('js/moment-with-locales.js')}}"></script> 

    <script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script> 


        <script>
            $(document).ready(function() {
                $('.dates').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
                
                $("select").chosen({width: "100%",allow_single_deselect: true});

                    $.ajax({
                      method: "POST",
                      url: "/api/v1/state",
                      data: { state: $("select#state").find('option:selected').attr('value'),'_token': $("input[name=_token]").val() }
                    })
                      .done(function( msg ) {
                        $.each(msg, function(key, value) {   
                             $('#district')
                                 .html($("<option></option>")
                                 .attr("value",key)
                                 .text(value)); 
                        });
                        $('#district').trigger("chosen:updated");
                      });

                      console.log($("select#state").find('option:selected').attr('value'));
                $(":checkbox.master:first").on('change',function(){
                    if(this.checked) { // check select status
                        $(':checkbox.master:not(:first)').each(function() { //loop through each checkbox
                            this.checked = true;  //select all checkboxes with class "checkbox1"               
                        });
                    }else{
                        $(':checkbox.master:not(:first)').each(function() { //loop through each checkbox
                            this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                        });         
                    }
                });

                $(":checkbox.transaction:first").on('change',function(){
                    if(this.checked) { // check select status
                        $(':checkbox.transaction:not(:first)').each(function() { //loop through each checkbox
                            this.checked = true;  //select all checkboxes with class "checkbox1"               
                        });
                    }else{
                        $(':checkbox.transaction:not(:first)').each(function() { //loop through each checkbox
                            this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                        });         
                    }
                });

                $(":checkbox.bill:first").on('change',function(){
                    if(this.checked) { // check select status
                        $(':checkbox.bill:not(:first)').each(function() { //loop through each checkbox
                            this.checked = true;  //select all checkboxes with class "checkbox1"               
                        });
                    }else{
                        $(':checkbox.bill:not(:first)').each(function() { //loop through each checkbox
                            this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                        });         
                    }
                });

                $(":checkbox.fleet:first").on('change',function(){
                    if(this.checked) { // check select status
                        $(':checkbox.fleet:not(:first)').each(function() { //loop through each checkbox
                            this.checked = true;  //select all checkboxes with class "checkbox1"               
                        });
                    }else{
                        $(':checkbox.fleet:not(:first)').each(function() { //loop through each checkbox
                            this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                        });         
                    }
                });

                $(":checkbox.accounts:first").on('change',function(){
                    if(this.checked) { // check select status
                        $(':checkbox.accounts:not(:first)').each(function() { //loop through each checkbox
                            this.checked = true;  //select all checkboxes with class "checkbox1"               
                        });
                    }else{
                        $(':checkbox.accounts:not(:first)').each(function() { //loop through each checkbox
                            this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                        });         
                    }
                });

                $(":checkbox.reports:first").on('change',function(){
                    if(this.checked) { // check select status
                        $(':checkbox.reports:not(:first)').each(function() { //loop through each checkbox
                            this.checked = true;  //select all checkboxes with class "checkbox1"               
                        });
                    }else{
                        $(':checkbox.reports:not(:first)').each(function() { //loop through each checkbox
                            this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                        });         
                    }
                });

                $("#length,#width,#height,#cft").keyup(function (e) {
                    e.preventDefault();
                    $("#cft").val(parseInt($('#length').val()) * parseInt($('#width').val()) * parseInt($('#height').val()));
                });

                    if($('#rent_type option:selected').val() == 1)
                        $('.rent').show();
                    else
                        $('.rent').hide();

                $('#rent_type').change(function (e) {
                    e.preventDefault();
                    if($(this).val() == 1)
                        $('.rent').show();
                    else
                        $('.rent').hide();
                });

                $("select#state").change(function(){
                    $.ajax({
                      method: "POST",
                      url: "/api/v1/state",
                      data: { state: $(this).val(),'_token': $("input[name=_token]").val() }
                    })
                      .done(function( msg ) {
                        $.each(msg, function(key, value) {   
                             $('#district')
                                 .html($("<option></option>")
                                 .attr("value",key)
                                 .text(value)); 
                        });
                        $('#district').trigger("chosen:updated");
                      });
                });

                $('#mainTable').DataTable({
                        responsive: true,
                        "oLanguage": { "sSearch": "" } 
                });

                    $('#acSec').show();

                $("#mainTable").parent().addClass("table-responsive");
                $(".dataTables_length").parent().removeClass("col-sm-6").addClass("col-xs-6");
                $(".dataTables_filter").parent().removeClass("col-sm-6").addClass("col-xs-6");
                $(".dataTables_filter input").attr('placeholder','Search..');

                $('form').on('submit',function(e){
                    $("button[type=submit]:contains('Create'),button[type=submit]:contains('Update')").prop('disabled',true).html('<i class="fa fa-refresh fa-spin"></i> Wait..');
                });

            });
    </script>

</body>

</html>
