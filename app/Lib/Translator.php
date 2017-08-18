<?php

namespace app\Lib;


class Translator
{
    private $translations = [];

    public function __construct($dirPath, $lang)
    {
        $filePath = sprintf('%s/%s.txt', $dirPath, $lang);
        if (!file_exists($filePath)) {
            throw new \RuntimeException(sprintf('Language file does not exist [%s]', $filePath));
        }

        $lines = file($filePath);

        foreach ($lines as $line) {
            list($key, $text) = explode(':', $line);

            $this->translations[trim($key)] = trim($text);
        }
    }

    public function translate($key)
    {
        if (!array_key_exists($key, $this->translations)) {
            return $key;
        }

        return $this->translations[$key];
    }
}