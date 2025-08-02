class Node {
	constructor(value) {
		this.value = value;
		this.next = null;
	}
}

class LinkedList {
	constructor(value) {
		const newNode = new Node(value);
		this.head = newNode;
		this.tail = this.head;
		this.length = 1;
	}

	printList() {
		let temp = this.head;
		let output = '';
		if (temp === null) {
			console.log('empty');
			return;
		}
		while (temp !== null) {
			output += String(temp.value);
			temp = temp.next;
			if (temp !== null) {
				output += ' -> ';
			}
		}
		console.log(output);
	}

	makeEmpty() {
		this.head = null;
		this.tail = null;
		this.length = 0;
	}

	push(value) {
		const newNode = new Node(value);
		if (!this.head) {
			this.head = newNode;
			this.tail = newNode;
		} else {
			this.tail.next = newNode;
			this.tail = newNode;
		}
		this.length++;
		return this;
	}

	//   +===================================================+
	//   |               WRITE YOUR CODE HERE                |
	//   | Description:                                      |
	//   | - This method sorts the linked list using the     |
	//   |   bubble sort algorithm.                          |
	//   |                                                   |
	//   | Side Effects:                                     |
	//   | - The list will be sorted in place, so the        |
	//   |   original list gets modified.                    |
	//   |                                                   |
	//   | Tips:                                             |
	//   | - The method uses two nested while loops.         |
	//   | - It swaps adjacent nodes if they are out of      |
	//   |   order.                                          |
	//   | - It repeats until the list is sorted.            |
	//   | - The sortedUntil variable helps to reduce the    |
	//   |   number of comparisons.                          |
	//   +===================================================+

	bubbleSort() {
		if (this.length < 2) return;

		let temp = this.head;
		let before = new Node(0);
		let output = '';

		while (temp) {
			let sub = temp;
			while (sub) {
				if (temp.value > sub.value) {
					output += String(`b${before.value}:c${temp.value}:n${sub.value} swap `);
					before = sub;

					if (temp == this.head) {
						output += String(`t=h `);

						const next = temp.next;
						temp.next = next?.next;
						this.head = next;
						this.head.next = temp;
					} else {
						output += String(`s `);

						let current = temp;
						const next = sub;

						output += String(` cn `);
						// before.next = next;
						// next.next = current;

						output += String(`bn${next?.value ?? 0}:nn${current?.value ?? 0} cc `);

						// before.next = next;
						// current = next;
						// next.next = current;
						// current.next = sub;
						// sub = temp;
					}

					if (temp == this.tail) {
						output += String(`t=t `);
					}
				}
				// before = sub;
				sub = sub.next;
			}
			temp = temp.next;
			if (temp) {
				output += '-> ';
			}
		}
		console.log(output);
	}
}

// ------------------------------------
//  Sort descending list
// ------------------------------------
const list1 = new LinkedList(4);
list1.push(3);
list1.push(2);
list1.push(1);
console.log('Sort descending list:');
list1.printList(); // Should print: 4 -> 3 -> 2 -> 1
list1.bubbleSort();
list1.printList(); // Should print: 1 -> 2 -> 3 -> 4
console.log('---------------');

// ------------------------------------
//  Sort already sorted list
// ------------------------------------
// const list2 = new LinkedList(1);
// list2.push(2);
// console.log('Sort already sorted list:');
// list2.printList(); // Should print: 1 -> 2
// list2.bubbleSort();
// list2.printList(); // Should print: 1 -> 2
// console.log('---------------');

// // ------------------------------------
// //  Sort list with random elements
// // ------------------------------------
// const list3 = new LinkedList(3);
// list3.push(1);
// list3.push(4);
// list3.push(2);
// console.log('Sort list with random elements:');
// list3.printList(); // Should print: 3 -> 1 -> 4 -> 2
// list3.bubbleSort();
// list3.printList(); // Should print: 1 -> 2 -> 3 -> 4
// console.log('---------------');

// // ------------------------------------
// //  Sort list with duplicate elements
// // ------------------------------------
// const list4 = new LinkedList(3);
// list4.push(3);
// list4.push(2);
// list4.push(2);
// console.log('Sort list with duplicate elements:');
// list4.printList(); // Should print: 3 -> 3 -> 2 -> 2
// list4.bubbleSort();
// list4.printList(); // Should print: 2 -> 2 -> 3 -> 3
// console.log('---------------');

// // ------------------------------------
// //  Sort single-element list
// // ------------------------------------
// const list5 = new LinkedList(1);
// console.log('Sort single-element list:');
// list5.printList(); // Should print: 1
// list5.bubbleSort();
// list5.printList(); // Should print: 1
// console.log('---------------');

// // ------------------------------------
// //  Sort list with negative numbers
// // ------------------------------------
// const list6 = new LinkedList(-1);
// list6.push(-2);
// list6.push(1);
// console.log('Sort list with negative numbers:');
// list6.printList(); // Should print: -1 -> -2 -> 1
// list6.bubbleSort();
// list6.printList(); // Should print: -2 -> -1 -> 1
// console.log('---------------');

// // ------------------------------------
// //  Sort list with zeros
// // ------------------------------------
// const list7 = new LinkedList(0);
// list7.push(0);
// list7.push(1);
// console.log('Sort list with zeros:');
// list7.printList(); // Should print: 0 -> 0 -> 1
// list7.bubbleSort();
// list7.printList(); // Should print: 0 -> 0 -> 1
// console.log('---------------');

// // ------------------------------------
// //  Sort empty list
// // ------------------------------------
// const list8 = new LinkedList(1);
// list8.makeEmpty();
// console.log('Sort empty list:');
// list8.printList(); // Should print: empty
// list8.bubbleSort();
// list8.printList(); // Should print: empty
// console.log('---------------');
