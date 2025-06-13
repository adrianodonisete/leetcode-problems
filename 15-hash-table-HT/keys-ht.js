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

	set(key, value) {
		const i = this._hash(key);
		if (!this.dataMap[i]) {
			this.dataMap[i] = [];
		}
		this.dataMap[i].push([key, value]);
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
}

let myHashTable = new HashTable();

myHashTable.set('paint', 20);
myHashTable.set('bolts', 40);
myHashTable.set('nails', 100);
myHashTable.set('tile', 50);
myHashTable.set('lumber', 80);

console.log(myHashTable.keys());

/*
    EXPECTED OUTPUT:
    ----------------
    [ 'paint', 'bolts', 'nails', 'tile', 'lumber' ]

*/
