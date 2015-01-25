<?php
/**
 * Goldstandard_Sniffs_PHP_EnforceShortArraySyntaxSniff
 *
 * Discourages the use of the long array syntax:
 *
 * <code>
 * $array = array(
 *     "foo" => "bar",
 *     "bar" => "foo",
 * );
 * </code>
 *
 * Use array short syntax instead:
 *
 * <code>
 * $array = [
 *     "foo" => "bar",
 *     "bar" => "foo",
 * ];
 * </code>
 *
 * This is a sniff for PHP 5.3+ compatibility.
 *
 * @author    Jens-Andre Koch
 * @copyright 2011-onwards
 * @license   GPLv2+
 *
 * @category   PHP
 * @package    PHP_CodeSniffer
 * @subpackage Goldstandard_Sniffs
 */
class Goldstandard_Sniffs_PHP_EnforceShortArraySyntaxSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array(int)
     */
    public function register()
    {
        return array(T_ARRAY);
    }

    /**
     * Processes the tokens that this sniff is interested in.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file where the token was found.
     * @param int                  $stackPtr  The position in the stack where
     *                                        the token was found.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr]['content'] === 'array') {
            $error = 'Expected [], found %s';
            $data  = array(trim($tokens[$stackPtr]['content']));
            $phpcsFile->addError($error, $stackPtr, '', $data);
        }
    }
}
