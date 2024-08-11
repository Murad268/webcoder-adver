<?php

namespace App\Services;

use Modules\Lang\Models\Lang;
use Modules\Translate\Models\Translate;

class TranslateService
{
    public function getTranslation(string $group, string $keyword, $lang)
    {
        $languages = Lang::all();
        $check = Translate::where('group', $group)->where('keyword', $keyword)->first();

        if ($check) {
            return $check->getTranslation('value', $lang);
        } else {
            $value = [];
            foreach ($languages as $lang) {
                $value[$lang->code] = "{$group}.{$keyword}";
            }
            Translate::create(['group' => $group, 'keyword' => $keyword, 'value' => $value]);
            return "{$group}.{$keyword}";
        }
    }
}
