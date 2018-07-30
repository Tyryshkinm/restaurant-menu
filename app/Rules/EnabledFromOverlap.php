<?php

namespace App\Rules;

use App\Menu;
use Illuminate\Contracts\Validation\Rule;

class EnabledFromOverlap implements Rule
{
    protected $enabledUntil;

    /**
     * Create a new rule instance.
     *
     * @param $enabledUntil
     */
    public function __construct($enabledUntil)
    {
        $this->enabledUntil = $enabledUntil;
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
            ->where('enabledUntil', '>', $value)
            ->where('enabledFrom', '<', $this->enabledUntil)
            ->get();
        $countOverlaps = count($overlapMenu);
        if ($countOverlaps == 2) {
            return false;
        }
        if ($countOverlaps == 1) {
            $newEnabledFrom = new \DateTime($value);
            $oldEnabledFrom = new \DateTime($overlapMenu[0]->enabledFrom);
            if ($newEnabledFrom > $oldEnabledFrom) {
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
        return 'The enabledFrom is overlap with other menu.';
    }
}
