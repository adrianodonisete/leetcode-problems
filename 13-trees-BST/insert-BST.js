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
}

let myBST = new BST();

myBST.insert(2);
myBST.insert(1);
myBST.insert(2);
// myBST.insert(-1);

/*
    THE LINES ABOVE CREATE THIS TREE:
                 2
                / \
               1   3
*/

console.log('Root:', myBST.root.value);
console.log('\nRoot->Left:', myBST.root.left.value);
console.log('\nRoot->Right:', myBST.root.right?.value);
// console.log('\nRoot->left->left:', myBST.root.left);

/*
    EXPECTED OUTPUT:
    ----------------
    Root: 2

    Root->Left: 1

    Root->Right: 3

*/
