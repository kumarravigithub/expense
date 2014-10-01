<?php

namespace Pop\Loader;


class Classmap
{

    /**
     * Static method to generate a class map file
     *
     * @param  string $inputFolder
     * @param  string $outputFile
     * @return void
     */
    public static function generate($inputFolder, $outputFile)
    {
        $dir = new \Pop\File\Dir(realpath($inputFolder), true, true);
        $matches = array();
        $files = $dir->getFiles();

        foreach ($files as $file) {
            if (substr($file, -4) == '.php') {
                $classMatch = array();
                $namespaceMatch = array();
                $classFileContents = file_get_contents($file);

                preg_match('/^class(.*)$/m', $classFileContents, $classMatch);
                preg_match('/^namespace(.*)$/m', $classFileContents, $namespaceMatch);

                $ary = array();
                if (isset($classMatch[0])) {
                    $ary['file'] = str_replace('\\', '/', $file);
                    $ary['class'] = self::parseClass($classMatch[0]);
                    $ary['namespace'] = (isset($namespaceMatch[0])) ? self::parseNamespace($namespaceMatch[0]) : null;
                    $matches[] = $ary;
                }
            }
        }

        if (count($matches) > 0) {
            $classMap = '<?php' . PHP_EOL . PHP_EOL . 'return array(';

            $i = 1;
            foreach ($matches as $class) {
                $comma = ($i < count($matches)) ? ',' : null;
                $className = (null !== $class['namespace']) ? $class['namespace'] . '\\' . $class['class'] : $class['class'];
                $classMap .= PHP_EOL . '    \'' . $className . '\' => \'' . $class['file'] . '\'' . $comma;
                $i++;
            }

            $classMap .= PHP_EOL . ');' . PHP_EOL;

            file_put_contents($outputFile, $classMap);
        }
    }

    /**
     * Static method to parse class name out
     *
     * @param  string $classString
     * @return string
     */
    protected static function parseClass($classString)
    {
        $cls = str_replace('class ', '', $classString);
        if (strpos($cls, ' ') !== false) {
            $cls = substr($cls, 0, strpos($cls, ' '));
        }
        return trim($cls);
    }

    /**
     * Static method to parse namespace name out
     *
     * @param  string $namespaceString
     * @return string
     */
    protected static function parseNamespace($namespaceString)
    {
        $ns = trim(str_replace(';', '', str_replace('namespace ', '', $namespaceString)));
        return $ns;
    }

}
