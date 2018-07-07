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


namespace PhpV8\JsSandbox\Extractors\Definition;


interface ExtractorDefinitionInterface
{
    /**
     * @return null|string
     */
    public function getName(): ?string;

    /**
     * @return null|ExtractorDefinitionInterface
     */
    public function getNext(): ?ExtractorDefinitionInterface;

    /**
     * @return ExtractorDefinitionInterface[]
     */
    public function getVariations(): array;
}
