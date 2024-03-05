<?php

namespace App\Src;

class RevertCharacters
{
    public function handle(string $string) : string
    {
        $words = preg_split('/\s+/u', $string, -1, PREG_SPLIT_NO_EMPTY);
        $result = [];

        foreach ($words as $word) {
            preg_match_all('/\p{L}|\p{M}+|-+/u', $word, $letters);
            $upperCaseIds = [];

            foreach ($letters[0] as $index => $letter) {
                if (mb_strtoupper($letter) === $letter && preg_match('/^\p{L}+$/u', $letter)) {
                    $upperCaseIds[] = $index;
                }
            }

            $reversedLetters = array_reverse(array_map('mb_strtolower', $letters[0]));

            foreach ($upperCaseIds as $index) {
                $reversedLetters[$index] = mb_strtoupper($reversedLetters[$index]);
            }

            $reversedWord = implode('', $reversedLetters);
            preg_match('/\p{P}+$/u', $word, $punctuation);
            $reversedWord .= $punctuation[0] ?? '';

            $result[] = $reversedWord;
        }

        return implode(' ', $result);
    }
}