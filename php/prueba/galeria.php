<?php
// START OF PARAMETERS SECTION
$doc_title = "Galeria de imagenes"; //web page title
$columns=4;                  //number of images per line 
$ratio=5;                    //ratio imageSize / thumbnailImageSize 
$quality=5;                  //thumbnail image quality (0: worst to 100:best)
$scriptname= "perfil.php";    //filename of this script 
$thumb_dir = "thumb";        //directory created to stored small images
$thumb_prefix = "thumb_";    //prefix for generated images
// END OF PARAMETERS SECTION

echo "<html>\n<head>\n<title>$doc_title</title>\n";
echo "<body bgcolor=white>\n</head>\n\n\n";
echo  "<center>\n<P><BR><BR>\n\n";

$mydirectory= "../temporal/".$_SESSION['email'];          //directory in which images are fetched 
$counter=0;
$nbfiles = 0;
$currfile =  "../temporal/".$_SESSION['email']."/";
$filestab[0] =  "";

$handle=opendir($mydirectory);

//create a directory for thumbnail images
$ishome=$currfile;
while ($currfile = readdir($handle))  
{
// We get the extension of the current file and keep only image files 
   $extension= strtolower(substr( strrchr( $currfile,  "." ), 1 ));  
   if ($extension== "gif" || $extension== "jpg" || $extension== "jpeg" ||
       $extension== "png")
   {
      $nbfiles++;
      $currfile = trim($currfile);
      $filestab[$nbfiles] = $currfile;

      if ($ishome ==  "")
      {
         $size = getimagesize($currfile);
         $width = $size[0] / $ratio;
         $height = $size[1] / $ratio;
         $format = $size[2]; //1 = GIF, 2 = JPG, 3 = PNG, 5 = PSD, 6 = BMP

        $currthumbfile = "./" . $thumb_dir . "/" . $thumb_prefix . $currfile;
        if (! file_exists($currthumbfile))
        {
			$im = imagecreatefromjpeg($currfile);
           //GIF format is not supported anymore by GD lib...
           /*if ($format == 2) //JPG
                 */
           if (!$im)
           {
               $currthumbfile = $currfile;
           }
           else
           {  
              imagejpeg($im, $currthumbfile, $quality);
              imagedestroy($im);
           }
        }

        $currfile = str_replace(" ","%20",$currfile); // Allow filenames with space characters
        $currthumbfile = str_replace(" ","%20",$currthumbfile); // Allow filenames with space characters

         echo  "<A HREF=$scriptname?ishome=1&filename=$currfile&filenumber=$nbfiles>\n";
         echo  "<IMG SRC=$currthumbfile WIDTH=$width HEIGHT=$height";
         $currfile = str_replace("%20"," ",$currfile); // Clean display of filenames with space characters
         echo " alt=\"Enlarge $currfile\">\n";
         $currfile = str_replace(" ","%20",$currfile);   //Clean display of filenames with space characters
         echo  "</A>\n";
         $counter++;
         if ($counter == $columns)
         {
            $counter = 0;
            echo  "<P><P><BR>";
         }
      }
   }
}
closedir($handle);

if ($ishome == 1)
{
   echo  "<P>\n";
   $filename = str_replace(" ","%20",$filename);   // Allow filenames with space characters
   $filename = stripslashes($filename);   // Allow filenames with ' characters
   echo  "<IMG SRC=$filename>\n";
   $display = str_replace("%20"," ",$filename);   // Clean display of filenames with space characters
   echo "<br><b> $display </b><br>";
   echo  "<P><BR>\n\n";

   if ($filenumber != 1)
   {
      $prevnumber = $filenumber - 1;
      $filestab[$prevnumber] = str_replace(" ","%20",$filestab[$prevnumber]);   // Allow filenames with space characters
      echo  "[<A HREF=$scriptname?ishome=1&filename=$filestab[$prevnumber]&filenumber=$prevnumber>";
      echo  " << Previous</A>]  \n";
   }

   echo  " &nbsp;&nbsp;[<A HREF=$scriptname>Main Page</A>]&nbsp;&nbsp;\n";
   echo  "  \n" ;
   if ($filenumber != $nbfiles)
   {
      $nextnumber = $filenumber + 1;
      $filestab[$nextnumber] = str_replace(" ","%20",$filestab[$nextnumber]);   // Allow filenames with space characters
      echo  "[<A HREF=$scriptname?ishome=1&filename=$filestab[$nextnumber]&filenumber=$nextnumber>";
      echo  "Next >></A>]\n";
   }

   echo "\n\n";
}
?> 
