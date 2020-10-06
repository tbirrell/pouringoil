<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Collection::macro('toAssoc', function () {
            return $this->reduce(static function ($assoc, $keyValuePair) {
                list($key, $value) = $keyValuePair;
                $assoc[$key] = $value;
                return $assoc;
            }, new static);
        });
        Collection::macro('mapToAssoc', function ($callback) {
            return $this->map($callback)->toAssoc();
        });
        Collection::macro('reindex', function () {
            return collect(array_values($this->toArray()));
        });

        Blade::directive('markdown', function (string $markdown) {
            return empty($markdown)
                ? "<?php markdown()->parser('custom')->begin(); ?>"
                : "<?php echo markdown()->parser('custom')->parse({$markdown}); ?>";
        });

        Blade::directive('endmarkdown', function () {
            return "<?php echo markdown()->parser('custom')->end(); ?>";
        });
    }
}
