<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// select from_base64(img) from (evento);
class Emocion extends Model
{
    protected $table = 'emocion';
    protected $primaryKey = 'idEmocion';
    protected $fillable = ['Emo_Nombre'];
}
