<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwaljumat extends Model
{
//
    protected $fillable = ['tanggal', 'imam', 'khotib', 'keterangan'];
// protected $dates = ['published_at'];


    public function author()
    {
        //satu Post hanya dimiliki oleh satu user
        return $this->belongsTo(User::class);
    }


    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        //pastikan pada Post memiliki gambar
        if (! is_null($this->image))
        {
            $imagePath = public_path() . "/img/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("img/". $this->image);
        }

        return $imageUrl;
    }

}
