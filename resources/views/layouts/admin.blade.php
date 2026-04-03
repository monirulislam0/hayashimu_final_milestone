<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Ismail Hossen">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/ico/apple-icon-120.png')  }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/ico/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/authentication.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/extensions/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/extensions/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dropzone/dist/min/dropzone.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('summernote/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.css') }}"/>
    @livewireStyles
    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .trash-icon {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .image-container:hover .trash-icon {
            opacity: 1;
        }
        .form-control {
            height: auto !important;
        }
        .note-editable, .note-toolbar {
          background-color: #fff;
        }
        
    </style>
</head>
<body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<x-admin-navbar/>
<x-admin-menu />

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <x-content-wrapper/>
    {{ $slot }}
</div>

<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-left d-inline-block">{{ date('Y') }} &copy; {{ config('settings.footer_copyright_text') }}</span><span class="float-right d-sm-inline-block d-none">Crafted with<i class="bx bxs-heart pink mx-50 font-small-3"></i>by<a class="text-uppercase" href="#" target="_blank">Md. Ismail Hossen</a></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
    </p>
</footer>

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('assets/js/core/app.js') }}"></script>
<script src="{{ asset('assets/js/scripts/components.js') }}"></script>
{{--<script src="{{ asset('assets/js/scripts/footer.js') }}"></script>--}}
<script src="{{ asset('assets/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{ asset('assets/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts/forms/select/form-select2.js') }}"></script>
<script src="{{ asset('summernote/summernote.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>


@livewireScripts
<script>
    window.addEventListener('alert', event => {
        toastr[event.detail.type](event.detail.message,
            event.detail.title ?? ''), toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    });

    $(function() {
        $(document).ready(function() {
            $('#description').summernote();
        });
    });
    $(function() {
        $(document).ready(function() {
            $('#short_desc').summernote();
        });
    });
    $(function() {
        $(document).ready(function() {
            $('#meta_description').summernote();
        });
    });
</script>
<script>
    function addAttribute() {
        var attributeInputs = document.getElementById('attributeInputs');

        var newInput = document.createElement('div');
        newInput.innerHTML = '<div class="row"><div class="col-4"><label for="attribute">Attribute:</label>' +
            '<input type="text" name="attributes[]" class="form-control" required></div>' +
            '<div class="col-4"><label for="value">Value:</label>' +
            '<input type="text" name="values[]" class="form-control" required></div>' +
            '<div class="col-2">'+'<button type="button" onclick="removeAttributes(this)" class="btn btn-danger" style="margin-top: 24px"><i class="fa fa-trash"></i></button></div></div>';

        attributeInputs.appendChild(newInput);
    }

    function removeAttributes(button) {
        var parentDiv = button.parentNode.parentNode.parentNode;
        parentDiv.parentNode.removeChild(parentDiv);
    }
    function addContent() {
        var contents = document.getElementById('contents');

        var newInput = document.createElement('div');
        newInput.innerHTML = '<div class="row"><div class="col-2"><label for="icon">Icon:</label>' +
            '<input type="file" name="icon[]" class="form-control" required></div>' +
            '<div class="col-8"><label for="title">Title:</label>' +
            '<input type="text" name="title[]" class="form-control" required></div>' +
            '<div class="col-2">'+'<button type="button" onclick="removeContent(this)" class="btn btn-danger" style="margin-top: 24px"><i class="fa fa-trash"></i></button></div></div>';

        contents.appendChild(newInput);
    }

    function removeContent(button) {
        var parentDiv = button.parentNode.parentNode.parentNode;
        parentDiv.parentNode.removeChild(parentDiv);
    }
</script>
<script>
    Dropzone.autoDiscover = false;

    $( document ).ready(function() {
        let err = 0;
        let myDropzone = new Dropzone("#dropzone", {
            paramName: "image",
            addRemoveLinks: false,
            maxFilesize: 12,
            parallelUploads: 2,
            uploadMultiple: false,
            url: "{{ route('admin.products.images.upload') }}",
            autoProcessQueue: false,
        });
        myDropzone.on("queuecomplete", function (file) {
            window.location.reload();
            showNotification('Completed', 'All product images uploaded', 'success', 'fa-check');
        });
        $('#uploadButton').click(function(){
            myDropzone.on('error',function (){
                showNotification('Error', 'File type or size invalid!!.', 'danger', 'fa-close');
            });
            if (myDropzone.files.length === 0) {
                showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
            } else {
                myDropzone.processQueue();
            }
        });
        function showNotification(title, message, type, icon)
        {
            $.notify({
                title: title + ' : ',
                message: message,
                icon: 'fa ' + icon
            },{
                type: type,
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                },
            });
        }
    });
</script>
<script>
$(document).ready(function() {
    $('.meta_tag').tagsinput({
        trimValue: true,
        confirmKeys: [13,44]
    });
    $('.meta_tag').on('itemAdded', function (event) {
        var inputtedTag = event.item;
        inputtedTag2 = inputtedTag.split(' ');
    });

    $(document).on('focusout', '.tagsinput-tag input', function () {
        var smsClass = " ." + $(this).closest('.tagsinput-tag').attr('data-type') + ' ';
        $(smsClass + ' .number_validation_msg').empty();
    });
    $(document).on('keyup', '.tagsinput-tag input', function (event) {
        var smsClass = " ." + $(this).closest('.tagsinput-tag').attr('data-type') + ' ';
        event.preventDefault();
        var key = event.key;
        if (key === 'Backspace') {
            return false;
        }
    });
    $(".tagsinput-tag").bind('paste', function (e) {
        var smsClass = " ." + $(this).closest('.tagsinput-tag').attr('data-type') + ' ';
        var element = this;
        setTimeout(function () {
            var text = $(element).val();
            var target = $(smsClass + ' .msisdn');
            var tags = (text).split(/[ ,]+/);
            for (var i = 0, z = tags.length; i < z; i++) {
                var tag = $.trim(tags[i]);
                target.tagsinput('add', tags[i]);
            }

            $(smsClass + " .tagsinput-tag input").val('');
            $(smsClass + " .tagsinput-tag input").text('');
        }, 0);
    });
});
</script>
</body>
<!-- END: Body-->









