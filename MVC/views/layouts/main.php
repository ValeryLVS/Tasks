<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="yandex-verification" content="4a577c0d43eab86b" />

    <title>SpecAutoRegion</title>

    <link rel="shortcut icon" href="/images/icons/icon.png" style="border-radius: 50%" type="image/png">

    <link rel="stylesheet" href="/style/main.css">
    <link rel="stylesheet" href="/style/slider.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
</head>

<body>

    <?= $menu ?>
    <?= $content ?>
    <?= $footer ?>

    <script src="/scripts/sliderFeedback.js"></script>
    <script src="/scripts/sliderGallery.js"></script>
    <script src="/scripts/send.js"></script>
    <script src="/scripts/button.js"></script>

    <script>
        grecaptcha.ready(function(){

            grecaptcha.execute('<?php echo SITE_KEY;?>', {action: 'homepage'})

                .then(function(token){

                    document.getElementById('g-recaptcha-response').value=token;

                });

        });

    </script>

    <!-- Yandex.Metrika counter -->
    <script>
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(76255402, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/76255402" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

</body>

</html>