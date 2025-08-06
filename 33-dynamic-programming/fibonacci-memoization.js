let counter = 0;
const memo = [];

function fib(n) {
	if (memo[n]) {
		return memo[n];
	}

	counter++;
	if (n === 0 || n === 1) {
		memo[n] = n;
	} else {
		memo[n] = fib(n - 1) + fib(n - 2);
	}
	return memo[n];
}

const n = 40;

console.log('\nFib of', n, '=', fib(n));
console.log('\nCounter', counter);

console.log(memo);
