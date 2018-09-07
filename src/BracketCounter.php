<?php


class BracketCounter
{
    /**
     * @param string $expression
     * @return bool
     */
    public function validateExpression(string $expression): bool
    {
        $opened = 0;
        $closed = 0;

        $status = null;

        foreach (str_split($expression) as $char) {
            switch ($char) {
                case '(':
                    $opened++;
                    break;
                case ')':
                    $closed++;
                    if ($closed > $opened) {
                        $status = false;
                    }
                    break;
                default:
                    if (preg_match('/\s/', $char)) {
                        break;
                    } else {
                        throw new InvalidArgumentException('Expression must contain only bracket and space symbols');
                    }
            }

            if ($status) {
                break;
            }
        }

        return $status ??
            $opened === $closed ? true : false;
    }

}