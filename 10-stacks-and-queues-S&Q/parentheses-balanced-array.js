class Stack {
	constructor() {
		this.stackList = [];
	}

	getStackList() {
		return this.stackList;
	}

	printStack() {
		for (let i = this.stackList.length - 1; i >= 0; i--) {
			console.log(this.stackList[i]);
		}
	}

	isEmpty() {
		return this.stackList.length === 0;
	}

	peek() {
		if (this.isEmpty()) {
			return null;
		} else {
			return this.stackList[this.stackList.length - 1];
		}
	}

	size() {
		return this.stackList.length;
	}

	push(value) {
		this.stackList.push(value);
	}

	pop() {
		if (this.isEmpty()) return null;
		return this.stackList.pop();
	}
}

function isBalancedParentheses_first_try(parentheses) {
	if (!parentheses || typeof parentheses !== 'string') {
		return false;
	}

	const split = parentheses.split('');
	const countSplit = split.length;

	if (countSplit % 2 === 1) {
		return false;
	}

	const stackBegin = new Stack();
	const stackEnd = new Stack();
	for (let i = 0; i < countSplit; i++) {
		stackBegin.push(split[i]);
	}
	for (let i = 0; i < countSplit / 2; i++) {
		stackEnd.push(stackBegin.pop());
	}

	let balanced = true;
	for (let i = 0; i < countSplit / 2; i++) {
		if (!(stackBegin.pop() === '(' && stackEnd.pop() === ')')) {
			balanced = false;
		}
	}
	return balanced;
}

function isBalancedParentheses(parentheses) {
	if (parentheses === '' || parentheses == null) {
		return true;
	}
	const split = parentheses.split('');
	const countSplit = split.length;

	if (countSplit % 2 === 1) {
		return false;
	}

	const stack = new Stack();
	for (let i = 0; i < countSplit; i++) {
		if (split[i] === '(') {
			stack.push(split[i]);
		} else if (split[i] === ')' && (stack.isEmpty() || stack.peek() !== '(')) {
			return false;
		} else {
			stack.pop();
		}
	}
	return stack.isEmpty();
}

const input1 = '(())';
const expected1 = true;
const result1 = isBalancedParentheses(input1);
console.log(`Input: "${input1}" | Expected: ${expected1} | Result: ${result1}`);

const input2 = '(()))';
const expected2 = false;
const result2 = isBalancedParentheses(input2);
console.log(`Input: "${input2}" | Expected: ${expected2} | Result: ${result2}`);

const input3 = '((()))';
const expected3 = true;
const result3 = isBalancedParentheses(input3);
console.log(`Input: "${input3}" | Expected: ${expected3} | Result: ${result3}`);

const input4 = '(((())';
const expected4 = false;
const result4 = isBalancedParentheses(input4);
console.log(`Input: "${input4}" | Expected: ${expected4} | Result: ${result4}`);

/*
    EXPECTED OUTPUT:
    ----------------
    Input: "(())" | Expected: true | Result: true
    Input: "(()))" | Expected: false | Result: false
    Input: "((()))" | Expected: true | Result: true
    Input: "(((())" | Expected: false | Result: false

*/
