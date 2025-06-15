//   +=====================================================+
//   |                WRITE YOUR CODE HERE                 |
//   | Description:                                        |
//   | - This function finds two numbers in the array      |
//   |   that add up to the target value.                  |
//   |                                                     |
//   | Return type: array                                  |
//   | - Returns an array containing the indices of the    |
//   |   two numbers that sum to the target.               |
//   | - Returns an empty array if no such numbers exist.  |
//   |                                                     |
//   | Tips:                                               |
//   | - You can use either a Map or an object to track    |
//   |   the numbers and their indices.                    |
//   | - Example with Map:                                 |
//   |   numMap.set(num, i);                               |
//   | - Example with object:                              |
//   |   numObject[num] = i;                               |
//   +=====================================================+

class HashTable {
	constructor(size = 7) {
		this.dataMap = new Array(size);
	}

	_hash(key) {
		let hash = 0;
		for (let i = 0; i < key.length; i++) {
			hash = (hash + key.charCodeAt(i) * 23) % this.dataMap.length;
		}
		return hash;
	}

	printTable() {
		for (let i = 0; i < this.dataMap.length; i++) {
			console.log(i, ': ', this.dataMap[i]);
		}
	}

	set__OLD(key, value) {
		const i = this._hash(key);
		if (!this.dataMap[i]) {
			this.dataMap[i] = [];
		}
		this.dataMap[i].push([key, value]);
		return this;
	}

	set(key, value) {
		const i = this._hash(key);
		if (!this.dataMap[i]) {
			this.dataMap[i] = [];
		}

		const pairs = [];
		let hasPair = false;
		for (let kv of this.dataMap[i]) {
			const [k] = kv;
			if (k === key) {
				kv = [key, value];
				hasPair = true;
			}
			pairs.push(kv);
		}
		if (!hasPair) {
			pairs.push([key, value]);
		}
		this.dataMap[i] = pairs;
		return this;
	}

	get(key) {
		const i = this._hash(key);
		if (this.dataMap[i]) {
			for (let item of this.dataMap[i]) {
				const [k, value] = item;
				if (k === key) {
					return value;
				}
			}
		}
		return undefined;
	}

	keys() {
		const allKeys = [];
		for (let data of this.dataMap) {
			if (data) {
				for (let [key] of data) {
					allKeys.push(key);
				}
			}
		}
		return allKeys;
	}

	has(key) {
		for (let data of this.dataMap) {
			if (data) {
				for (const [keyCheck] of data) {
					if (keyCheck === key) return true;
				}
			}
		}
		return false;
	}
}

function twoSumMap(nums, target) {
	const ht = new HashTable(7);

	return [];
}

// object
function twoSumObject(nums, target) {
	const obj = {};
	for (const [i, num] of nums.entries()) {
		for (const j in obj) {
			const n = obj[j];
			if (j != i && num + n === target) return [+j, i];
		}
		obj[i] = num;
	}
	return [];
}

function twoSum(nums, target) {
	return twoSumObject(nums, target);
}

// ---------------
// Unique Solution
// ---------------
console.log('Unique Solution:');
console.log('Input: [2, 7, 11, 15], Target: 9');
console.log('Output: ', JSON.stringify(twoSum([2, 7, 11, 15], 9)));
console.log('---------------');

// ---------------
// Duplicate Numbers
// ---------------
console.log('Duplicate Numbers:');
console.log('Input: [3, 3, 11, 15], Target: 6');
console.log('Output: ', JSON.stringify(twoSum([3, 3, 11, 15], 6)));
console.log('---------------');

// ---------------
// No Solution
// ---------------
console.log('No Solution:');
console.log('Input: [2, 7, 11, 15], Target: 30');
console.log('Output: ', JSON.stringify(twoSum([2, 7, 11, 15], 30)));
console.log('---------------');

// ---------------
// Negative Numbers
// ---------------
console.log('Negative Numbers:');
console.log('Input: [-1, -2, -3, -4, -5], Target: -8');
console.log('Output: ', JSON.stringify(twoSum([-1, -2, -3, -4, -5], -8)));
console.log('---------------');

// ---------------
// Empty Array
// ---------------
console.log('Empty Array:');
console.log('Input: [], Target: 0');
console.log('Output: ', JSON.stringify(twoSum([], 0)));
console.log('---------------');
