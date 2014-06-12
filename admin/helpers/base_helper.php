<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

function simple_date($time, $format = "Y-m-d H:i:s") {
    return date($format, strtotime($time));
}

function format_time_created($start, $end = "NOW") {
    $sdate = strtotime($start);
    $edate = strtotime($end);

    $time = $edate - $sdate;
    if ($time >= 0 && $time <= 59) {
        $timeshift = $time . ' seconds ago';
    } elseif ($time >= 60 && $time <= 3599) {
        $pmin = ($edate - $sdate) / 60;
        $premin = explode('.', $pmin);
        $presec = $pmin - $premin[0];
        $sec = $presec * 60;
        $timeshift = $premin[0] . ' minute ago';
    } elseif ($time >= 3600 && $time <= 86399) {
        $phour = ($edate - $sdate) / 3600;
        $prehour = explode('.', $phour);
        $premin = $phour - $prehour[0];
        $min = explode('.', $premin * 60);
        $presec = '0.' . $min[1];
        $sec = $presec * 60;
        if ($prehour[0] > 12)
            $timeshift = '';
        else
            $timeshift = $prehour[0] . ' hour ago';
    } else {
        $timeshift = '';
    }
    return $timeshift;
}

function debug($arr) {
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function ascii_link($str = '') {
    $chars = array(
        'a' => array('ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ă', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ă'),
        'e' => array('ế', 'ề', 'ể', 'ễ', 'ệ', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê'),
        'i' => array('í', 'ì', 'ỉ', 'ĩ', 'ị', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị'),
        'o' => array('ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'Ố', 'Ồ', 'Ổ', 'Ô', 'Ộ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ơ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ơ'),
        'u' => array('ứ', 'ừ', 'ử', 'ữ', 'ự', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư'),
        'y' => array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'),
        'd' => array('đ', 'Đ'),
    );
    foreach ($chars as $key => $arr)
        $str = str_replace($arr, $key, $str);

    $str = preg_replace("/[^a-z0-9]/i", ' ', strtolower($str)); // a-z - . space
    $str = preg_replace("/\s{2,}/i", ' ', trim($str)); // Replace 2 or more space = 1 space
    $str = str_replace(' ', '-', $str);

    return $str;
}

function compress_html_output($buffer) {
    $arr_reg = array(
        '/\>[^\S ]+/s' => '>',
        '/[^\S ]+\</s' => '<',
        '/(\s)+/s' => '\\1', // shorten multiple whitespace sequences
        '#(?://)?<!\[CDATA\[(.*?)(?://)?\]\]>#s' => "//<![CDATA[\n" . '\1' . "\n//]]>" //leave CDATA alone
    );
    $output = preg_replace(array_keys($arr_reg), array_values($arr_reg), $buffer);
    return $output;
}

function rand_number() {
    return rand(1000000, 9999999999);
}

/**
 * truncate_html can truncate a string up to a number of characters while preserving whole words and HTML tags
 *
 * @param string $text String to truncate.
 * @param integer $length Length of returned string, including ellipsis.
 * @param string $ending Ending to be appended to the trimmed string.
 * @param boolean $exact If false, $text will not be cut mid-word
 * @param boolean $considerHtml If true, HTML tags would be handled correctly
 *
 * @return string Trimmed string.
 */
function truncate_html($text, $length = 300, $ending = '...', $exact = false, $considerHtml = true) {
    if ($considerHtml) {
        // if the plain text is shorter than the maximum length, return the whole text
        if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
        }
        // splits all html-tags to scanable lines
        preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
        $total_length = strlen($ending);
        $open_tags = array();
        $truncate = '';
        foreach ($lines as $line_matchings) {
            // if there is any html-tag in this line, handle it and add it (uncounted) to the output
            if (!empty($line_matchings[1])) {
                // if it's an "empty element" with or without xhtml-conform closing slash
                if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                    // do nothing
                    // if tag is a closing tag
                } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                    // delete tag from $open_tags list
                    $pos = array_search($tag_matchings[1], $open_tags);
                    if ($pos !== false) {
                        unset($open_tags[$pos]);
                    }
                    // if tag is an opening tag
                } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                    // add tag to the beginning of $open_tags list
                    array_unshift($open_tags, strtolower($tag_matchings[1]));
                }
                // add html-tag to $truncate'd text
                $truncate .= $line_matchings[1];
            }
            // calculate the length of the plain text part of the line; handle entities as one character
            $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
            if ($total_length + $content_length > $length) {
                // the number of characters which are left
                $left = $length - $total_length;
                $entities_length = 0;
                // search for html entities
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                    // calculate the real length of all entities in the legal range
                    foreach ($entities[0] as $entity) {
                        if ($entity[1] + 1 - $entities_length <= $left) {
                            $left--;
                            $entities_length += strlen($entity[0]);
                        } else {
                            // no more characters left
                            break;
                        }
                    }
                }
                $truncate .= substr($line_matchings[2], 0, $left + $entities_length);
                // maximum lenght is reached, so get off the loop
                break;
            } else {
                $truncate .= $line_matchings[2];
                $total_length += $content_length;
            }
            // if the maximum length is reached, get off the loop
            if ($total_length >= $length) {
                break;
            }
        }
    } else {
        if (strlen($text) <= $length) {
            return $text;
        } else {
            $truncate = substr($text, 0, $length - strlen($ending));
        }
    }
    // if the words shouldn't be cut in the middle...
    if (!$exact) {
        // ...search the last occurance of a space...
        $spacepos = strrpos($truncate, ' ');
        if (isset($spacepos)) {
            // ...and cut the text in this position
            $truncate = substr($truncate, 0, $spacepos);
        }
    }
    // add the defined ending to the text
    $truncate .= $ending;
    if ($considerHtml) {
        // close all unclosed html-tags
        foreach ($open_tags as $tag) {
            $truncate .= '</' . $tag . '>';
        }
    }
    return $truncate;
}

//use example
//$sql = 'select * from golftec where myname = ? and mysql in (?) AND name in (?) and date = ?';
//$params = array('dll', array(1, 2, '334s'), array(7), 123);
function sql_bind_prepare(&$sql, &$params) {
    $params_new = array();
    $sql_arr = explode('?', $sql);
    $sql_new = array($sql_arr[0]);
    foreach ($params as $key => $param) {
        if (!is_array($param)) {
            $params_new[] = $param;
        } else if (count($param)) {
            $param = array_values($param);
            foreach ($param as $key2 => $subparam) {
                $params_new[] = $subparam;
                if ($key2)
                    $sql_new[] = ',';
            }
        } else {
            return false;
        }
        $sql_new[] = $sql_arr[$key + 1];
    }
    $params = $params_new;
    $sql = implode('?', $sql_new);
    return true;
}