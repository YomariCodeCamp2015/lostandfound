<?php

class Utils_Readfile
{

    public static function getFile($path)
    {
        if (is_dir(DOCROOT . $path)) {
            $contents = File::read_dir(DOCROOT . $path);
            if (!empty($contents) && is_array($contents)) {

                foreach ($contents as $ind => $file) {
                    if (is_array($file))
                        continue;
                    $logoimage = $path . $file;
                }
            }
            if (isset($logoimage)) {
                return $logoimage;
            } else {
                return null;
            }
        }
    }
	
	public static function getFiles($path)
    {
        if (is_dir(DOCROOT . $path)) {
            $contents = File::read_dir(DOCROOT . $path);
            if (!empty($contents) && is_array($contents)) {

                foreach ($contents as $ind => $file) {
                    if (is_array($file))
                        continue;
                    $logoimage[] = $path . $file;
                }
            }
            if (isset($logoimage)) {
                return $logoimage;
            } else {
                return null;
            }
        }
    }

}

?>
