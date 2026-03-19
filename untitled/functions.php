<?php
function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function currentPath()
{
    $requestUri = $_SERVER['REQUEST_URI'] ?? $_SERVER['PHP_SELF'] ?? '';
    return parse_url($requestUri, PHP_URL_PATH) ?? '';
}

function basePath()
{
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    $basePath = str_replace('\\', '/', dirname($scriptName));

    if ($basePath === '/' || $basePath === '.') {
        return '';
    }

    return rtrim($basePath, '/');
}

function appUrl($path = '/')
{
    $normalizedPath = '/' . ltrim($path, '/');
    $base = basePath();

    if ($normalizedPath === '/') {
        return $base === '' ? '/' : $base . '/';
    }

    return ($base === '' ? '' : $base) . $normalizedPath;
}

function urlIs($value)
{
    return currentPath() === appUrl($value);
}
