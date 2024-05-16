<?php

namespace App\Observers;

use App\Models\User;
use App\Repository\LogRepository;
use Illuminate\Support\Facades\Storage;


class UserObserver
{
    public function deleting(User $user)
    {
        //Get original Publisher information
        $original = $user->getOriginal();
        $oldImage = basename($original["image"]);
        //Delete the Advertiser image
        if ($oldImage != 'default.png') {
            Storage::delete(config('system.upload_path') . "/" . $oldImage);
        }
    }

    public function updating(User $user)
    {
        //Get the original publisher information
        $original = $user->getOriginal();
        $oldImage = basename($original["image"]);
        $newImage = basename($user->image);
        //if image was updated then change the image
        if (isset($newImage) && $newImage != $oldImage && $oldImage != 'default.png') {
            Storage::delete(config('system.upload_path') . "/" . $oldImage);
        }
    }

    public function created(User $user): void
    {
        LogRepository::instance()->create("user-created", "{$user->name} has been created!");
    }
    
    public function updated(User $user): void
    {
        LogRepository::instance()->create("user-updated", "{$user->name} has been updated!");
    }

    public function deleted(User $user): void
    {
        LogRepository::instance()->create("user-deleted", "{$user->name} has been deleted!");
    }
}
