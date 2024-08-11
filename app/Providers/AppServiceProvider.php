<?php
// app/Providers/AppServiceProvider.php

namespace App\Providers;

use App\Services\ServiceContainer;
use App\Services\SettingsService;
use App\Services\TranslateService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\SiteInfo\Repositories\ModelRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ServiceContainer::class, function ($app) {
            return new ServiceContainer(
                $app->make(\App\Services\SimpleCrudService::class),
                $app->make(\Modules\Lang\Repositories\ModelRepository::class),
                $app->make(\App\Services\StatusService::class),
                $app->make(\App\Services\RemoveService::class),
                $app->make(\App\Services\ImageService::class),
                $app->make(\App\Services\PinService::class),
                $app->make(\App\Services\GeneralService::class),
                $app->make(\App\Services\DefaultService::class),
            );
        });

        $this->app->singleton(SettingsService::class, function ($app) {
            return new SettingsService($app->make(ModelRepository::class));
        });

        $this->app->singleton(TranslateService::class, function ($app) {
            return new TranslateService();
        });
    }

    public function boot(): void
    {
        Blade::directive('error', function ($field) {
            return "<?php if (\$errors->has($field)): ?>
                        <div class=\"invalid-input\">
                            <?php echo e(\$errors->first($field)); ?>
                        </div>
                    <?php endif; ?>";
        });

        Blade::directive('sessionMessages', function () {
            return "<?php if(session('success')): ?>
                        <div class='status-message'>
                            <?php echo e(session('success')); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class='invalid-message'>
                            <?php echo e(session('error')); ?>
                        </div>
                    <?php endif; ?>";
        });
    }
}
