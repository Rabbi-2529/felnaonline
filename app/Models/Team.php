<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    private static $team, $imageUrl;

    protected $fillable = ['name', 'designation', 'image', 'facebook_link', 'linkedin_link'];

    // Create a new team member
    public static function newTeam($request)
    {
        self::$imageUrl = $request->file('image') ? imageUpload($request->image, 'upload/team-images/') : 'upload/default.png';
        self::$team = new Team();
        self::saveBasicInfo($request, self::$team, self::$imageUrl);
    }

    // Update existing team member
    public static function updateTeam($request, $team)
    {
        if ($request->file('image')) {
            if (file_exists($team->image)) {
                unlink($team->image);
            }
            self::$imageUrl = imageUpload($request->image, 'upload/team-images/');
        } else {
            self::$imageUrl = $team->image;
        }

        self::saveBasicInfo($request, $team, self::$imageUrl);
    }

    // Save basic team info
    private static function saveBasicInfo($request, $team, $imageUrl)
    {
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->image = $imageUrl;
        $team->facebook_link = $request->facebook_link;
        $team->linkedin_link = $request->linkedin_link;
        $team->save();
    }

    // Delete a team member
    public static function deleteTeam($team)
    {
        if (file_exists($team->image)) {
            unlink($team->image);
        }
        $team->delete();
    }
}
