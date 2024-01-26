<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
use Filament\Support\Concerns\HasColor;
use Filament\Support\Contracts\HasLabel;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
enum Semester: string implements HasLabel
{
    case Spring = 'Spring';
    case Summer = 'Summer';
    case Fall = 'Fall';
    case Winter = 'Winter';


    public function getLabel(): ?string
    {
        return match ($this) {
            self::Spring => 'Spring',
            self::Summer => 'Summer',
            self::Fall => 'Fall',
            self::Winter => 'Winter',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}