<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <x-meta />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/39a0ca5659.js" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <style>
        :root{
            --primary:#22A1A7;
            --white:#ffffff;
            --header-bg:#F5F6F7;
            --muted:#6b7280;
            --header-height:64px;
        }

        /* Base layout */
        body{background-color:var(--white) !important; color: #111827}
        .header-fixed{background-color:var(--header-bg) !important; box-shadow: none !important; position: -webkit-sticky; position: sticky; top:0; height:var(--header-height); align-items:center; z-index:9999}
        /* ensure the page content below the header doesn't get hidden */
        .header-fixed + * { padding-top: var(--header-height); }
        .site-footer{background-color:var(--header-bg) !important}

        /* Social icons and lists - inline, minimal */
        .social-links, .social-links ul { list-style: none !important; padding: 0 !important; margin: 0 !important; display:flex; gap:0.5rem; align-items:center }
        .social-links li { list-style: none !important }
        .social-icons a, .social-links a, .product-social-icons a { background-color: transparent !important; color:var(--muted) !important; display:inline-flex; align-items:center; justify-content:center }

        /* Hover rules: if hover changes background to primary, ensure icon/text becomes white for contrast */
        a:hover, .nav-link:hover, .footer-links a:hover { color: var(--primary) !important }
        .social-icons a:hover, .product-social-icons a:hover { background-color: var(--primary) !important; color: #fff !important }

        /* Buttons: hover color primary; if hover provides background, text becomes white */
        .btn:hover, .btn-primary:hover { background-color: var(--primary) !important; border-color: var(--primary) !important; color: #fff !important }

        /* Hero buttons share same look but minimal */
        .view-btn, .fix-btn { background-color: transparent; border: 2px solid var(--primary); color: var(--primary); padding: 10px 48px; border-radius: 6px }
        .view-btn:hover, .fix-btn:hover { background-color: var(--primary) !important; color: #fff !important }

        /* Product details hover */
        .product-details-btn:hover, .product-social-icons a:hover { background-color: var(--primary) !important; color:#fff !important }
        
        /* Header social icons: minimal, get teal bg on hover and white icon */
        .header-fixed .d-none.d-lg-flex a, .header-fixed .d-flex a { padding:6px; border-radius:6px; display:inline-flex; align-items:center; justify-content:center; color: #6b7280 }
        .header-fixed .d-none.d-lg-flex a:hover, .header-fixed .d-flex a:hover { background-color: var(--primary) !important; color: #fff !important }
        .header-fixed .d-none.d-lg-flex a i, .header-fixed .d-flex a i { color: inherit !important }
    </style>
    <style>
        a:hover,
        button:hover,
        .btn:hover,
        .nav-link:hover,
        .dropdown-item:hover,
        .list-group-item:hover,
        .page-link:hover,
        .card:hover {
            color: #22A1A7 !important;
            border-color: #22A1A7 !important;
        }
    </style>
    {!! config('settings.google_analytics') !!}
</head>
<body>
    <livewire:inc.top-menu></livewire:inc.top-menu>
    {{ $slot }}
    <livewire:inc.footer/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @livewireScripts
<script>
    window.addEventListener('alert', event => {
        toastr[event.detail.type](event.detail.message,
            event.detail.title ?? ''), toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    });

    window.addEventListener('close-modal', event => {
        $("#fileDownloadModal_"+event.detail.id).modal('hide')
    });

    $(document).ready(function(){
        $("#imageModal").modal('show');
    });
    $(document).ready(function(){
        $('#carouselFirstIndicators').carousel();
    });
    
</script>
<script> var url = 'https://widget.bot.space/js/widget.js'; var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url; var options = {"enabled":true,"chatButtonSetting":{"backgroundColor":"#13C656","ctaText":"","borderRadius":"25","marginLeft":"20","marginBottom":"80","marginRight":"20","position":"right"},"brandSetting":{"brandName":"Botspace","brandSubTitle":"Typically replies within a day","brandImg":"https://widget.bot.space/images/BotSpaceLogoLight.png","welcomeText":"Hi there! \nHow can I help you?","messageText":"Hello, I have a question.","backgroundColor":"#085E54","ctaText":"Start Chat","borderRadius":"25","autoShow":false,"phoneNumber":"86 16602136043"}}; s.onload = function() { CreateWhatsappChatWidget(options); }; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x); </script>
<!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "710125832736940");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v18.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

</body>
</html>
