<?php


namespace App\Service;

/**
 * Class Censor
 * @package App\Service
 */
class Censor
{
    public const SWEAR_WORD = ['fuck', 'мудак', 'дурак'];

    /**
     * @param string $string
     * @return string
     */
    public function checkSwearWord(string $string): string
    {
        return str_replace(self::SWEAR_WORD, '#censor#', $string);
    }
}