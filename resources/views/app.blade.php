<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ isset($title) ? "$title - " : "" }}DevToolz from Seth Phat</title>
    <meta property="og:title" content="{{ isset($title) ? "$title - " : "" }}DevToolz from Seth Phat">
    <meta property="og:description" content="{{ isset($description) ? "$description. " : "" }}Opinionated DevToolz to increase Development Experience (DX). Built from personal preferences.">
    <meta property="og:type" content="website">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css /">
</head>
<body class="g-sidenav-show g-sidenav-pinned">
    <div id="app"></div>
    @vite('resources/js/app.ts')
    <noscript>
        <p>This site requires JavaScript to work.</p>
    </noscript>
</body>
</html>
