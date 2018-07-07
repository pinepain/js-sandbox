<?php declare(strict_types=1);

/*
 * This file is part of the pinepain/js-sandbox PHP library.
 *
 * Copyright (c) 2016-2017 Bogdan Padalko <thepinepain@gmail.com>
 *
 * Licensed under the MIT license: http://opensource.org/licenses/MIT
 *
 * For the full copyright and license information, please view the
 * LICENSE file that was distributed with this source or visit
 * http://opensource.org/licenses/MIT
 */


namespace PhpV8\JsSandbox\Laravel;


use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use PhpV8\JsSandbox\Common\NativeGlobalObjectWrapper;
use PhpV8\JsSandbox\Common\NativeGlobalObjectWrapperInterface;
use PhpV8\JsSandbox\Modules\ModulesCache;
use PhpV8\JsSandbox\Modules\ModulesCacheInterface;
use PhpV8\JsSandbox\Modules\ModulesService;
use PhpV8\JsSandbox\Modules\ModulesStack;
use PhpV8\JsSandbox\Modules\ModulesStackInterface;
use PhpV8\JsSandbox\Modules\NativeRequireFunctionWrapperInterface;
use PhpV8\JsSandbox\Modules\Repositories\NativeModulesRepository;
use PhpV8\JsSandbox\Modules\Repositories\NativeModulesRepositoryInterface;
use PhpV8\JsSandbox\Modules\Repositories\SourceModulesRepository;
use PhpV8\JsSandbox\Modules\Repositories\SourceModulesRepositoryInterface;
use PhpV8\JsSandbox\Modules\RequireCallback;
use PhpV8\JsSandbox\Modules\RequireCallbackInterface;
use PhpV8\JsSandbox\Specs\ObjectSpecsCollectionInterface;
use PhpV8\JsSandbox\Wrappers\WrapperInterface;
use V8\Context;
use V8\Isolate;


class JsSandboxModulesServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(ModulesCacheInterface::class, ModulesCache::class);
        $this->app->singleton(ModulesStackInterface::class, ModulesStack::class);

        $this->app->singleton(NativeModulesRepositoryInterface::class, NativeModulesRepository::class);
        // NOTE: to resolve specific FilesystemInterface for SourceModulesRepository you may need to write rule. e.g.:
        // $this->app->when(JsSandboxModulesServiceProvider::class)
        //           ->needs(FilesystemInterface::class)
        //           ->give(...);
        // or default implementation for FilesystemInterface would we set, which may not be exactly what you want
        $this->app->singleton(SourceModulesRepositoryInterface::class, SourceModulesRepository::class);

        $this->app->singleton(RequireCallbackInterface::class, RequireCallback::class);


        $this->app->singleton(NativeRequireFunctionWrapperInterface::class, function (Container $app) {

            $service = $app->make(ModulesService::class);

            $service->registerObjectSpecs($app->make(ObjectSpecsCollectionInterface::class));

            return $service->createNativeFunctionWrapper(
                $app->make(Context::class),
                $app->make(RequireCallbackInterface::class),
                $app->make(WrapperInterface::class)
            );
        });

    }

    public function provides()
    {
        return [
            ModulesCacheInterface::class,
            ModulesStackInterface::class,

            NativeModulesRepositoryInterface::class,
            SourceModulesRepositoryInterface::class,

            RequireCallbackInterface::class,
            NativeRequireFunctionWrapperInterface::class,

        ];
    }
}
