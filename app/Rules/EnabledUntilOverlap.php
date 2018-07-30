<?php

namespace App\Rules;

use App\Menu;
use Illuminate\Contracts\Validation\Rule;

class EnabledUntilOverlap implements Rule
{
    protected $enabledFrom;

    /**
     * Create a new rule instance.
     *
     * @param $enabledFrom
     */
    public function __construct($enabledFrom)
    {
        $this->enabledFrom = $enabledFrom;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $overlapMenu = Menu::query()
            ->select('enabledUntil', 'enabledFrom')
            ->where('enabledFrom', '<',$value)
            ->where('enabledUntil', '>', $this->enabledFrom)
            ->get();
        $countOverlaps = count($overlapMenu);
        if ($countOverlaps == 2) {
            return false;
        }
        if ($countOverlaps == 1) {
            $newEnabledUntil = new \DateTime($value);
            $oldEnabledUntil = new \DateTime($overlapMenu[0]->enabledUntil);
            if ($newEnabledUntil < $oldEnabledUntil) {
                return false;
            } else {
                return true;
            }
        }
        if ($countOverlaps == 0) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The enabledUntil is overlap with other menu.';
    }
}
