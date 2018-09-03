// 十分需要时间才能执行完的代码
function fibNumber(n){

    if( n == 1 || n == 2){

        return 1;
    }

    return fibNumber(n-1) + fibNumber(n - 2);
}

fibNumber(40);