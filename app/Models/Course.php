<?php

namespace App\Models;

use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);

    }

    public static function getForm():array{
    return [

            TextInput::make('title')
                ->required()
                ->maxLength(255),

    ];
    }
}
