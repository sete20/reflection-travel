<?php

if (! function_exists('langs')) {
    function langs()
    {
        return [
            'ar',
            'en',
            'fr',
        ];
    }
}
if (! function_exists('dotted_string')) {
    function dotted_string(string $name): string
    {
        if ($name === '') {
            return $name;
        }

        $base = str_replace(['[', ']'], ['.', ''], $name);
        if ($base[strlen($base) - 1] === '.') {
            return substr($base, 0, -1);
        }

        return $base;
    }
}
if (! function_exists('locale_field')) {
    function locale_field(string $name, $locale = 'ar'): ?string
    {
        if ($model = Form::getModel()) {
            return $model->getTranslation($name, $locale);
        }

        return null;
    }
}
if (! function_exists('toMap')) {
    function toMap(Traversable $iterator, string $key = 'id', string $value = 'name',string $value2 = null): array
    {
        $result = [];
        foreach ($iterator as $item) {
            $result[$item[$key]] = $item[$value];
            if($value2 && !is_null($item[$value2])){
                $result[$item[$key]] .=  " - ( $item[$value2] )";
            }
        }

        return $result;
    }
}

if (! function_exists('route_group')) {
    function route_group($prefix, callable $callback): void
    {
        $prefixValue = is_array($prefix) ? $prefix['prefix'] : $prefix;
        $as = Str::of($prefixValue)->snake()->lower()->append('.');
        $namespace = Str::of($prefixValue)->singular()->studly();
        $middleware = [];

        if (is_array($prefix)) {
            $as = $prefix['as'] ?? $as;
            $namespace = $prefix['namespace'] ?? $namespace;
            $middleware = $prefix['middleware'] ?? $middleware;
        }

        \Illuminate\Support\Facades\Route::group([
            'prefix'     => $prefixValue,
            'as'         => $as,
            'namespace'  => $namespace,
            'middleware' => $middleware,
        ], $callback);
    }
}

if (! function_exists('is_update_request')) {
    function is_update_request(): bool
    {
        return request()->isMethod('PUT');
    }
}
if (! function_exists('request_rules')) {
    function request_rules(array $rules, ?callable $ifUpdate = null): bool
    {
        if ($ifUpdate && is_update_request()) {
            $rules = $ifUpdate($rules);
        }

        return $rules;
    }
}
