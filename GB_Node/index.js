const colors = require("colors");
var isPrime = require('isprime');

const [, , one, two] = [...process.argv];

try {
    let [start, end] = validateArgs(one, two);
    const colorList = [colors.green, colors.yellow, colors.red];

    const result = [];

    for (let i = start; i <= end; i++) {
        if (isPrime(i)) {
            result.push(i);
        }
    }

    if (result.length) {
        result.forEach((item, index) => {
            const color = index % 3;
            console.log(colorList[color](item));
        })
    } else {
        console.log('Простые числа не найдены'.red)
    }
} catch (e) {
    console.log(e.message.red);
}


function validateArgs(one, two) {

    if (Number.isInteger(one) || Number.isInteger(two)) {
        throw new Error("Программе передан(ы) некорректный(ые) аргумент(ы)");
    }

    return one > two ? [two, one] : [one, two];
}