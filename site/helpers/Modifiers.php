<?php

namespace Statamic\SiteHelpers;
use Statamic\API\Asset;

class Modifiers
{
    /**
     * Maps to {{ var | example }} or {{ var example="..." }}
     *
     * @param mixed  $value    The value to be modified
     * @param array  $params   Any parameters used in the modifier
     * @param array  $context  Contextual values
     * @return mixed
     */
    public function example($value, $params, $context)
    {
        //
    }

    public function svg($value, $params, $context)
    {
        return collect($value)->map(function($choice) {

            $asset = Asset::find($choice['icon']);
            
            if ($asset) {
                $icon = $asset->disk()->get($asset->path());
            }

            return array_merge($choice, [
                'icon' => $icon ?: $choice['icon']
            ]);
        })->toJson();
    }

    public function skip($value, $params, $context) 
    {
        return array_filter($value, function($value, $key) use ($params) {
            return $key !== $params[0] - 1;
        }, ARRAY_FILTER_USE_BOTH);
    }
}
