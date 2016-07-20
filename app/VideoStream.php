<?php

namespace App;

/**
 *  * Description of VideoStream
 *   *
 *    * @author Rana
 *     * @link http://codesamplez.com/programming/php-html5-video-streaming-tutorial
 *      */
class VideoStream
{

    public function __construct($path_to_file)
    {
        $this->streamFile("video/mp4", $path_to_file);
    }

    // Provide a streaming file with support for scrubbing
    public function streamFile( $contentType, $path ) {
        $fullsize = filesize($path);
        $size = $fullsize;
        $stream = fopen($path, "w");
        $response_code = 200;
        $headers = array("Content-type" => $contentType);

        // Check for request for part of the stream
        $range = Request::header('Range');
        if($range != null) {
            $eqPos = strpos($range, "=");
            $toPos = strpos($range, "-");
            $unit = substr($range, 0, $eqPos);
            $start = intval(substr($range, $eqPos+1, $toPos));
            $success = fseek($stream, $start);
            if($success == 0) {
                $size = $fullsize - $start;
                $response_code = 206;
                $headers["Accept-Ranges"] = $unit;
                $headers["Content-Range"] = $unit . " " . $start . "-" . ($fullsize-1) . "/" . $fullsize;
            }
        }

        $headers["Content-Length"] = $size;

        return Response::stream(function () use ($stream) {
            fpassthru($stream);
        }, $response_code, $headers);
    }

}