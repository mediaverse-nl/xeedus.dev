<?php
/**
 * Created by PhpStorm.
 * User: masterrace
 * Date: 22/07/16
 * Time: 03:04
 */

namespace App\Helpers;

use Request;

use Illuminate\Http\Response;

//https://gist.github.com/vluzrmos/993d400739dd2e9aa47d

/**
 *  * Description of VideoStream
 *   *
 *    * @author Rana
 *     * @link http://codesamplez.com/programming/php-html5-video-streaming-tutorial
 *      */

class VideoStream
{

    private $path = "";
    private $stream = "";
    private $buffer = 102400;
    private $start  = -1;
    private $end    = -1;
    private $size   = 0;

    function __construct($filePath)
    {
        $this->path = $filePath;
    }

    /**
     * Open stream
     */
    private function open()
    {
        if (!($this->stream = fopen($this->path, 'rb'))) {
            die('Could not open stream for reading');
        }

    }

    /**
     * Set proper header to serve the video content
     */
    private function setHeader()
    {
        ob_get_clean();
        header("Content-Type: video/mp4");
        header("Cache-Control: max-age=2592000, public");
        header("Expires: ".gmdate('D, d M Y H:i:s', time()+2592000) . ' GMT');
        header("Last-Modified: ".gmdate('D, d M Y H:i:s', @filemtime($this->path)) . ' GMT' );
        $this->start = 0;
        $this->size  = filesize($this->path);
        $this->end   = $this->size - 1;
        header("Accept-Ranges: 0-".$this->end);

        if (isset($_SERVER['HTTP_RANGE'])) {

            $c_start = $this->start;
            $c_end = $this->end;

            list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
            if (strpos($range, ',') !== false) {
                header('HTTP/1.1 416 Requested Range Not Satisfiable');
                header("Content-Range: bytes $this->start-$this->end/$this->size");
                exit;
            }
            if ($range == '-') {
                $c_start = $this->size - substr($range, 1);
            }else{
                $range = explode('-', $range);
                $c_start = $range[0];

                $c_end = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $c_end;
            }
            $c_end = ($c_end > $this->end) ? $this->end : $c_end;
            if ($c_start > $c_end || $c_start > $this->size - 1 || $c_end >= $this->size) {
                header('HTTP/1.1 416 Requested Range Not Satisfiable');
                header("Content-Range: bytes $this->start-$this->end/$this->size");
                exit;
            }
            $this->start = $c_start;
            $this->end = $c_end;
            $length = $this->end - $this->start + 1;
            fseek($this->stream, $this->start);
            header('HTTP/1.1 206 Partial Content');
            header("Content-Length: ".$length);
            header("Content-Range: bytes $this->start-$this->end/".$this->size);
        }
        else
        {
            header("Content-Length: ".$this->size);
        }

    }

    /**
     * close curretly opened stream
     */
    private function end()
    {
        fclose($this->stream);
        exit;
    }

    /**
     * perform the streaming of calculated range
     */
    private function stream()
    {
        $i = $this->start;
        set_time_limit(0);
        while(!feof($this->stream) && $i <= $this->end) {
            $bytesToRead = $this->buffer;
            if(($i+$bytesToRead) > $this->end) {
                $bytesToRead = $this->end - $i + 1;
            }
            $data = fread($this->stream, $bytesToRead);
            echo $data;
            flush();
            $i += $bytesToRead;
        }
    }

    /**
     * Start streaming video content
     */
    function start()
    {
        $this->open();
        $this->setHeader();
        $this->stream();
        $this->end();
    }

//    public function __construct($path_to_file)
//    {
//        $this->streamFile($path_to_file, "video/mp4");
//    }
//
//    // Provide a streaming file with support for scrubbing
//    public function streamFile($path, $contentType ) {
//        $fullsize = filesize($path);
//        $size = $fullsize;
//        $stream = fopen($path, "r");
//        $response_code = 200;
//        $headers = array("Content-type" => $contentType);
//
//        // Check for request for part of the stream
//        $range = Request::header('Range');
////        Request::header();
//        if($range != null) {
//            $eqPos = strpos($range, "=");
//            $toPos = strpos($range, "-");
//            $unit = substr($range, 0, $eqPos);
//            $start = intval(substr($range, $eqPos+1, $toPos));
//            $success = fseek($stream, $start);
//            if($success == 0) {
//                $size = $fullsize - $start;
//                $response_code = 206;
//                $headers["Accept-Ranges"] = $unit;
//                $headers["Content-Range"] = $unit . " " . $start . "-" . ($fullsize-1) . "/" . $fullsize;
//            }
//        }
//
//        $headers["Content-Length"] = $size;
//
//        return Response::stream(function () use ($stream) {
//            fpassthru($stream);
//        }, $response_code, $headers);
//    }

}