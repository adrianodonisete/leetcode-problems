class Node {
	constructor(value) {
		this.value = value;
		this.left = null;
		this.right = null;
	}
}

class BST {
	constructor() {
		this.root = null;
	}

	#rInsert(value, currentNode = this.root) {
		if (currentNode === null) return new Node(value);

		if (value < currentNode.value) {
			currentNode.left = this.#rInsert(value, currentNode.left);
		} else {
			currentNode.right = this.#rInsert(value, currentNode.right);
		}
		return currentNode;
	}

	rInsert(value) {
		if (this.root === null) {
			this.root = new Node(value);
		} else {
			this.#rInsert(value);
		}
		return this;
	}

	insert(value) {
		const newNode = new Node(value);

		if (this.root === null) {
			this.root = newNode;
			return this;
		}

		let temp = this.root;
		while (temp) {
			if (value < temp.value) {
				if (!temp.left) {
					temp.left = newNode;
					break;
				}
				temp = temp.left;
			} else if (value > temp.value) {
				if (!temp.right) {
					temp.right = newNode;
					break;
				}
				temp = temp.right;
			} else {
				// don't add duplicated values
				return this;
			}
		}
		return this;
	}

	rContains(value, currentNode = this.root) {
		if (currentNode === null) return false;

		if (value === currentNode.value) return true;

		if (value < currentNode.value) {
			return this.rContains(value, currentNode.left);
		} else {
			return this.rContains(value, currentNode.right);
		}
	}

	contains(value) {
		let temp = this.root;
		while (temp) {
			if (value === temp.value) {
				return true;
			} else if (value < temp.value) {
				temp = temp.left;
			} else {
				temp = temp.right;
			}
		}
		return false;
	}

	minValue(currentNode) {
		while (currentNode.left) {
			currentNode = currentNode.left;
		}
		return currentNode.value;
	}

	#deleteNode(value, currentNode) {
		if (currentNode === null) return null;

		if (value < currentNode.value) {
			currentNode.left = this.#deleteNode(value, currentNode.left);
		} else if (value > currentNode.value) {
			currentNode.right = this.#deleteNode(value, currentNode.right);
		} else {
			// 4 ways to solve value=currentNode.value
			if (currentNode.left === null && currentNode.right === null) {
				return null;
			} else if (currentNode.left === null) {
				currentNode = currentNode.right;
			} else if (currentNode.right === null) {
				currentNode = currentNode.left;
			} else {
				let subTreeMin = this.minValue(currentNode.right);
				currentNode.value = subTreeMin;
				currentNode.right = this.#deleteNode(subTreeMin, currentNode.right);
			}
		}
		return currentNode;
	}

	deleteNode(value) {
		this.root = this.#deleteNode(value, this.root);
	}
}

let myBST = new BST();
myBST.rInsert(2).rInsert(1).rInsert(3);

// myBST.rInsert(47);
// myBST.rInsert(21);
// myBST.rInsert(76);
// myBST.insert(18);
// myBST.insert(27);
// myBST.insert(52);
// myBST.insert(82);

// console.log('BST Contains 27:');
// console.log(myBST.contains(27));

// console.log('\nBST Contains 17:');
// console.log(myBST.rContains(17));

// console.log('\nBST min all:');
// console.log(myBST.minValue(myBST.root));

// console.log('\nBST min right:');
// console.log(myBST.minValue(myBST.root.right));

console.log('BST before delete:');
console.log(`Root: ${myBST.root.value}`);
console.log(`Root->left: ${myBST.root.left.value}`);
console.log(`Root->right: ${myBST.root.right.value}`);

myBST.deleteNode(2);

console.log('BST after delete:');
console.log(`Root: ${myBST.root.value}`);
console.log(`Root->left: ${myBST.root.left?.value ?? null}`);
console.log(`Root->right: ${myBST.root.right?.value ?? null}`);
