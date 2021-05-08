<?php


namespace app\services;


class blogService
{
    private function CompressImage($source, $destination, $quality){
        // Obtenemos la información de la imagen
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime'];

        // Creamos una imagen
        switch($mime){
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                break;
            default:
                $image = imagecreatefromjpeg($source);
        }

        // Guardamos la imagen
        imagejpeg($image, $destination, $quality);

        // Devolvemos la imagen comprimida
        return $destination;
    }

    public function Saveimg($fileType , $imageTemp, $imageUploadPath, $path){
        $quality=80;
        $allowTypes = array('jpg','png','jpeg');
        if (in_array($fileType, $allowTypes)) {
                if(!file_exists($path)){
                    mkdir($path,0777,true);

                    if (file_exists($path)) {
                        $compressedImage = $this->CompressImage($imageTemp,$imageUploadPath,$quality);
                        if( $compressedImage ) {
                            return $imageUploadPath;
                        }
                        else{
                            echo "<script>alert('Error al subir el imagen')</script>";
                        }

                    }
                }elseif (file_exists($path)) {
                    $compressedImage = $this->CompressImage($imageTemp,$imageUploadPath,$quality);
                    if( $compressedImage ) {
                        return $imageUploadPath;
                    }
                    else{
                        echo "<script>alert('Error al subir el archivo')</script>";
                    }
                }

        } else {
            echo "<script>alert('El archivo adjunto solo acepta, jpeg jpg y png.')</script>";

        }
    }
}