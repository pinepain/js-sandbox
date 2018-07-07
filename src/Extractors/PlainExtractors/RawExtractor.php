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


namespace PhpV8\JsSandbox\Extractors\PlainExtractors;


use PhpV8\JsSandbox\Extractors\Definition\PlainExtractorDefinitionInterface;
use PhpV8\JsSandbox\Extractors\ExtractorException;
use PhpV8\JsSandbox\Extractors\ExtractorInterface;
use V8\Context;
use V8\Value;


class RawExtractor implements PlainExtractorInterface
{
    /**
     * {@inheritdoc}
     */
    public function extract(Context $context, Value $value, PlainExtractorDefinitionInterface $definition, ExtractorInterface $extractor)
    {
        if ($definition->getNext()) {
            // we have a type constraint on raw value here, so regards that we return raw value,
            // we will try to extract it just to ensure constrain validity
            try {
                $extractor->extract($context, $value, $definition->getNext());
            } catch (ExtractorException $e) {
                throw new ExtractorException('Raw value constraint failed: ' . $e->getMessage());
            }
        }

        return $value;
    }
}
