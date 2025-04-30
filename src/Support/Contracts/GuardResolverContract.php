<?php

declare(strict_types=1);


namespace Support\Contracts;

interface GuardResolverContract
{
    /**
     * Return the guard to use.
     *
     * @return string
     */
    public function guard(): string;
}
