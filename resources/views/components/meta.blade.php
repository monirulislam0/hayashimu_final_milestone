<div>
    <title>{{ $pageTitle  .' | '.$pageSubTitle }}</title>
    <meta name="description" content="{{ isset($metaDescription) ? $metaDescription : '' }}" />
    <meta name="keywords" content="{{ isset($metaTitle) ? $metaTitle : '' }}" />
    <meta name="tag" content="{{ isset($metaTags) ? $metaTags : '' }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</div>
