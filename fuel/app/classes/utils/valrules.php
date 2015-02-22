<?php

class Utils_Valrules
{
    public static function _validation_unique($val, $options)
    {
        list($table, $field) = explode('.', $options);

        $result = DB::select("LOWER(\"$field\")")
        ->where($field, '=', Str::lower($val))
        ->from($table)->execute();

        return ! ($result->count() > 0);
    }
    
    public static function _validation_imgmaxsize($val,$file)
    {
        $sizeLimit = 1048576;
        return $_FILES[$file]["size"] < $sizeLimit;
    }
    
    public static function _validation_val_ext($val,$file)
    {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES[$file]["name"]);
        $extension = strtolower(end($temp));
        
        return in_array($extension, $allowedExts);
    }

}
?>
