<?php

use Jenssegers\Blade\Blade;

class AH
{

    public static function jEnv($key)
    {
        return $_ENV[$key];
    }

    public static function randomNumber()
    {
        return random_int(100000, 999999);
    }

    public static function randomFloat(float $minValue, float $maxValue): float
    {
        return $minValue + mt_rand() / mt_getrandmax() * ($maxValue - $minValue);
    }

    public static function redirectToLogin()
    {
        $_SESSION['login_redirect'] = $_SERVER['REQUEST_URI'];
        AH::redirectWithFlash("/login", "Login to Proceed", "danger");
    }

    public static function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        $blade = new Blade(array('modules/site/views'), 'cache');
        echo $blade->make("not_found", array())->render();
        die;
    }

    public static function pf($data)
    {
        print "<pre>";
        print_r($data);
        die;
    }
    public static function vd($data)
    {
        print "<pre>";
        print_r($data);
    }

    public static function get($arr, $key, $default = null)
    {
        return array_key_exists($key, $arr) ? $arr[$key] : $default;
    }

    public static function generateUUID()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    public static function generateUuidV4()
    {
        $data = random_bytes(16);
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40); // Set version to 0100
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80); // Set variant to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }


    public static function sendJsonResponseWithFlash($data, $code = 200)
    {
        $_SESSION['flash']["type"] = $data["success"] == true ? "success" : "danger";
        $_SESSION['flash']["message"] = $data['message'];
        echo json_encode($data);
        die;
    }

    public static function sendJsonResponse($data, $code = 200)
    {
        echo json_encode($data);
        die;
    }

    // TODO we may have to format the response based on the error code
    public static function sendTextResponse($text, $code = 500)
    {
        echo $text;
        die;
    }

    public static function getIpDetails($ip)
    {
        $json = file_get_contents("http://ipinfo.io/{$ip}?token=68249d2022cd2a");
        $details = json_decode($json);
        return $details;
    }

    public static function generateHash()
    {
        $pre_hash = time() . rand() . $GLOBALS['REMOTE_ADDR'] . microtime();

        $session_hash = md5($pre_hash);
        $hash = substr(md5($session_hash . time()), 0, 16);

        return $hash;
    }

    public static function arraysEqual($a, $b)
    {
        return (count($a) == count($b) && !array_diff($a, $b)) ? true : false;
    }

    public static function floowr2Decimal($value)
    {
        intval(floor($value * 100) / 100);
    }

    public static function getRandomColor()
    {
        $random_color = 'text-primary';

        $random_color_count = rand(1, 5);
        switch ($random_color_count) {
            case 1:
                $random_color = 'text-primary';
                break;
            case 2:
                $random_color = 'text-info';
                break;
            case 3:
                $random_color = 'text-warning';
                break;
            case 4:
                $random_color = 'text-success';
                break;
            case 5:
                $random_color = 'text-danger';
                break;
        }

        return $random_color;
    }

    public static function cookieRedirectWithFlash($url, $message, $type = "error")
    {
        setcookie("flash_message", $message, time() + 5, "/");
        setcookie("flash_type", $type, time() + 5, "/");
        header("Location: {$url}");
        die;
    }

    public static function redirect($url, $code = null)
    {
        if ($code === 301) {
            header("HTTP/1.1 301 Moved Permanently");
        }
        header("Location: " . $url);
        die;
    }
    public static function redirectBackNoMessage()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die;
    }


    public static function redirectBack($message, $type = "danger")
    {
        $_SESSION['flash']["type"] = "error" == $type ? 'danger' : $type;
        $_SESSION['flash']["message"] = $message;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die;
    }

    public static function redirectWithFlash($url, $message, $type = "danger")
    {
        $_SESSION['flash']["type"] = "error" == $type ? 'danger' : $type;
        $_SESSION['flash']["message"] = $message;
        header("Location: " . $url);
        die;
    }

    public static function validateEmail($email)
    {
        if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)) {
            return true;
        } else {
            return false;
        }
    }

    // function to see the request is from bot or not
    public static function botDetected()
    {
        return (isset($_SERVER['HTTP_USER_AGENT'])
            && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT']));
    }

    public static function dashesToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace(' ', '', ucwords(str_replace(array("-", "_"), ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }

    public static function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

    public static function endsWith($haystack, $needle)
    {
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }

    public static function timeago($ptime)
    {

        $estimate_time = time() - $ptime;

        if ($estimate_time < 1) {
            return 'Just now';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $estimate_time / $secs;

            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
            }
        }
    }

    public static function daysDiff($fromTime, $endTime)
    {
        $timeDiff = strtotime($endTime) - strtotime($fromTime);
        $numberDays = $timeDiff / (60 * 60 * 24);
        return intval($numberDays);
    }

    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function getHash($input_id)
    {
        $hash_secret = 'Charles2020';
        return hash_hmac('ripemd160', strval($input_id), $hash_secret);
    }

    public static function getTimeElapsed($fromTime = '')
    {
        if ($fromTime == '') {
            $fromTime = date("Y-m-d H:i:s");
        }
        $new_time = date("Y-m-d H:i:s");
        $diff = strtotime($new_time) - strtotime($fromTime);
    }

    public static function generateToken($length = 32)
    {
        return bin2hex(random_bytes($length));
    }
}
