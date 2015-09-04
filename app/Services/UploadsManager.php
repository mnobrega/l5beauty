<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 04-09-2015
 * Time: 0:53
 */

namespace App\Services;

use Carbon\Carbon;
use Dflydev\ApacheMimeTypes\PhpRepository;
use Illuminate\Support\Facades\Storage;

class UploadsManager
{
    protected $disk;
    protected $mimeDetect;

    public function __construct(PhpRepository $mimeDetect)
    {
        $this->disk = Storage::disk(config('blog.uploads.storage'));
        $this->mimeDetect = $mimeDetect;
    }

    /**
     * @param $folder
     * @return array of [
     *      'folder' => 'path to current folder',
     *      'folderName' => 'name of just current folder',
     *      'breadCrumbs' => breadcrumb array of [$path => $foldername]
     *      'folders' => array of [$path => $foldername] of each subfolder
     *      'files' => array of file details on each file in folder
     * ]
     */
    public function folderInfo($folder)
    {
        $folder = $this->cleanFolder($folder);
        $breadCrumbs = $this->breadcrumbs($folder);
        $slice = array_slice($breadCrumbs, -1);
        $folderName = current($slice);
        $breadCrumbs = array_slice($breadCrumbs,0,-1);

        $subfolders = [];
        foreach (array_unique($this->disk->directories($folder)) as $subfolder)
        {
            $subfolders["/$subfolder"] = basename($subfolder);
        }

        $files = [];
        foreach ($this->disk->files($folder) as $path)
        {
            $files[] = $this->fileDetails($path);
        }

        return compact (
            'folder',
            'folderName',
            'breadcrumbs',
            'subfolders',
            'files'
        );
    }

    protected function cleanFolder($folder)
    {
        return '/'.trim(str_replace('..','',$folder),'/');
    }

    protected function breadcriumbs($folder)
    {
        $folder = trim($folder,'/');
        $crumbs = ['/' => 'root'];

        if (empty($folder))
        {
            return $crumbs;
        }

        $folders = explode('/',$folder);
        $build = '';
        foreach ($folders as $folder)
        {
            $build .= '/'.$folder;
            $crumbs[$build] = $folder;
        }

        return $crumbs;
    }

    protected function fileDetails($path)
    {
        $path = '/'.ltrim($path,'/');

        return [
            'name'=>basename($path);
            'fullpath' =>
        ];

    }
}