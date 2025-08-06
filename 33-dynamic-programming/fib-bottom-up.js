let counter = 0;
function fib(n) {
	let fibArr = [];
	fibArr[0] = 0;
	fibArr[1] = 1;

	for (let i = 2; i <= n; i++) {
		counter++;
		fibArr[i] = fibArr[i - 1] + fibArr[i - 2];
	}
	return fibArr[n];
}

const n = 40;

console.log('\nFib of', n, '=', fib(n));
console.log('\nCounter', counter);
