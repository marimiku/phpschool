<?php
$schemes = array("ftp", "http", "rtmp", "rtsp", "https", "gopher", "mailto", "news", "nntp", "irc", "smb",
    "prospero", "telnet", "wais", "xmpp", "file", "data", "tel", "afs", "cid", "mid", "mailserver",
    "nfs", "tn3270", "z39.50", "skype", "smsto", "ed2k", "market", "steam", "bitcoin", "ob", "tg");
$general_upper_level_domains = array("com", "net", "org", "info", "biz", "name", "aero", "arpa",
    "edu", "int", "gov", "mil", "coop", "museum", "mobi", "pro", "tel", "travel", "xxx");
$geo_upper_level_domains = array("ac", "ad", "ae", "af", "ag", "ai", "al", "am", "an", "ao", "aq", "ar", "as",
    "at", "au", "aw", "az", "ba", "bb", "bd", "be", "bf", "bg", "bh", "bi", "bj", "bm", "bn", "bo", "br", "bs",
    "bt", "bv", "bw", "by", "bz", "ca", "cc", "cd", "cf", "cg", "ch", "ci", "ck", "cl", "cm", "cn", "co", "cr",
    "cu", "cv", "cx", "cy", "cz", "de", "dj", "dk", "dm", "do", "dz", "ec", "ee", "eg", "eh", "er", "es", "et",
    "eu", "fi", "fj", "fk", "fm", "fo", "fr", "ga", "gd", "ge", "gf", "gg", "gh", "gi", "gl", "gm", "gn", "gp",
    "gq", "gr", "gs", "gt", "gu", "gw", "gy", "ua", "ru", "us", "vn", " . vu", " wf", "ws", "ye", "yt", "yu", "za",
    "zm", "zw");

$has_compulsory_parts = function ($url) {
    return (array_key_exists("scheme", $url) && (array_key_exists("host", $url))) ? true : false;
};

$has_valid_scheme = function ($url, $schemes) {
    return (in_array($url['scheme'], $schemes)) ? true : false;
};

function has_valid_1st_level_domain($domain, $general_upper_level_domains, $geo_upper_level_domains)
{
    return (in_array($domain, $general_upper_level_domains) || in_array($domain, $geo_upper_level_domains)) ? true : false;
}

function has_valid_2nd_level_domain($domain, $general_upper_level_domains)
{
    return (in_array($domain, $general_upper_level_domains)) ? true : false;
}

$host_explode = function ($url, $gen_uld, $geo_uld) {
    $pieces = explode(".", $url['host']);
    $counter = count($pieces);
    $path = array();
    if (strcmp($pieces[0], "www") == 0) {
        $path += ['subdomain' => 'www'];
        array_shift($pieces);
        $counter--;
    }
    foreach ($pieces as $value) {
        $path += [$counter . '-level-domain' => $value];
        $counter--;
        if (isset($path['1-level-domain']) && !has_valid_1st_level_domain($path['1-level-domain'], $gen_uld, $geo_uld) ||
            (isset($path['2-level-domain']) && !has_valid_2nd_level_domain($path['2-level-domain'], $gen_uld))
        )
            return NULL;
    }
    return $path;
};

if (isset($argv[1])) {
    $parsed_url = parse_url($argv[1]);
} else {
    $parsed_url = parse_url("https://www.checkroom.com.ua/romantichnoe-plate-sakura-daminika");
}
if (!$has_compulsory_parts($parsed_url)) {
    echo "ERROR! Invalid URL. There are no scheme or host.";
} else {
    if (!$has_valid_scheme) {
        echo "ERROR! Invalid scheme.";
    } else {
        $result = $host_explode($parsed_url, $general_upper_level_domains, $geo_upper_level_domains);
        if (is_null($result)) {
            echo "ERROR! Invalid X-level domain.";
        } else {
            $parsed_url['host'] = $result;
            print_r($parsed_url);
        }
    }
}
