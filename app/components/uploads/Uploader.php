<?php

/** Uploads files to local path */
function stunUploadLocal($file, $ext, $folder) {

    $keyname = uniqid('img-'.date('d-m-Y').'-') . $ext;
    $uploaddir = STUN_PATH . '/content/uploads/' . $folder;
    $uploadfile = $uploaddir . '/' . $keyname;

    try {
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (!isset($file['error']) || is_array($file['error'])) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $file['error'] value.
        switch ($file['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here.
        if ($file['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $file['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $exts = array_search(
            $finfo->file($file['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'pdf' => 'application/pdf'
            ),
            true
        )) {
            throw new RuntimeException('Invalid file format.');
            }

        // You should name it uniquely.
        // DO NOT USE $file['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.
        if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
            throw new RuntimeException('Failed to move uploaded file.');
        }

        return $keyname;

    } catch (RuntimeException $e) {
        die('ERROR: ' . $e->getMessage());
    }
}
