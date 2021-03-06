<?php declare(strict_types=1);

/*
 * This file is part of the pinepain/js-sandbox PHP library.
 *
 * Copyright (c) 2016-2017 Bogdan Padalko <pinepain@gmail.com>
 *
 * Licensed under the MIT license: http://opensource.org/licenses/MIT
 *
 * For the full copyright and license information, please view the
 * LICENSE file that was distributed with this source or visit
 * http://opensource.org/licenses/MIT
 */


namespace Pinepain\JsSandbox\Wrappers\CallbackGuards;


use Throwable;


class DevCallbackGuard extends CallbackGuard
{
    /**
     * {@inheritdoc}
     */
    protected function getMessageFromException(Throwable $e): string
    {
        $message = parent::getMessageFromException($e);
        $message .= ': ' . $e->getMessage() . PHP_EOL . $e->getTraceAsString();

        return $message;
    }
}
