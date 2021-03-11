<?php

namespace App\DataTables;

use App\Models\File;

/**
 * Class FileDataTable
 */
class FileDataTable
{
    /**
     * @return File
     */
    public function get()
    {
        /** @var File $query */
        $query = File::query()->select('files.*');

        return $query;
    }
}
