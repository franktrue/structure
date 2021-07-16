<?php
/*
 * @Description: 数字表达式的求值-栈应用 stack
 * @Author: franktrue 807615827@qq.com
 * @Date: 2021-07-16 08:05:41
 * @LastEditTime: 2021-07-16 13:23:37
 */
namespace algorithm\stackCode;

use Ds\Stack;

class Expression
{
    /**
     * 表达式，仅支持加减乘除和小括号
     *
     * @var string
     */
    private $exp;

    public function __construct(string $exp)
    {
        $this->exp = $exp;
    }

    /**
     * 运算处理
     *
     * 规则：
     * 1.从左到右遍历表达式的每个数字和符号，如果是数字就进栈
     * 2.如果是符号就将栈顶的两个数字出栈，进行运算，并将结果入栈，一直到获得最终结果。
     */
    public function run()
    {
        // 将表达式转化为后缀表达式
        $suffixExp = $this->toSuffix();
        echo "后缀表达式为{$suffixExp} \n";
        // 计算
        $stack = new Stack();
        for ($i = 0; $i < strlen($suffixExp); $i++) {
            $char = substr($suffixExp, $i, 1);
            if (preg_match('/[0-9]/', $char)) {  // 数字入栈
                $stack->push($char);
            } else {
                $num2 = $stack->pop();
                $num1 = $stack->pop();
                $code = "\$num3 = " . $num1 . $char . $num2 . ";";
                eval($code);
                $stack->push($num3);
            }
        }
        return $stack->pop();
    }

    /**
     * 中缀表达式转后缀表达式
     * 规则
     * 1.从左到右遍历中缀表达式的每个数字和符号，若是数字就输出（直接成为后缀表达式的一部分，不进入栈）
     * 2.若是符合则判断其与栈顶符号的优先级，是右括号或低于栈顶元素，则栈顶元素依次出栈并输出，等出栈完毕，当前元素入栈。
     * 3.遵循以上两条直到输出后缀表达式为止。
     *
     * @return string
     */
    private function toSuffix(): string
    {
        $stack = new Stack();
        $len = strlen($this->exp);
        $str = '';
        for ($i = 0; $i < $len; $i++) {
            $char = substr($this->exp, $i, 1);
            // 跳过空格
            if (!trim($char)) {
                continue;
            }
            if (preg_match('/[0-9]/', $char)) {  // 数字就输出
                $str .= $char;
            } else { // 算数运算符
                // 右括号时输出栈直到左括号
                if ($char === ')') {
                    while ($stack->peek() !== '(') {
                        $str .= $stack->pop();
                    }
                    $stack->pop();  // 丢掉'('
                    continue;
                }

                // 左括号直接入栈
                if ($char !== '(') {
                    // 比较栈顶元素与当前元素的优先级
                    while (!$stack->isEmpty() && $this->compareOp($char, $stack->peek())) {
                        if ($stack->peek() !== '(' || $stack->peek() !== ')') {
                            $str .= $stack->pop();
                        }
                    }
                }
                $stack->push($char);
            }
        }
        // 最后退出栈
        while (!$stack->isEmpty()) {
            $str .= $stack->pop();
        }
        return $str;
    }

    /**
     * 运算符比较
     *
     * @param string $op1
     * @param string $op2
     *
     * @return bool
     */
    public function compareOp(string $op1, string $op2): bool
    {
        $opOrder = [
            "*" => 3,
            "/" => 3,
            "+" => 2,
            "-" => 2
        ];

        return $opOrder[$op1] <= $opOrder[$op2];
    }
}
