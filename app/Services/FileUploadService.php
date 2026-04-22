<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    /**
     * Allowed MIME types and their corresponding extensions
     */
    protected array $allowedMimeTypes = [
        'application/pdf' => ['pdf'],
        'image/jpeg' => ['jpg', 'jpeg'],
        'image/png' => ['png'],
    ];

    /**
     * Maximum file size in bytes (10MB)
     */
    protected int $maxSizeBytes = 10 * 1024 * 1024;

    /**
     * Store an uploaded file securely.
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param string $disk
     * @return array
     * @throws \Exception
     */
    public function storeSecurely(UploadedFile $file, string $directory = 'submissions', string $disk = 'local'): array
    {
        // 1. Basic Laravel Validation usually handles this, but we double-check here (defense in depth)
        if (!$file->isValid()) {
            throw new \Exception('Invalid file upload.');
        }

        if ($file->getSize() > $this->maxSizeBytes) {
            throw new \Exception('File exceeds maximum allowed size.');
        }

        // 2. Strict MIME Type & Extension Check
        $mimeType = $file->getMimeType();
        $extension = strtolower($file->getClientOriginalExtension());

        if (!array_key_exists($mimeType, $this->allowedMimeTypes)) {
            throw new \Exception('MIME type not allowed: ' . $mimeType);
        }

        if (!in_array($extension, $this->allowedMimeTypes[$mimeType])) {
            throw new \Exception("Extension {\$extension} does not match MIME type {\$mimeType}.");
        }

        // 3. Generate SHA-256 Hash
        $hash = hash_file('sha256', $file->getRealPath());

        // 4. Generate a safe, random filename to prevent directory traversal and execution
        $storedName = Str::uuid()->toString() . '.' . $extension;

        // 5. Store the file securely (private disk)
        $path = $file->storeAs($directory, $storedName, $disk);

        if (!$path) {
            throw new \Exception('Failed to store file to disk.');
        }

        // 6. Return metadata for the database
        return [
            'disk' => $disk,
            'path' => $path,
            'stored_name' => $storedName,
            'original_name' => $file->getClientOriginalName(),
            'extension' => $extension,
            'mime_type' => $mimeType,
            'size_bytes' => $file->getSize(),
            'sha256' => $hash,
        ];
    }
}
