<?php

/**
 * Class Solution
 * 44. 通配符匹配
 * @link https://leetcode-cn.com/problems/wildcard-matching/
 */
class Solution
{

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p)
    {
        $m = strlen($s);
        $n = strlen($p);
        $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, false));
        $dp[0][0] = true;
        for ($i = 1; $i <= $n; $i++) {
            if ($p[$i - 1] == '*') {
                $dp[0][$i] = true;
            } else {
                break;
            }
        }
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($p[$j - 1] == '*') {
                    $dp[$i][$j] = $dp[$i][$j - 1] || $dp[$i - 1][$j];
                } else if ($p[$j - 1] == '?' || $s[$i - 1] == $p[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                }
            }
        }
        return $dp[$m][$n];
    }
}

$obj = new Solution();
$res = $obj->isMatch('aa', 'a');
var_dump($res);