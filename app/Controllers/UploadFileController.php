<?php
namespace App\Controllers;

use FileProcessor\Services\FileProcessor;

class UploadFileController extends Controller
{
    public function __invoke(FileProcessor $fileProcessor, array $uploadedFile)
    {
        $uploaddir = __DIR__ . '/../../var/';
        $uploadfile = $uploaddir . basename($_FILES['csv']['name']);

        try {
            if (move_uploaded_file($_FILES['csv']['tmp_name'], $uploadfile)) {
                $fileProcessor->loadFile($uploadfile);

                return $this->render(['success' => 'File successfully loaded']);

            } else {
                return $this->render(['error' => 'File could not be loaded']);
            }
        } catch (\Exception $e) {
            return $this->render(['error' => $e->getMessage()]);
        }
    }

    public function viewName(): string
    {
        return 'upload-file';
    }
}