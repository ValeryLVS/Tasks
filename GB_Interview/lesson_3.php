Задание №1
number

Задание №2
false

Задание №3
false

Задание №4
"object"

Задание №5
<a href="#">Lorem</a>
<script>
    let a = document.querySelector('a')

    a.addEventListener("click", () => alert('Hello Word!'));
</script>

Задание №8
<script>
    function init() {
        var name = "Mozilla"; // name - локальная переменная, созданная в init
        function displayName() { // displayName() - внутренняя функция, замыкание
            alert(name); // displayName() использует переменную, объявленную в родительской функции
        }

        displayName();
    }

    init();
</script>

Задание №10
<script type="text/javascript">

    var answer = parseInt(Math.random() * 100);
    var userAnswer = +prompt("Угадайте число от 0 до 100");
    var maxTryCount = 2;

    for(var tryCount = 1; tryCount < maxTryCount; tryCount++){
        if(userAnswer == answer){
            alert("Поздравляю");
            break;
            // continue; -
        } else if(userAnswer > answer){
            alert("Число слишком большое");
        } else if(userAnswer < answer){
            alert("Число слишком маленькое");
        }

        userAnswer = +prompt("Попробуйте еще раз. Введите число от 1 до 100\n у Вас осталось" + (maxTryCount - tryCount) + " попыток");
    }

    if(tryCount == maxTryCount)
        alert("Вы проиграли!");

    alert("Правильнй ответ: " + answer);


</script>


