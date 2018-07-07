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


namespace PhpV8\JsSandbox\Specs;


interface ObjectSpecInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasProperty(string $name): bool;

    /**
     * @param string $name
     *
     * @return PropertySpecInterface|FunctionSpecInterface|BindingSpecInterface
     */
    public function getProperty(string $name);

    /**
     * @return PropertySpecInterface[]|FunctionSpecInterface[]|BindingSpecInterface[]
     */
    public function getProperties(): array;

    /**
     * @return null|FunctionSpecInterface
     */
    public function getFunctionSpec(): ?FunctionSpecInterface;
}
