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


namespace Pinepain\JsSandbox\Extractors;


use Pinepain\JsSandbox\Extractors\Definition\ExtractorDefinitionInterface;
use V8\Context;
use V8\Value;


interface ExtractorInterface
{
    /**
     * @param Context $context
     * @param Value $value
     * @param ExtractorDefinitionInterface $definition
     *
     * @return mixed
     */
    public function extract(Context $context, Value $value, ExtractorDefinitionInterface $definition);
}
