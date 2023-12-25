<?php

class gl
{
    static public function debug($data)
    {
        echo '<pre class="debug">' . print_r(htmlencode($data, config('constants.HTML_ENCODE_MODE')), true) . '</pre>';
    }

}
