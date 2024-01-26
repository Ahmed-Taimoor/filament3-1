<?php

namespace App\Models;

use App\Enums\Semester;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'image',
        'semester',
        'session',
        'admission_date',
        'contact_number',
        'portal_username',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);

    }
    public static function getFrom() :array
    {
    return[

        TextInput::make('name')
            ->required()
            ->maxLength(255),
        TextInput::make('email')
            ->email()
//            ->unique()
            ->required()
            ->maxLength(255),
        FileUpload::make('avatar')
            ->imageEditor()
            ->avatar()
            ->image(),
        Select::make('semester')
            ->enum(Semester::class)
            ->options(Semester::class)
            ->required(),
        TextInput::make('session')
            ->required()
            ->numeric(),
        DatePicker::make('admission_date')
            ->native(false),

        TextInput::make('contact_number')
            ->required()
            ->maxLength(255),
        TextInput::make('portal_username')
            ->label('Username')
            ->url()->prefix('https://')
            ->required()
            ->maxLength(255),
         Select::make('course_id')
             ->nullable()
             ->relationship('course', 'title'),
    ];
    }
}
