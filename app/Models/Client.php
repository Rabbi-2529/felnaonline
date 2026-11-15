<?php

// app/Models/Client.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    private static $client, $imageUrl;

    public static function newClient($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->image, 'upload/client-images/') : 'upload/default-client.png';
        self::$client = new Client();
        self::saveClientInfo($request, self::$client, self::$imageUrl);
    }

    public static function updateClient($request, $client)
    {
        if ($request->file('image')) {
            if (file_exists($client->image)) {
                unlink($client->image);
            }
            self::$imageUrl = imageUpload($request->image, 'upload/client-images/');
        } else {
            self::$imageUrl = $client->image;
        }

        self::saveClientInfo($request, $client, self::$imageUrl);
    }

    private static function saveClientInfo($request, $client, $imageUrl)
    {
        $client->name = $request->name;
        $client->designation = $request->designation;
        $client->description = $request->description;
        $client->image = $imageUrl;
        $client->save();
    }

    public static function deleteClient($client)
    {
        if (file_exists($client->image)) {
            unlink($client->image);
        }
        $client->delete();
    }
}
