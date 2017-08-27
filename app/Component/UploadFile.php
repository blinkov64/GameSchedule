<?php

namespace Schedule\Component;

class UploadFile {
    
    public function upload($request, $fileName, $folder)
    {
        $uploadedFiles = $request->getUploadedFiles();
        $uploadedLogo = $uploadedFiles['logo'];
        if ($uploadedLogo->getError() === UPLOAD_ERR_OK)
        {
            $uploadedLogo->moveTo(ROOT.'/public/images/'.$folder.'/'.$fileName.'.png');
        }
    }
}
