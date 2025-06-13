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
		if (this.isEmpty()) {
			return null;
		}
		return this.stackList.pop();
	}
}

const stack = new Stack();
stack.push(1);
stack.push(2);
stack.push(3);

console.log('Before');
stack.printStack();
console.log('popped', stack.pop());
console.log('After');
stack.printStack();
