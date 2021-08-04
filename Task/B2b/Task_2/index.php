<?php
// URL который нам нужен:
$urlTask = "https://www.somehost.com/?param4=1&param3=2&param1=4&url=%2Ftest%2Findex.html";

//URL который приходит
$url = 'https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3';

function getUrl($url)
{
    return parse_url($url);
}

function getScheme($urlNew)
{
    return $urlNew['scheme'];
}

function getHost($urlNew)
{
    return $urlNew['host'];
}

function getParams($urlNew)
{
    $urlNew['query'] = explode('&', $urlNew['query']);

    $params = [];
    $value = [];

    foreach ($urlNew['query'] as $key => $item) {

        $item = (explode('=', $item));

        if ($item[1] == 3) {
            continue;
        }

        $params["{$key}"] = $item[0];
        $value[] = "$item[1]";
    }

    $result = array_combine($params, $value);
    krsort($result);
    $result += ["url" => $urlNew['path']];

    return http_build_query($result);
}

function gathering($scheme, $host, $params)
{
    return $scheme . '://' . $host . '/?' . $params;
}

$urlNew = getUrl($url);
$scheme = getScheme($urlNew);
$host = getHost($urlNew);
$params = getParams($urlNew);
$urlNew = gathering($scheme, $host, $params);

echo ($urlNew == $urlTask) ? "URL = равны" : "URL = не равны";