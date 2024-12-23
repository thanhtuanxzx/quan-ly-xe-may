<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuXe extends Model
{
    use HasFactory;

    protected $table = 'chu_xe'; 
    protected $primaryKey = 'id_chu_xe'; 
    protected $fillable = [
        'ho_ten',
        'so_cmnd',
        'so_dien_thoai',
        'dia_chi',
        'id_xe'
    ];

 

    public function giaoDichBan()
    {
        return $this->hasMany(GiaoDich::class, 'id_nguoi_ban');
    }

    public function giaoDichMua()
    {
        return $this->hasMany(GiaoDich::class, 'id_nguoi_mua');
    }
    public function xeMay()
    {
        return $this->belongsTo(XeMay::class, 'id_xe', 'id_xe'); 
    }
    
 
}
