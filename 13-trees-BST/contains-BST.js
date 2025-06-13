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
}

let myBST = new BST();

myBST.insert(47);
myBST.insert(21);
myBST.insert(76);
myBST.insert(18);
myBST.insert(27);
myBST.insert(52);
myBST.insert(82);

console.log('BST Contains 27:');
console.log(myBST.contains(27));

console.log('\nBST Contains 17:');
console.log(myBST.contains(17));

/*
    EXPECTED OUTPUT:
    ----------------
    BST Contains 27:
    true
    
    BST Contains 17:
    false

*/
