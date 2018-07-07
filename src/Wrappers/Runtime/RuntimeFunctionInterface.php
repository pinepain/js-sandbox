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


namespace PhpV8\JsSandbox\Wrappers\Runtime;


use PhpV8\JsSandbox\Specs\FunctionSpecInterface;
use PhpV8\JsSandbox\Specs\ObjectSpecInterface;


interface RuntimeFunctionInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return callable
     */
    public function getCallback(): callable;

    /**
     * @return FunctionSpecInterface
     */
    public function getSpec(): FunctionSpecInterface;

    /**
     * @return null|object
     */
    public function getObject();

    /**
     * @return null|ObjectSpecInterface
     */
    public function getObjectSpec(): ?ObjectSpecInterface;
}
