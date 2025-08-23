<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

@include('includes.head')

<body class="font-inter antialiased bg-gray-50 text-gray-900 tracking-tight">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VWMZXC32G9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-VWMZXC32G9');
    </script>

    <!-- Page wrapper -->
    <div class="flex flex-col min-h-screen overflow-hidden supports-[overflow:clip]:overflow-clip">

        <?php if (true != $removeHeader): ?>
            <?php if(!$waitlistPage && !$errorPage): ?>
                @include('includes.header')
            <?php else: ?>
                @include('includes.wl_header')
            <?php endif; ?>
        <?php endif; ?>

        @yield('content')
        
        @include('includes._common_modal')

        <?php if(true != $removeFooter): ?>
            <?php if(!$waitlistPage && !$errorPage): ?>
                @include('includes.footer')
            <?php else: ?>
                @include('includes.wl_footer')
            <?php endif;?>
        <?php endif;?>

        @include('includes.toast')
    </div>
    
    <script src="/simple-html/js/vendors/focus.min.js" defer></script><!-- Focus plugin: https://alpinejs.dev/plugins/focus -->
    <script src="/simple-html/js/vendors/alpinejs.min.js" defer></script>
    <script src="/simple-html/js/vendors/aos.js"></script>
    <script src="/simple-html/js/main.js"></script>

    <script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script><script id="zsiqscript" src="https://salesiq.zohopublic.in/widget?wc=siq30e5bd89640897b09af6287e1bebbbef0c618d7f4ec88f1bbd9e7c5e6fc930cb" defer></script>

</body>

</html>