//   +=====================================================+
//   |                 WRITE YOUR CODE HERE                |
//   | Description:                                        |
//   | - This function groups anagrams from an array       |
//   |   of strings.                                       |
//   |                                                     |
//   | Return type: array                                  |
//   | - Returns an array of arrays where each array       |
//   |   contains anagrams.                                |
//   |                                                     |
//   | Tips:                                               |
//   | - You can use either a Map or an object to manage   |
//   |   the groups of anagrams.                           |
//   | - Example with Map:                                 |
//   |   anagramGroups.set(canonical, group);              |
//   | - Example with object:                              |
//   |   anagramGroups[canonical] = group;                 |
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

function groupAnagramsMap(strings) {
	const ht = new HashTable(7);

	for (let string of strings) {
		const key = string.split('').sort().join('');
		if (key) {
			let group;
			if (ht.has(key)) {
				group = ht.get(key);
				group.push(string);
			} else {
				group = [string];
			}
			ht.set(key, group);
		}
	}

	const anagrams = [];
	for (let k of ht.keys()) {
		anagrams.push(ht.get(k));
	}
	return anagrams;
}

// object
function groupAnagramsObject(strings) {
	const obj = {};
	for (const string of strings) {
		const key = string.split('').sort().join('');
		if (!obj[key]) {
			obj[key] = [];
		}
		obj[key].push(string);
	}

	const anagrams = [];
	for (const i in obj) {
		anagrams.push(obj[i]);
	}
	return anagrams;
}

function groupAnagrams(strings) {
	return groupAnagramsMap(strings);
}

// ---------------
// Lowercase Anagrams
// ---------------
console.log('Lowercase Anagrams:');
console.log("Input: ['eat', 'tea', 'tan', 'ate', 'nat', 'bat']");
console.log('Output: ', JSON.stringify(groupAnagrams(['eat', 'tea', 'tan', 'ate', 'nat', 'bat'])));
console.log('---------------');

// ---------------
// Mixed Case Anagrams
// ---------------
// console.log('Mixed Case Anagrams:');
// console.log("Input: ['Eat', 'Tea', 'Tan', 'Ate', 'Nat', 'Bat']");
// console.log('Output: ', JSON.stringify(groupAnagrams(['Eat', 'Tea', 'Tan', 'Ate', 'Nat', 'Bat'])));
// console.log('---------------');

// // ---------------
// // No Anagrams
// // ---------------
// console.log('No Anagrams:');
// console.log("Input: ['hello', 'world', 'test']");
// console.log('Output: ', JSON.stringify(groupAnagrams(['hello', 'world', 'test'])));
// console.log('---------------');

// // ---------------
// // Empty Strings
// // ---------------
// console.log('Empty Strings:');
// console.log("Input: ['', '', '']");
// console.log('Output: ', JSON.stringify(groupAnagrams(['', '', ''])));
// console.log('---------------');

// // ---------------
// // Single Characters
// // ---------------
// console.log('Single Characters:');
// console.log("Input: ['a', 'b', 'a']");
// console.log('Output: ', JSON.stringify(groupAnagrams(['a', 'b', 'a'])));
// console.log('---------------');
