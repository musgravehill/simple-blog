<?php

class cacheResponse {

    private static $_lastClearDateDir = '/cache/lastClearDate/';
    private static $_clearCacheEvery = 3600; //s every *** try to clear expired files
    
    private static $_musicCacheDir = '/cache/musicResponse/';
    private static $_musicResponseExpired = 7200; // 2592000s = 30d
    private static $_lastClearDateMusicResponseFile = 'lastClearDateMusicResponse.txt';
    private static $_lyricsCacheDir = '/cache/lyricsResponse/';
    private static $_lyricsResponseExpired = 7200; // 2592000s = 30d
    private static $_lastClearDateLyricsResponseFile = 'lastClearDateLyricsResponse.txt';

    public static function getMusicResponse($query, $offset, $count) {
        $fileName = md5($query . $offset . $count) . '.json';
        $cache_dir = $_SERVER['DOCUMENT_ROOT'] . self::$_musicCacheDir;
        if (self::_file_exist($fileName, $cache_dir)) {
            return file_get_contents($cache_dir . $fileName);
        } else {
            return false;
        }
    }

    public static function saveMusicResponse($query, $offset, $count, $jsonResponse) {
        $fileName = md5($query . $offset . $count) . '.json';
        $cache_dir = $_SERVER['DOCUMENT_ROOT'] . self::$_musicCacheDir;
        $handle = fopen($cache_dir . $fileName, 'wt');
        fwrite($handle, $jsonResponse);
        fclose($handle);
        self::_clearCacheExpired(self::$_lastClearDateMusicResponseFile, self::$_musicCacheDir, self::$_musicResponseExpired);
        return true;
    }

    public static function getLyricsResponse($lyricsID) {
        $fileName = $lyricsID . '.txt';
        $cache_dir = $_SERVER['DOCUMENT_ROOT'] . self::$_lyricsCacheDir;
        if (self::_file_exist($fileName, $cache_dir)) {
            return file_get_contents($cache_dir . $fileName);
        } else {
            return false;
        }
    }

    public static function saveLyricsResponse($lyricsID, $txtResponse) {
        $fileName = $lyricsID . '.txt';
        $cache_dir = $_SERVER['DOCUMENT_ROOT'] . self::$_lyricsCacheDir;
        $handle = fopen($cache_dir . $fileName, 'wt');
        fwrite($handle, $txtResponse);
        fclose($handle);
        self::_clearCacheExpired(self::$_lastClearDateLyricsResponseFile, self::$_lyricsCacheDir, self::$_lyricsResponseExpired);
        return true;
    }
    /** 
     * Чистит папку кеша раз в сутки
     * @param type $fileTimeLastClear - файл с датой последней чистки
     * @param type $clearDir - какую папку чистить от старых файлов
     * @param type $expiredTime  - время протухания файлов
     */
    private static function _clearCacheExpired($fileTimeLastClear, $clearDir, $expiredTime) {
        if (!self::_isNeedClearCacheNow($fileTimeLastClear)) {  //cacheDir was NOT clear today
            //delete expired files: dateFileCreate  > 30d
            self::_clearExpiredFiles($expiredTime, $_SERVER['DOCUMENT_ROOT'] . $clearDir);
            $handle = fopen($_SERVER['DOCUMENT_ROOT'] . self::$_lastClearDateDir . $fileTimeLastClear, 'wt');
            fwrite($handle, time());
            fclose($handle);
        }
    }

    private static function _file_exist($fileName, $cache_dir) {
        return (@fopen($cache_dir . $fileName, 'r')) ? true : false;
    }

    private static function _isNeedClearCacheNow($fileTimeLastClear) {
        //was cacheDir cleared today?
        $lastClearDate = file_get_contents($_SERVER['DOCUMENT_ROOT'] . self::$_lastClearDateDir . $fileTimeLastClear);
        (time() - (int) $lastClearDate > self::$_clearCacheEvery) ? $res = false : $res = true;
        return $res;
    }

    private static function _clearExpiredFiles($expire_time = 2592000, $cacheDir) {
        if (is_dir($cacheDir)) {
            if ($dh = opendir($cacheDir)) {
                while (($file = readdir($dh)) !== false) {
                    $time_delta = time() - filemtime($cacheDir . $file);
                    if (($time_delta > $expire_time) && (is_file($cacheDir . $file))) {
                        unlink($cacheDir . $file);
                    }
                }
                closedir($dh);
            }
        }
    }

}
