<?php
!defined('DEX') && die('Access denied');
Class Dir {
     function getDirSize($dir) {
         $handle = opendir($dir);
         while (false!==($FolderOrFile = readdir($handle))) {
             if($FolderOrFile != "." && $FolderOrFile != "..") {
                 if(is_dir("$dir/$FolderOrFile")) {
                     $sizeResult += $this->getDirSize("$dir/$FolderOrFile");
                 } else {
                     $sizeResult += filesize("$dir/$FolderOrFile");
                 }
             }    
         }
         closedir($handle);
         return $sizeResult;
     }

     function getRealSize($size) {
         $kb = 1024;          // Kilobyte
         $mb = 1024 * $kb;    // Megabyte
         $gb = 1024 * $mb;    // Gigabyte
         $tb = 1024 * $gb;    // Terabyte
        
         if($size < $kb) {
             return $size." B";
         } else if($size < $mb) {
             return round($size/$kb,2)." KB";
         } else if($size < $gb) {
             return round($size/$mb,2)." MB";
         } else if($size < $tb) {
             return round($size/$gb,2)." GB";
         } else {
             return round($size/$tb,2)." TB";
         }
     }
}
?>