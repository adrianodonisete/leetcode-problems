class Node {
	constructor(value) {
		this.value = value;
		this.next = null;
		this.prev = null;
	}
}

class DoublyLinkedList {
	constructor(value) {
		const newNode = new Node(value);
		this.head = newNode;
		this.tail = newNode;
		this.length = 1;
	}

	printList() {
		let temp = this.head;
		while (temp !== null) {
			console.log(temp.value);
			temp = temp.next;
		}
	}

	getHead() {
		if (this.head === null) {
			console.log('Head: null');
		} else {
			console.log('Head: ' + this.head.value);
		}
	}

	getTail() {
		if (this.tail === null) {
			console.log('Tail: null');
		} else {
			console.log('Tail: ' + this.tail.value);
		}
	}

	getLength() {
		console.log('Length: ' + this.length);
	}

	makeEmpty() {
		this.head = null;
		this.tail = null;
		this.length = 0;
	}

	push(value) {
		const newNode = new Node(value);
		if (this.length === 0) {
			this.head = newNode;
			this.tail = newNode;
		} else {
			newNode.prev = this.tail;
			this.tail.next = newNode;
			this.tail = newNode;
		}
		this.length++;
		return this;
	}

	pop() {
		if (this.length === 0) {
			return undefined;
		}
		if (this.length === 1) {
			const temp = this.head;
			this.head = null;
			this.tail = null;
			this.length = 0;
			return temp;
		}

		const temp = this.tail;
		let prev = temp.prev;
		prev.next = null;
		this.tail = prev;
		temp.next = null;
		temp.prev = null;
		this.length--;
		return temp;
	}
}

let myDLL = new DoublyLinkedList(1).push(2).push(3);

myDLL.getHead();
myDLL.getTail();
myDLL.getLength();

console.log('\nDoubly Linked List:');
myDLL.printList();

console.log('\nAfter pop:');
const poped = myDLL.pop();
myDLL.printList();

console.log('\nPoped:' + poped?.value);

/*
    EXPECTED OUTPUT:
    ----------------
    Head: 1
    Tail: 2
    Length: 2

    Doubly Linked List:
    1
    2

*/
