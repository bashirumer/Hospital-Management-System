<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';
    protected $primaryKey = 'SectionID';

    protected $fillable = [
        'Name',
        'Location',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'SectionID');
    }

    public function assistants()
    {
        return $this->hasMany(Assistant::class, 'SectionID');
    }
}
